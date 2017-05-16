<?php
namespace AppBundle\Helpers;

use Doctrine\ORM\EntityManager;
use AppBundle\Model\Paybox;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Translation\Translator;
use Symfony\Component\HttpFoundation\Session\Session;
use \Diagomail\AppBundle\Entity\PaymentTransaction;
/**
 * paymentTransaction Helper
 * <pre>
 * Gheorghe 03/01/2017 Creation
 * </pre>
 * @version 1.0
 * @author Gheorghe Ceban <gheorghe@leadiance.net>
 */
class PaymentTransactionHelper
{

    private $em;
    private $paybox;
    private $user;
    private $paymentTransaction;
    private $translator;
    private $session;

    /**
     * Construct
     * 
     * @param EntityManager $poEm
     * @param Paybox $poPaybox
     * @param TokenStorage $poSecurityToken
     * @param Translator $poTranslator
     * @param Session $poSession
     */
    public function __construct(EntityManager $poEm, Paybox $poPaybox, TokenStorage $poSecurityToken, Translator $poTranslator, Session $poSession)
    {
        $this->em = $poEm;
        $this->paybox = $poPaybox;
        $this->user = $poSecurityToken->getToken()->getUser();
        $this->translator = $poTranslator;
        $this->session = $poSession;
    }

    /**
     * Generate PaymentTransaction Entity
     * 
     * @param string $psExpired
     * @param string $psReference
     * @return PaymentTransaction
     */
    public function generatePaymentTransaction($psExpired, $psReference)
    {
        $loPaymentTransaction = new PaymentTransaction();
        $loPaymentTransaction->setUser($this->user);
        $loPaymentTransaction->setExpired($psExpired);
        $loPaymentTransaction->setReference($psReference);
        $loPaymentTransaction->setPayboxStatus('pending');
        $loPaymentTransaction->setPayboxType('00056');
        $this->em->persist($loPaymentTransaction);
        return $loPaymentTransaction;
    }

    /**
     * Set parameters and Call paybox api to subscribe
     * @param integer $piAmount
     * @param string $psCardNumber
     * @param string $psExpired
     * @return array
     */
    public function callPaybox($piAmount, $psCardNumber, $psExpired)
    {
        // ==== set REFERENCE ====
        $lsReference = 'DIAGO' . time();
        // ==== set REFABONNE ====
        $lsRefabonne = 'REF' . time();
        // ==== set NUMQUESTION ====
        $liNumquestion = time();
        // ==== Create PaymentTransaction ==== 
        $this->paymentTransaction = $this->generatePaymentTransaction($psExpired, $lsReference);
        // ==== Set parameters for paybox call ====
        $this->paybox->setParameters($liNumquestion, $piAmount, $psCardNumber, $psExpired, $lsReference, $lsRefabonne, $this->paymentTransaction->getPayboxType());
        // ==== send parameters to paybox ==== 
        return $this->paybox->send();
    }

    /**
     * Set parameters and Call paybox api to debit
     * 
     * @param PaymentTransaction $poPaymentTransaction
     * @param integer $piAmount
     * @return array
     */
    public function callRechargePaybox(PaymentTransaction $poPaymentTransaction, $piAmount)
    {
        // ==== Create PaymentTransaction ==== 
        $this->paymentTransaction = $poPaymentTransaction;
        $this->changePayboxType();
        // ==== Set parameters for paybox call ====
        $this->paybox->setRechargeParameters(
                $this->getNumquestionByPayboxType(), $piAmount, $this->paymentTransaction->getPorteur(), $this->paymentTransaction->getExpired(), $this->paymentTransaction->getNumappel(), $this->paymentTransaction->getNumtrans(), $this->paymentTransaction->getPayboxType(), $this->paymentTransaction->getRefabonne(), $this->paymentTransaction->getReference()
        );
        // ==== send parameters to paybox ====
        return $this->paybox->send();
    }

    /**
     * change paybox type
     */
    protected function changePayboxType()
    {
        switch ($this->paymentTransaction->getPayboxType()) {
            // ==== Register new subscriber ====
            case '00056':
                // ==== Debit (Capture) ====
                $this->paymentTransaction->setPayboxType('00002');
                $this->paymentTransaction->setPayboxStatus('authorized');
                break;
            // ==== Debit (Capture) ====
            case '00002':
                // ==== Authorization + Capture on a subscriber ====
                $this->paymentTransaction->setPayboxType('00053');
                $this->paymentTransaction->setPayboxStatus('authorized+debit');
                break;
        }
    }

    /**
     * get numquestion from payboxtype
     * @return string
     */
    protected function getNumquestionByPayboxType()
    {
        switch ($this->paymentTransaction->getPayboxType()) {
            // ==== Register new subscriber ====
            case '00056':
                return $this->paymentTransaction->getNumquestion();
            // ==== Debit (Capture) ====
            case '00002':
            // ==== Authorization + Capture on a subscriber ====
            case '00053':
                return time();
        }
    }

    /**
     * Parse paybox response
     * @param PaymentTransaction $paPaymentResponse
     */
    public function parsePayboxResponse($paPaymentResponse)
    {
        $this->paymentTransaction->setPaymentResponse($paPaymentResponse);
        return $this->paymentTransaction;
    }

    /**
     * Check status of transaction
     * @param array $paPaymentResponse
     * @return boolean
     */
    public function setPaymentStatus($paPaymentResponse)
    {
        // ==== Check payment status ====
        $paymentStatus = $this->em->getRepository('DiagomailAppBundle:PaymentStatus')->findOneBy(array('code' => $paPaymentResponse['CODEREPONSE']));
        if ($paymentStatus AND $paymentStatus->getCode() === '00000') {
            // ==== if the status is 00000 that means the payment is ok ====
            $this->paymentTransaction->setPaymentStatus($paymentStatus); 
        } else {
            // ==== if the status is diferent to 00000 return a message with the response from paybox ====
            $lsText = $this->translator->trans('payments.card.flash.danger.status', array('%status%' => !$paymentStatus ? "" :$paymentStatus->getDescription()), 'AppBundle');
            $this->session->getFlashBag()->add('danger', $lsText);
            return false;
        }
        return true;
    }

    /**
     * Add CreditBalanceTransaction to payment transaction.
     *
     * @param \Diagomail\AppBundle\Entity\CreditBalanceTransaction $poCreditBalanceTransaction
     * @return \Diagomail\AppBundle\Entity\CreditBalanceTransaction
     */
    public function addCreditBalanceTransaction(\Diagomail\AppBundle\Entity\CreditBalanceTransaction $poCreditBalanceTransaction)
    {
        $this->paymentTransaction->addCreditBalanceTransaction($poCreditBalanceTransaction);
        $poCreditBalanceTransaction->setPaymentTransaction($this->paymentTransaction);
        
        return $poCreditBalanceTransaction;
    }

    /**
     * Add DedicatedIpTransaction to payment transaction.
     * 
     * @param \Diagomail\AppBundle\Entity\DedicatedIpTransaction $poDedicatedIpTransaction
     * @return \Diagomail\AppBundle\Entity\DedicatedIpTransaction
     */
    public function addDedicatedIpTransaction(\Diagomail\AppBundle\Entity\DedicatedIpTransaction $poDedicatedIpTransaction)
    {
        $this->paymentTransaction->addDedicatedIpTransaction($poDedicatedIpTransaction);
        $poDedicatedIpTransaction->setPaymentTransaction($this->paymentTransaction);

        return $poDedicatedIpTransaction;
    }

    /**
     * Flush data
     * 
     * @return PaymentTransaction
     */
    public function updatePaymentTransaction()
    {
        $this->em->persist($this->paymentTransaction);
        $this->em->flush();
        return $this->paymentTransaction;
    }
}

<?php
namespace AppBundle\Helpers;

use Doctrine\ORM\EntityManager;
use AppBundle\Model\Paybox;
use Diagomail\AppBundle\Entity\PaymentTransaction;
use AppBundle\Helpers\InvoiceHelper;
use AppBundle\Model\Mailer;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Translation\Translator;

/**
 * Payment Helper
 * <pre>
 * Gheorghe 22/03/2017 Creation
 * </pre>
 * @version 1.0
 * @author Gheorghe Ceban <gheorghe@leadiance.net>
 */
class PaymentHelper
{

    private $em;
    private $paybox;
    private $invoice;
    private $translator;
    private $mailer;
    private $templating;
    private $supportEmail;
    private $io;

    /**
     * Construct
     * @param type $em
     */
    public function __construct(EntityManager $em, Paybox $paybox, InvoiceHelper $invoice, Mailer $mailer, TwigEngine $templating, $supportEmail, Translator $translator)
    {
        $this->em = $em;
        $this->paybox = $paybox;
        $this->invoice = $invoice;
        $this->mailer = $mailer;
        $this->templating = $templating;
        $this->supportEmail = $supportEmail;
        $this->translator = $translator;
    }

    /**
     * Recharge of payments of the standard users.
     *
     * @param SymfonyStyle $poIO
     */
    public function managePayments(SymfonyStyle $poIO)
    {
        $this->io = $poIO;
        // ==== All transactions that want to recharge
        $laUsers = $this->em->getRepository('DiagomailUsersBundle:Users')->findLastsTransactionToRecharge();
        $this->io->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' There are <info>' . count($laUsers) . '</info> users to charge transactions.');
        foreach ($laUsers as $loUser) {
            $loTransaction = $loUser->getPaymentTransaction()->first();
            if (!$loTransaction) {
                continue;
            }

            $this->io->section('[' . (date('H:i:s')) . ']' . ' User: <info>' . $loUser->getUsername().'</info>');
            // ---- Get the total amount of dedicated IPs ----
            $liAmountDedicatedIps = $this->getIpQuantityMonthlyByUser($loUser);

            // ---- Get the credit package ----
            $loCreditPackage = $loUser->getUserProperties()->getCreditPackage();
            $liAmountCredits = $loCreditPackage->getQuantity() * 100;
            $liTotalAmount = $liAmountDedicatedIps + $liAmountCredits;

            $this->io->writeln('[' . (date('H:i:s')) . ']' . ' Prepare to charge');
            $this->io->writeln('[' . (date('H:i:s')) . ']' . '    Amount: ' . $liTotalAmount);

            // ==== call paybox ====
            $laPaymentResponse = $this->callRechargePaybox($loTransaction, $liTotalAmount);
            // ---- parse paybox response ----
            $this->parsePayboxResponse($loTransaction, $laPaymentResponse);
            $lbPaymentStatus = $this->setPaymentStatus($loTransaction, $laPaymentResponse);
            // ---- if response status is diferrent that 00000 this means that is invalid payment ----
            if ($lbPaymentStatus == false) {
                $this->io->error('[' . (date('H:i:s')) . ']' . '    **************************ERROR**************************');
                $this->io->writeln('[' . (date('H:i:s')) . ']' . '    Code description: ' . $loTransaction->getCommentaire());
                // ---- send email to user and support ----
                $this->sendPaymentStatusEmail($loTransaction, 'wrong', $loUser);
                continue;
            }
            $this->io->writeln('[' . (date('H:i:s')) . ']' . '    Code response: <info>00000</info>');

            // ==== set invoice ====
            $this->io->writeln('[' . (date('H:i:s')) . ']' . '    Generate invoice');
            $loInvoice = $this->createInvoice($liTotalAmount, $loUser);

            // ==== Generate creditBalanceTransaction entity with CreditPackage ====
            $this->io->writeln('[' . (date('H:i:s')) . ']' . '    Generate Credit balance transaction entity');
            $loCreditBalanceTransaction = new \Diagomail\AppBundle\Entity\CreditBalanceTransaction($loUser->getUserProperties(), $loCreditPackage, $liAmountCredits);
            $this->addCreditBalanceTransaction($loTransaction, $loCreditBalanceTransaction);
            $loCreditBalanceTransaction->setInvoice($loInvoice);
            $this->em->persist($loCreditBalanceTransaction);
            $this->em->flush();

            // ==== Update dedicated Ips of User ====
            if ($liAmountDedicatedIps > 0) {
                $this->updateDedicatedIpByUser($loUser, $loTransaction, $loInvoice);
            }
            // ---- Create PDF and upload to S3 ----
            $this->io->writeln('[' . (date('H:i:s')) . ']' . '    Create PDF invoice');
            $this->invoice->createPDF($loInvoice);

            // ---- Update payment transaction status ----
            $this->updatePaymentTransaction($loTransaction);
            $this->io->success('[' . (date('H:i:s')) . ']' . ' Renewal realized correctly');
            $this->sendPaymentStatusEmail($loTransaction, 'success', $loUser, $loInvoice);
        }
    }

    /**
     * Update dedicated IPs by user.
     *
     * @param \Diagomail\UsersBundle\Entity\Users               $poUser         User
     * @param \Diagomail\AppBundle\Entity\PaymentTransaction    $poTransaction  Transaction
     * @param \Diagomail\AppBundle\Entity\Invoice               $poInvoice      Invoice
     */
    protected function updateDedicatedIpByUser($poUser, $poTransaction, $poInvoice)
    {
        $liUnitIp = $this->getIpUnitAmount();

        $dedicatedIps = $poUser->getDedicatedIp();
        // ==== Update the dedicated IPs ====
        $this->io->writeln('[' . (date('H:i:s')) . ']' . '    Update Dedicated IPs transaction entity');

        foreach ($dedicatedIps as $dedicatedIp) {

            // ---- set values un DedicatedIp entity
            $ldExpirationDate = new \DateTime(date('Y-m-t 23:59:59'));
            $dedicatedIp->setExpirationDate($ldExpirationDate);
            // ---- Set DedicatedIpStatus OK ----
            $loIpStatusOk = $this->em->getRepository('DiagomailAppBundle:DedicatedIpStatus')->find(1);
            $dedicatedIp->setDedicatedIpStatus($loIpStatusOk);
            $this->em->persist($dedicatedIp);

            // ==== Generate dedicatedIpTransaction entity with DedicatedIp ====
            $loDedicatedIpTransaction = new \Diagomail\AppBundle\Entity\DedicatedIpTransaction($dedicatedIp, $liUnitIp);
            $this->addDedicatedIpTransaction($poTransaction, $loDedicatedIpTransaction);
            $loDedicatedIpTransaction->setInvoice($poInvoice);
            $this->em->persist($loDedicatedIpTransaction);

            $this->em->flush();
        }
    }

    /**
     * Create the invoice.
     *
     * @param integer $piAmount  Amount of invoice
     * @param \Diagomail\UsersBundle\Entity\Users $poUser   User
     *
     * @return \Diagomail\AppBundle\Entity\Invoice
     */
    protected function createInvoice($piAmount, $poUser)
    {
        $ldInvoiceDate = new \DateTime(date('Y-m-d'));
        $loInvoice = $this->invoice->generateInvoice($piAmount, $ldInvoiceDate, $poUser, $this->io);
        // ---- Set status invoice to paid ----
        $this->invoice->updateStatusInvoice($loInvoice);
        $this->em->flush();

        return $loInvoice;
    }

    /**
     * Get the quantity monthly for all dedicated IPs.
     *
     * @param \Diagomail\UsersBundle\Entity\Users $poUser   User
     * @return integer
     */
    protected function getIpQuantityMonthlyByUser($poUser)
    {
        $liTotalAmount = 0;

        $loDedicatedIps = $this->em->getRepository('DiagomailAppBundle:DedicatedIp')
            ->getActiveDedicatedIpByUser($poUser, 'DiagomailAppBundle');

        foreach ($loDedicatedIps as $loDedicatedIp) {
            $liAmount = $loDedicatedIp->getCreditIp()->getQuantityMonthly();
            $liTotalAmount += ($liAmount * 100);
        }

        return $liTotalAmount;
    }

    /**
     * Get the unit amount of a dedicated IP.
     * @return int
     */
    protected function getIpUnitAmount()
    {
        $liAmountIp = $this->em->getRepository('DiagomailAppBundle:CreditIp')->findOneBy(array(), array('id' => 'DESC'), 1, 0);
        if (!$liAmountIp) {
            return 0;
        }

        $liAmount = $liAmountIp->getQuantityMonthly() * 100;

        return $liAmount;
    }

    /**
     * Send email with payment status
     * @param PaymentTransaction $poPaymentTransaction  Transaction
     * @param string             $psPaymentStatus       wrong|success
     * @param User               $poUser                User
     * @param Invoice            $poInvoice             Invoice URL
     */
    protected function sendPaymentStatusEmail(PaymentTransaction $poPaymentTransaction, $psPaymentStatus, $poUser, $poInvoice = null)
    {
        $laFile = null;
        // ---- Get Language of user ----
        $lsLang = $poUser->getUserProperties()->getLanguages()->getShortName();

        if ($psPaymentStatus == 'wrong') {

            $paParams = array(
                'lang' => $lsLang,
                'username' => $poUser->getUserName()
            );
            $lsSubject = $this->translator->trans('email_payment.subject.success', array(), 'AppBundle', $lsLang);

        } else {
            // ==== Payment success ====
            // ---- attach the invoice in billing notification ----
            //$laFile = array($poInvoice->getUrl());
            $lsNumberInvoice = $poInvoice->getNumber();

            $paParams = array(
                'lang' => $lsLang,
                'username' => $poUser->getUserName(),
                'invoice' => $lsNumberInvoice
            );

            $lsSubject = $this->translator->trans('email_payment.subject.success', array('%string%' => $lsNumberInvoice), 'AppBundle', $lsLang);
        }

        // ---- Set language in template ----
        $this->translator->setLocale($lsLang);
        // ---- Generate the body of message ----
        $lsEmailText = $this->templating->render('AppBundle:Emails:payment_' . $psPaymentStatus . '.html.twig', $paParams);

        $lsEmail = $poPaymentTransaction->getUser()->getUserProperties()->getEmailBillingNotifications();
        $psBcc = $this->supportEmail;
        $this->mailer->sendEmail($lsSubject, $lsEmail, $lsEmailText, null, $laFile, $psBcc);
    }

    /**
     * Parse paybox response
     * @param PaymentTransaction $paPaymentResponse
     */
    public function parsePayboxResponse(PaymentTransaction $poPaymentTransaction, $paPaymentResponse)
    {
        $poPaymentTransaction->setPaymentResponse($paPaymentResponse);
        return $poPaymentTransaction;
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
        $this->changePayboxType($poPaymentTransaction);
        // ==== Set parameters for paybox call ====
        $this->paybox->setRechargeParameters(
                $this->getNumquestionByPayboxType($poPaymentTransaction), $piAmount, $poPaymentTransaction->getPorteur(), $poPaymentTransaction->getExpired(), $poPaymentTransaction->getNumappel(), $poPaymentTransaction->getNumtrans(), $poPaymentTransaction->getPayboxType(), $poPaymentTransaction->getRefabonne(), $poPaymentTransaction->getReference()
        );
        // ==== send parameters to paybox ====
        return $this->paybox->send();
    }

    /**
     * Check status of transaction
     * @param array $paPaymentResponse
     * @return boolean
     */
    public function setPaymentStatus(PaymentTransaction $poPaymentTransaction, $paPaymentResponse)
    {
        // ==== Check payment status ====
        $paymentStatus = $this->em->getRepository('DiagomailAppBundle:PaymentStatus')->findOneBy(array('code' => $paPaymentResponse['CODEREPONSE']));
        if ($paymentStatus AND $paymentStatus->getCode() == '00000') {
            // ==== if the status is 00000 that means the payment is ok ====
            $poPaymentTransaction->setPaymentStatus($paymentStatus);
        } else {
            // ==== if the status is diferent to 00000 return a message with the response from paybox ====
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
    public function addCreditBalanceTransaction(PaymentTransaction $poPaymentTransaction, \Diagomail\AppBundle\Entity\CreditBalanceTransaction $poCreditBalanceTransaction)
    {
        $poPaymentTransaction->addCreditBalanceTransaction($poCreditBalanceTransaction);
        $poCreditBalanceTransaction->setPaymentTransaction($poPaymentTransaction);

        return $poCreditBalanceTransaction;
    }

    /**
     * Flush data
     * 
     * @return PaymentTransaction
     */
    public function updatePaymentTransaction(PaymentTransaction $poPaymentTransaction)
    {
        $this->em->persist($poPaymentTransaction);
        $this->em->flush();
        return $poPaymentTransaction;
    }
    
    /**
     * Add DedicatedIpTransaction to payment transaction.
     * 
     * @param \Diagomail\AppBundle\Entity\DedicatedIpTransaction $poDedicatedIpTransaction
     * @return \Diagomail\AppBundle\Entity\DedicatedIpTransaction
     */
    public function addDedicatedIpTransaction(PaymentTransaction $poPaymentTransaction, \Diagomail\AppBundle\Entity\DedicatedIpTransaction $poDedicatedIpTransaction)
    {
        $poPaymentTransaction->addDedicatedIpTransaction($poDedicatedIpTransaction);
        $poDedicatedIpTransaction->setPaymentTransaction($poPaymentTransaction);

        return $poDedicatedIpTransaction;
    }



    /**
     * change paybox type
     */
    protected function changePayboxType(PaymentTransaction $poPaymentTransaction)
    {
        switch ($poPaymentTransaction->getPayboxType()) {
            // ==== Register new subscriber ====
            case '00056':
                // ==== Debit (Capture) ====
                $poPaymentTransaction->setPayboxType('00002');
                $poPaymentTransaction->setPayboxStatus('authorized');
                break;
            // ==== Debit (Capture) ====
            case '00002':
                // ==== Authorization + Capture on a subscriber ====
                $poPaymentTransaction->setPayboxType('00053');
                $poPaymentTransaction->setPayboxStatus('authorized+debit');
                break;
        }
    }

    /**
     * get numquestion from payboxtype
     * @return string
     */
    protected function getNumquestionByPayboxType(PaymentTransaction $poPaymentTransaction)
    {
        switch ($poPaymentTransaction->getPayboxType()) {
            // ==== Register new subscriber ====
            case '00056':
                return $poPaymentTransaction->getNumquestion();
            // ==== Debit (Capture) ====
            case '00002':
            // ==== Authorization + Capture on a subscriber ====
            case '00053':
                return time();
        }
    }
}

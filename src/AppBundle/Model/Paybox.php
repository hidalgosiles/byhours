<?php
namespace AppBundle\Model;

use Doctrine\ORM\EntityManager;
use Lexik\Bundle\PayboxBundle\Paybox\DirectPlus\Request as PayboxRequest;

/**
 * Paybox  
 *
 * <pre>
 * Gheorghe 03/01/2017 Creation
 * </pre>
 * @author Gheorghe <gheorghe@leadiance.net>
 * @version 1.0
 */
class Paybox
{

    private $em;
    private $payboxRequest;

    /**
     * 00104 Direct PLUS
     * 00103 Direct
     */
    CONST VERSION = '00104';

    /** TYPE
     * 
      00001     -   Authorization only
      00002     -   Debit (Capture)
      00003     -   Authorization + Capture
      00004     -   Credit
      00005     -   Cancel
      00011     -   Check if a transaction exists
      00012     -   Transaction without authorization request
      00013     -   Update the amount of a transaction
      00014     -   Refund
      00017     -   Inquiry
      00051     -   Authorization only on a subscriber          -   Only Direct Plus
      00052     -   Debit on a subscriber                       -   Only Direct Plus
      00053     -   Authorization + Capture on a subscriber     -   Only Direct Plus
      00054     -   Credit on a subscriber                      -   Only Direct Plus
      00055     -   Cancel of a transaction on a subscriber     -   Only Direct Plus
      00056     -   Register new subscriber                     -   Only Direct Plus
      00057     -   Update an existing subscriber               -   Only Direct Plus
      00058     -   Delete a subscriber                         -   Only Direct Plus
      00061     -   Authorization only
     */
    CONST TYPE = '00056';

    /**
     * 020  -   Not specified
     * 021  -   Telephone order
     * 022  -   Mail order
     * 023  -   Minitel (France)
     * 024  -   Internet payment
     * 027  -   Recurring payment
     */
    CONST ACTIVITE = '027';
    CONST PAYS = '';

    /**
     * Construct
     * 
     * @param EntityManager $poEm
     * @param PayboxRequest $poPayboxRequest
     */
    public function __construct(EntityManager $poEm, PayboxRequest $poPayboxRequest)
    {
        $this->em = $poEm;
        $this->payboxRequest = $poPayboxRequest;
    }

    /**
     * Set common params to paybax
     * @param string $psType
     * @param integer $piNumQuestion
     * @param integer $piAmount
     * @param string $psReference
     * @param string $psRefabonne
     * @param string $psCard
     * @param string $psExpired
     * @return PayboxRequest
     */
    protected function setCommonParameters($psType, $piNumQuestion, $piAmount, $psReference, $psRefabonne, $psCard, $psExpired)
    {
        $this->payboxRequest->setParameter('VERSION', self::VERSION); // 00104 Direct PLUS, 00103 Direct
        $this->payboxRequest->setParameter('TYPE', $psType);
        $this->payboxRequest->setParameter('DATEQ', date('dmYHis')); // example 03012017113512 
        $this->payboxRequest->setParameter('NUMQUESTION', $this->generateStrPad($piNumQuestion)); //'time()'
        $this->payboxRequest->setParameter('MONTANT', $piAmount);
        $this->payboxRequest->setParameter('DEVISE', '978');
        $this->payboxRequest->setParameter('REFERENCE', $psReference);
        $this->payboxRequest->setParameter('REFABONNE', $psRefabonne);
        if ($psType != '00002') {
            $this->payboxRequest->setParameter('PORTEUR', $this->digestCardNumber($psCard));
            $this->payboxRequest->setParameter('DATEVAL', $this->digestExpired($psExpired));
            $this->payboxRequest->setParameter('ACTIVITE', self::ACTIVITE);
        }
        $this->payboxRequest->setParameter('PAYS', self::PAYS);
        return $this->payboxRequest;
    }

    /**
     * Set parameters for authorization 
     * 
     * @param integer $piNumQuestion
     * @param integer $piAmount
     * @param string $psCard
     * @param string $psExpired
     * @param string $psReference
     * @param string $psRefabonne
     * @param string $psType
     * @return PayboxRequest
     */
    public function setParameters($piNumQuestion, $piAmount, $psCard, $psExpired, $psReference, $psRefabonne, $psType)
    {
        $this->setCommonParameters($psType, $piNumQuestion, $piAmount, $psReference, $psRefabonne, $psCard, $psExpired);
        return $this->payboxRequest;
    }

    /**
     * Set parameters for authorized and credit
     * 
     * @param integer $piNumQuestion
     * @param integer $piAmount
     * @param string $psCard
     * @param string $psExpired
     * @param string $psNumAppel
     * @param string $psNumTrans
     * @param string $psType
     * @param string $psRefabonne
     * @param string $psReference
     * @return PayboxRequest
     */
    public function setRechargeParameters($piNumQuestion, $piAmount, $psCard, $psExpired, $psNumAppel, $psNumTrans, $psType, $psRefabonne, $psReference)
    {
        $this->setCommonParameters($psType, $piNumQuestion, $piAmount, $psReference, $psRefabonne, $psCard, $psExpired);
        $this->payboxRequest->setParameter('NUMAPPEL', $this->generateStrPad($psNumAppel));
        $this->payboxRequest->setParameter('NUMTRANS', $this->generateStrPad($psNumTrans));
        return $this->payboxRequest;
    }

    /**
     * Call paybox api
     * @return array
     */
    public function send()
    {
        return $this->payboxRequest->send();
    }

    /**
     * Remove spaces on card number
     * @param string $psCardNUmber
     * @return string
     */
    protected function digestCardNumber($psCardNUmber)
    {
        return str_replace(' ', '', $psCardNUmber);
    }

    /**
     * Remove / from expired
     * @param string $psExpired
     * @return string
     */
    protected function digestExpired($psExpired)
    {
        return str_replace('/', '', $psExpired);
    }

    /**
     * 
     * @param string $psString
     * @param integer $piLength
     * @param integer $piChar
     * @return string
     */
    protected function generateStrPad($psString, $piLength = 10, $piChar = 0)
    {
        return str_pad('', (int) ($piLength - strlen($psString)), $piChar, STR_PAD_RIGHT) . $psString;
    }
}

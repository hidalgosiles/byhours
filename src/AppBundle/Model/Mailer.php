<?php
namespace AppBundle\Model;

/**
 * Mailer model
 *
 * <pre>
 * Gheorghe 24/02/2017 Creation
 * </pre>
 * @author Gheorghe Ceban <gheorghe@leadiance.net>
 * @version 1.0
 * @package
 */
class Mailer
{

    private $mailer;
    private $swiftmailerTransportReal;
    private $domain;

    public function __construct(\Swift_Mailer $mailer, $swiftmailerTransportReal, $domain)
    {
        $this->mailer = $mailer;
        $this->swiftmailerTransportReal = $swiftmailerTransportReal;
        $this->domain = $domain;
    }

    /**
     * Send email
     * @param type $psSubject
     * @param type $psEmail
     * @param type $psBody
     * @param type $poSigner
     * @param Swift_Signers_DKIMSigner $paAttach
     * @param type $psBcc
     * @return type
     */
    public function sendEmail($psSubject, $psEmail, $psBody = '', $poSigner = null, array $paAttach = null, $psBcc = null)
    {
        $message = \Swift_Message::newInstance()
                ->setSubject($psSubject)
                ->setFrom('no-reply@'.$this->domain, 'Diagomail')
                ->setTo($psEmail)
                ->setBody("$psBody", 'text/html')
        ;
        if ($paAttach) {
            foreach ($paAttach as $lsAttach) {
                $message->attach(\Swift_Attachment::fromPath($lsAttach));
            }
        }
        if ($psBcc) {
            $message->setBcc($psBcc);
        }
        if ($poSigner instanceof \Swift_Signers_DKIMSigner) {
            $message->attachSigner($poSigner);
        }
        // Send email
        $this->mailer->send($message);
    }

    /**
     * Spool transport
     */
    public function spoolTransport()
    {
        $spool = $this->mailer->getTransport()->getSpool();
        $spool->flushQueue($this->swiftmailerTransportReal);
    }

    /**
     * Sign domain with private key
     * @param type $psPrivateKey
     * @param type $psDomain
     * @param type $psSelector
     * @return \Swift_Signers_DKIMSigner
     */
    public function signEmailDkim($psPrivateKey, $psDomain, $psSelector = 'default')
    {
        $loSigner = new \Swift_Signers_DKIMSigner($psPrivateKey, $psDomain, $psSelector);
        return $loSigner;
    }
}

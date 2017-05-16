<?php
namespace AppBundle\Helpers;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Model\Mailer;
use smsup\SmsupapiBundle\Clases\SmsupSender;

/**
 * Availability Helper 
 *
 * <pre>
 * Gheorghe 24/02/2017 Creation
 * </pre>
 * @author Gheorghe <gheorghe@leadiance.net>
 * @version 1.0
 */
class AvailabilityHelper
{

    private $em;
    private $mailer;
    private $smsup;
    private $availabilityServices;

    /**
     * 
     * @param EntityManager $em
     * @param Mailer $mailer
     * @param type $availabilityServices
     */
    public function __construct(EntityManager $em, Mailer $mailer, SmsupSender $poSmsup, $availabilityServices)
    {
        $this->em = $em;
        $this->mailer = $mailer;
        $this->smsup = $poSmsup;
        $this->availabilityServices = $availabilityServices;
    }

    /**
     * Check services availability
     * @param OutputInterface $poOutput
     */
    public function checkServicesAvailability(OutputInterface $poOutput)
    {
        // ==== Check service availability ====
        foreach ($this->availabilityServices['services'] as $laService) {
            $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Checking service ' . $laService['service'] . ' - ' . $laService['url'] . ':' . $laService['port']);
            $this->checkService($laService, $poOutput);
            $poOutput->writeln('-------------------------------------------------------------------------------');
        }

        // ==== Check SMS credits ====
        $this->checkSmsCredits($poOutput);
    }

    /**
     * Check one service
     * @param type $paService
     * @param OutputInterface $poOutput
     */
    protected function checkService($paService, OutputInterface $poOutput)
    {
        // ==== Try connect to server with port
        $loConnection = @fsockopen($paService['url'], $paService['port']);

        // ---- If there are connection
        if (is_resource($loConnection)) {
            fclose($loConnection);
            $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Service ' . $paService['service'] . ' is avalaible');
        } else {

            // ---- Else no connection
            $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' [WARNING]    Service ' . $paService['service'] . ' is NOT avalaible');
            $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' [WARNING]    Sending email to support. ');
            // ==== If no connection send email to support
            $this->sendEmail($paService['service'], 'is not avalaible');
        }
    }

    /**
     * Check if credits are available
     * 
     * @param OutputInterface $poOutput
     * @return type
     */
    protected function checkSmsCredits(OutputInterface $poOutput)
    {
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Checking SMS credits');
        $liCredits = 0;
        $loSender = $this->smsup;
        $loCreditsService = $loSender->creditosDisponibles();
        if ($loCreditsService->getHttpcode() === 200) {
            $liCredits = $loCreditsService->getResult()['creditos'];
        }
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    There are ' . $liCredits . ' credits yet.');
        if ($liCredits < $this->availabilityServices['sms_alerts']) {
            $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' [WARNING]    The credits is under us limit.');
            $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' [WARNING]    Sending email to support. ');
            $this->sendEmail('SMS credits', 'is under ' . $this->availabilityServices['sms_alerts'] . ' credits');
        }
        return $liCredits;
    }

    /**
     * Send email to support
     * @param type $psService
     */
    protected function sendEmail($psService, $psMessage)
    {
        $laEmails = $this->availabilityServices['support_emails'];
        $lsSubject = 'DANGER - Service ' . $psMessage . ' !!! ' . $psService;
        $lsBody = 'Hello,<br><br>'
                . 'The service ' . $psService . ' ' . $psMessage . '.<br><br>'
                . 'Regards,<br><br>'
                . 'Natexo CORE.'
        ;
        $this->mailer->sendEmail($lsSubject, $laEmails, $lsBody);

        // ==== If wont to send every email at the same moment
        //$this->mailer->spoolTransport();
    }
}

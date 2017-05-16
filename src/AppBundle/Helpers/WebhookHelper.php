<?php
namespace AppBundle\Helpers;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Webhook Helper
 * <pre>
 * Gheorghe 13/03/2017 Creation
 * </pre>
 * @version 1.0
 * @author Gheorghe Ceban <gheorghe@leadiance.net>
 */
class WebhookHelper
{

    private $em;
    private $maxSend;

    /**
     * Construct
     * @param type $em
     */
    public function __construct(EntityManager $em, int $maxSend)
    {
        $this->em = $em;
        $this->maxSend = $maxSend;
    }

    /**
     * Webhook manage.
     * @param OutputInterface $poOutput
     */
    public function manage(OutputInterface $poOutput)
    {
        $laWebhooks = $this->em->getRepository('DiagomailAppBundle:Webhooks')->findForSend($this->maxSend);
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Found [' . count($laWebhooks) . '] webhooks');
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' ============================================== ');
        foreach ($laWebhooks as $laWebhook) {
            // ---- Get the message log ----
            $loMessageLog = $this->em->getRepository('DiagomailAppBundle:MessageLog')->find($laWebhook['mlId']);

            $paData = array(
                'domain' => $loMessageLog->getUserDomain()->getName(),
                'email' => $laWebhook['email'],
                'metadata' => $laWebhook['metadata'],
                'event_name' => $laWebhook['event_name'],
                'creation_date' => $laWebhook['creation_date']->format('d/m/Y H:i:s'),
                'message_id' => $laWebhook['message'],
            );

            try {
                $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Calling ' . $laWebhook['url'] . ' ');
                $psCurlResponse = $this->call($laWebhook['url'], $laWebhook['key'], $paData);
                $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' .'    Response ' . $psCurlResponse . ' ');
                $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Update webhook event log.');
                $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    ----------------------------------------');
                $this->updateWebhookEventLog($laWebhook['welid'], $psCurlResponse);
                $this->em->clear();
            } catch (Exception $lsException) {
                $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Error with webhook'. $laWebhook['url'] .' '. $lsException->getTraceAsString());
                $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    ----------------------------------------');
                continue;
            }
        }
    }

    /**
     * Update webhook event log
     * @param int  $piWebhookEventLog
     * @param string $psResponseCode
     */
    protected function updateWebhookEventLog(int $piWebhookEventLog, string $psResponseCode)
    {
        $loWebhookEvent = $this->em->getRepository('DiagomailAppBundle:WebhookEventLog')->find($piWebhookEventLog);
        $loWebhookEvent->setHttpStatusCode($this->getHttpStatusCode($psResponseCode));
        $this->em->flush($loWebhookEvent);
    }

    /**
     * Get httpCodeResponse
     * @param string $psResponseCode
     * @return \Diagomail\AppBundle\Entity\HttpStatusCode
     */
    protected function getHttpStatusCode(string $psResponseCode)
    {
        $loStatusCode = $this->em->getRepository('DiagomailAppBundle:HttpStatusCode')->findOneBy(array('name' => $psResponseCode));
        if (!$loStatusCode) {
            $loStatusCode = new \Diagomail\AppBundle\Entity\HttpStatusCode();
            $loStatusCode->setName($psResponseCode);
            $loStatusCode->setDescription($psResponseCode);
            $this->em->persist($loStatusCode);
            $this->em->flush($loStatusCode);
        }
        return $loStatusCode;
    }

    /**
     * Call webhook
     * @param string $psUrl
     * @param string $lsKey
     * @param array $paData
     * @return string
     */
    protected function call(string $psUrl, string $lsKey, array $paData)
    {
        $poCurl = curl_init();

        curl_setopt($poCurl, CURLOPT_POST, 1);

        curl_setopt($poCurl, CURLOPT_POSTFIELDS, $paData);

        // Optional Authentication:
        curl_setopt($poCurl, CURLOPT_HTTPHEADER, array(
            'X-Diago-Auth: ' . $lsKey,
        ));

        curl_setopt($poCurl, CURLOPT_URL, $psUrl);
        curl_setopt($poCurl, CURLOPT_RETURNTRANSFER, true);

        curl_exec($poCurl);

        $psCode = curl_getinfo($poCurl, CURLINFO_HTTP_CODE);
        curl_close($poCurl);

        return $psCode;
    }
}

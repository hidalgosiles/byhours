<?php
namespace AppBundle\Helpers;

use Doctrine\ORM\EntityManager;
use AppBundle\Model\S3Uploader;

/**
 * Export Helper
 * <pre>
 * Gheorghe 19/01/2017 Creation
 * </pre>
 * @version 1.0
 * @author Gheorghe Ceban <gheorghe@leadiance.net>
 */
class ExportHelper
{

    private $em;
    private $S3Uploader;

    /**
     * Construct
     * @param type $em
     */
    public function __construct(EntityManager $em, S3Uploader $S3Uploader)
    {
        $this->em = $em;
        $this->S3Uploader = $S3Uploader;
    }

    /**
     * Create export
     * @param \Diagomail\AppBundle\Entity\Export $loExport
     * @return boolean
     */
    public function createExport(\Diagomail\AppBundle\Entity\Export $loExport)
    {
        // ==== Get user's api keys
        $laUserApiKeys = $loExport->getUser()->getActiveApiKeys();
        $loFrom = $loExport->getFromDatetime();
        $loTo = $loExport->getToDatetime();
        $laLogs = array();
        foreach ($loExport->getExportEvents() as $loExportEvent) {
            $this->switchExportEventId($laLogs, $laUserApiKeys, $loExportEvent, $loFrom, $loTo);
        }
        
        // ==== Save file and upload to Amazon S3
        $this->manageFileAndUploadToS3($loExport, $laLogs, array_sum(array_map('count', $laLogs)));
    }

    /**
     * Create file and upload to S3
     * @param string $poExport
     * @param string $paLogs
     * @param integer $piEstimateVolume
     */
    protected function manageFileAndUploadToS3(\Diagomail\AppBundle\Entity\Export $poExport, $paLogs, $piEstimateVolume)
    {
        // ==== filename
        $lsCsvFilename = 'export_' . md5($poExport->getUser()->getId() . '_' . $poExport->getUser()->getUsername() . '_' . time()) . '.csv';
        
        // ==== Temp file path
        $psPathFile = 'web/uploads/export/' . $lsCsvFilename;
        
        // ==== Export data to csv
        $loDataCsv = $this->exportToCsv($paLogs, $psPathFile);
        
        // ==== S3 key
        $lsKey = 'export/' . $lsCsvFilename;
        
        // ==== Upload file to Amazon S3
        $this->uploadToS3(realpath($psPathFile), $lsKey);
        
        // ==== Get the URL from S3
        $lsUrl = $this->S3Uploader->getObjectUrl('diagomail-test', $lsKey);
        
        // ==== Set configuration params to export entity
        $this->updateExport($poExport, $lsUrl, $lsKey, $piEstimateVolume);
        
        // ==== Remove file from us server
        unlink(realpath($psPathFile));
    }

    /**
     * Update Export
     * @param \Diagomail\AppBundle\Entity\Export $poExport
     * @param string $psUrl
     * @param string $psKey
     * @param integer $piEstimateVolume
     */
    protected function updateExport(\Diagomail\AppBundle\Entity\Export &$poExport, $psUrl, $psKey, $piEstimateVolume)
    {

        $poExport->setUrl($psUrl);
        $poExport->setKey($psKey);
        $poExport->setEstimatedVolume($piEstimateVolume);
        $exportStatus = $this->em->getRepository('DiagomailAppBundle:ExportStatus')->find(2);
        $poExport->setExportStatus($exportStatus);
        $this->em->flush();
        return $poExport;
    }

    /**
     * Get logs by user's api keys
     * @param array $paUserApiKeys
     * @param string $psObject
     * @param string $psFrom
     * @param string $psTo
     * @return array
     */
    protected function getLogsByUserApiKeys($paUserApiKeys, $psObject, $psFrom = null, $psTo = null)
    {
        return $this->em->getRepository($psObject)->findByApiKeys($paUserApiKeys, $psObject, $psFrom, $psTo);
    }

    /**
     * Switch export event by id
     * @param array $paLogs
     * @param array $paUserApiKeys
     * @param \Diagomail\AppBundle\Entity\ExportEvent $poExportEvent
     * @param \Datetime $poFrom
     * @param \Datetime $poTo
     * @return array
     */
    protected function switchExportEventId(&$paLogs, $paUserApiKeys, $poExportEvent, $poFrom, $poTo)
    {
        switch ($poExportEvent->getEvent()->getId()) {
            case 1: // bounce
                $paLogs['bounce'] = $this->getLogsByUserApiKeys($paUserApiKeys, 'DiagomailAppBundle:BounceBlockLog', $poFrom, $poTo);
                break;
            case 2: // open
                $paLogs['open'] = $this->getLogsByUserApiKeys($paUserApiKeys, 'DiagomailAppBundle:OpenLog', $poFrom, $poTo);
                break;
            case 3: // hard-bounce
                $paLogs['hard-bounce'] = $this->getLogsByUserApiKeys($paUserApiKeys, 'DiagomailAppBundle:BounceHbLog', $poFrom, $poTo);
                break;
            case 4: // reject
                $paLogs['reject'] = $this->getLogsByUserApiKeys($paUserApiKeys, 'DiagomailAppBundle:RejectLog', $poFrom, $poTo);
                break;
            case 5: // soft-bounce
                $paLogs['soft-bounce'] = $this->getLogsByUserApiKeys($paUserApiKeys, 'DiagomailAppBundle:BounceSbLog', $poFrom, $poTo);
                break;
            case 6: // click
                $paLogs['click'] = $this->getLogsByUserApiKeys($paUserApiKeys, 'DiagomailAppBundle:ClickLog', $poFrom, $poTo);
                break;
            case 7: // unsubscribe
                $paLogs['unsubscribe'] = $this->getLogsByUserApiKeys($paUserApiKeys, 'DiagomailAppBundle:UnsubscribeLog', $poFrom, $poTo);
                break;
            case 8: // complaint
                $paLogs['complaint'] = $this->getLogsByUserApiKeys($paUserApiKeys, 'DiagomailAppBundle:ComplaintLog', $poFrom, $poTo);
                break;
        }
        return $paLogs;
    }

    /**
     * Export data to csv
     * 
     * @param type $paLogs
     * @param type $psCsvFilename
     * @return type
     */
    protected function exportToCsv($paLogs, $psCsvFilename)
    {
        $loCSV = fopen($psCsvFilename, 'w');
        fputcsv($loCSV, array('EMAIL', 'DATETIME', 'EVENT'));
        foreach ($paLogs as $lsKey => $laEvents) {
            $this->getRecursiveArray($loCSV, $lsKey, $laEvents);
        }
        fclose($loCSV);
        return $loCSV;
    }

    /**
     * Recursive array for csv
     * 
     * @param type $poCSV
     * @param type $psKey
     * @param type $paEvents
     * @return type
     */
    protected function getRecursiveArray(&$poCSV, $psKey, $paEvents)
    {
        foreach ($paEvents as $laEvent) {
            fputcsv($poCSV, array($laEvent['accountName'], $laEvent['creationDate'] instanceof \DateTime ? $laEvent['creationDate']->format('d-m-Y H:i:s') : ' ', $psKey));
        }
        return $poCSV;
    }

    /**
     * Upload file to S3
     * 
     * @param type $psFile
     * @param type $psKey
     */
    protected function uploadToS3($psFile, $psKey)
    {
        $this->S3Uploader->upload('diagomail-test', $psKey, $psFile);
    }
}

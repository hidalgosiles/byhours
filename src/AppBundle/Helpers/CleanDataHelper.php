<?php
namespace AppBundle\Helpers;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Clean Data Helper
 *
 * <pre>
 * Gheorghe 24/02/2017 Creation
 * </pre>
 * @author Gheorghe <gheorghe@leadiance.net>
 * @version 1.0
 */
class CleanDataHelper
{

    private $em;
    private $dataCleanSettings;

    /**
     * 
     * @param EntityManager $em
     * @param int $dataCleanSettings
     */
    public function __construct(EntityManager $em, int $dataCleanSettings)
    {
        $this->em = $em;
        $this->dataCleanSettings = $dataCleanSettings;
    }

    public function cleanData(OutputInterface $poOutput)
    {
        // ==== Clean Message
        $laMessages = $this->em->getRepository('DiagomailAppBundle:MessageLog')->findOlderThan($this->dataCleanSettings);
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Found ' . count($laMessages) . ' message logs.');
        $this->removeLogs($laMessages);
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Message logs was removed.');
    }

    /**
     * Remove each object
     * @param array $paObjects
     */
    protected function removeLogs($paObjects)
    {
        // ==== Remove every object
        foreach ($paObjects as $loObject) {
            $this->em->remove($loObject);
        }
        $this->em->flush();
    }
}

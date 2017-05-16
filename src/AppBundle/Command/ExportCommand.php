<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ExportCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
                ->setName('app:check:export')
                ->setDescription('Do a export.')
                ->setHelp('This command allows you to export data manually.')
        ;
    }

    protected function execute(InputInterface $poInput, OutputInterface $poOutput)
    {
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' Start export ...');
        $laExports = $em->getRepository('DiagomailAppBundle:Export')->findBy(array(
            'exportStatus' => '1'
        ));
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Found ' . count($laExports) . ' exports');
        $loExportHelper = $this->getContainer()->get('export.helper');
        foreach ($laExports as $loExport) {
            $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Start Export - ' . $loExport->getId());
            $loExportHelper->createExport($loExport);
            $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    End Export - ' . $loExport->getId());
            $poOutput->writeln('--------------------------------------------------------------');
        }
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' Export finished.');
    }
}

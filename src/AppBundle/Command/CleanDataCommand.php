<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class CleanDataCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
                ->setName('app:clean:data')
                ->setDescription('Clean logs data older than 1 month.')
                ->setHelp('This command allows you to clean log older than 1 month.')
        ;
    }

    protected function execute(InputInterface $poInput, OutputInterface $poOutput)
    {
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' Start clean data ...');
        $poOutput->writeln('-------------------------------------------------------------------------------');
        $loCleanDataHelper = $this->getContainer()->get('clean_data.helper');

        $loCleanDataHelper->cleanData($poOutput);

        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' Clean data finished.');
    }
}

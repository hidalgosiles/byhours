<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class AvailabilityCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
                ->setName('app:check:availability')
                ->setDescription('Check service availability.')
                ->setHelp('This command allows you to check service availability.')
        ;
    }

    protected function execute(InputInterface $poInput, OutputInterface $poOutput)
    {
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' Start services availability ...');
        $poOutput->writeln('-------------------------------------------------------------------------------');
        $loAvailabilityHelper = $this->getContainer()->get('availability.helper');

        $loAvailabilityHelper->checkServicesAvailability($poOutput);

        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' Services availability finished.');
    }
}

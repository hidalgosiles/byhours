<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReputationCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
                ->setName('app:account:reputation')
                ->setDescription('Update users reputation.')
                ->setHelp('This command allows you to update users hourly quota.')
        ;
    }

    protected function execute(InputInterface $poInput, OutputInterface $poOutput)
    {
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' Start reputation update');
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' ============================================== ');
        $loReputationHelper = $this->getContainer()->get('reputation.helper');
        $loReputationHelper->manage($poOutput);
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' ============================================== ');
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' Reputation update finished.');
    }

}

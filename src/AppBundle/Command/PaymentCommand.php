<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\LockHandler;

class PaymentCommand extends ContainerAwareCommand
{
    /**
     * Display command messages
     * @var SymfonyStyle
     */
    private $io;

    protected function configure()
    {
        $this
                ->setName('app:payment:renewal')
                ->setDescription('Recharge payments.')
                ->setHelp('This command allows you to recharge payments to users.')
        ;
    }

    protected function execute(InputInterface $poInput, OutputInterface $poOutput)
    {
        // ==== Initialisation ====
        $this->io = new SymfonyStyle($poInput, $poOutput);
        $this->io->title($this->getDate() . 'Recharge payments for standard users');
        if (!(new LockHandler('payment.renewal'))->lock()) {
            $this->io->writeln('Already running...');
            return 1;
        }

        $loPaymentHelper = $this->getContainer()->get('payment.helper');
        $loPaymentHelper->managePayments($this->io);
        $this->io->writeln($this->getDate() . 'Recharge payments is finished.');
    }

    /**
     * Get current date for traces
     *
     * @return string
     */
    private function getDate()
    {
        return date('Y-m-d H:i:s - ');
    } // getDate
}

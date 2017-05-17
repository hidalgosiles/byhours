<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AppCheckParenthesesCommand extends ContainerAwareCommand
{
    /**
     * Display command messages
     * @var SymfonyStyle
     */
    private $io;

    protected function configure()
    {
        $this
            ->setName('app:check-parentheses')
            ->setDescription('Check if a string has well-formed parentheses.')
            ->setHelp('This command check a string with parentheses')
            ->addArgument('string', InputArgument::REQUIRED, 'String for check')
        ;
    }

    /**
     * Execute function.
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $string = $input->getArgument('string');
        // ==== Initialisation ====
        $this->io = new SymfonyStyle($input, $output);

        $this->io->title($this->getDate() . ' Analize a string');

        $checkParenthesesHelper = $this->getContainer()->get('check_parentheses.helper');
        $rc = $checkParenthesesHelper->analize($this->io, $string);
        if (!$rc) {
            $this->io->error('The string '. $string .' is not well-formed.');
        } else {
            $this->io->success('The string '. $string. ' is well-formed');
        }
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

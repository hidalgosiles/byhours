<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Question\Question;

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
        ;
    }

    /**
     * Execute function.
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // ==== Initialisation ====
        $this->io = new SymfonyStyle($input, $output);

        $this->io->title($this->getDate() . ' Analize a string');

        $checkParenthesesHelper = $this->getContainer()->get('check_parentheses.helper');

        // ---- @Symfony\Component\Console\Question\Question ----
        $helperQuestion = $this->getHelper('question');
        $question = new Question("Please enter the string:\n");
        $question->setValidator(function ($answer) {
            if (trim($answer) == '') {
                throw new \RuntimeException('Enter a valid string, please');
            }

            return $answer;
        });

        // ---- Get the string ----
        $string = $helperQuestion->ask($input, $output, $question);

        $rc = $checkParenthesesHelper->analize($this->io, $string);
        if ($rc === true) {
            $this->io->success('The string '. $string. ' is well-formed');
        } else {
            $this->io->error('The string '. $string .' is not well-formed.');
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

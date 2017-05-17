<?php

namespace AppBundle\Helpers;

use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Description of CheckParenthesesHelper
 * <pre>
 * Ivan 17/05/2017 Creation
 * </pre>
 * @author ivan <hidalgosiles@gmail.com>
 * @version 1.0
 */
class CheckParenthesesHelper
{
    private $io;
    private $count;
    
    /**
     * Construct
     * @param type $em
     */
    public function __construct()
    {

    }

    /**
     * Analize a string.
     *
     * @param SymfonyStyle $poIO
     * @param string       $string
     * @return boolean
     */
    public function analize(SymfonyStyle $poIO, $string)
    {
        $this->io = $poIO;
        $this->count = 0;
        $response = false;

        $this->io->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' Analizando cadena <info>' . $string . '</info>.');

        // If not exist parenthesis exit function
        if (preg_match('/[\\(\\)]/', $string) == false) {
            $this->io->writeln('The string '.$string.' has not parentheses.');
            return true;
        }

        $this->checkParentheses($string);

        if ($this->count == 0) {
            $response = true;
        }

        return $response;
    }

    /**
     * Check the string with parenthesis.
     *
     * @param string $string    String for check
     * @return void
     */
    protected function checkParentheses($string)
    {
        // Get the first chart of string
        $firstChart = substr($string, 0, 1);
        // Remove the first chart of string
        $newString = substr($string, 1);

        // Check if the character is parenthesis
        switch ($firstChart) {
            case '(':
                $this->count++;
                break;
            case ')':
                $this->count--;
                break;
        }

        if (strlen($newString) == 0) {
            return;
        }

        // Check the next character
        $this->checkParentheses($newString);
    }

}

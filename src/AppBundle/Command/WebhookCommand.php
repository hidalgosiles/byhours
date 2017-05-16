<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class WebhookCommand extends ContainerAwareCommand
{

    private $path = '/var/run/diago_wh.pid';

    protected function configure()
    {
        $this
                ->setName('app:webhook:send')
                ->setDescription('Connect to webhooks to client.')
                ->setHelp('This command allows you to send data to user webhooks.')
        ;
    }

    protected function execute(InputInterface $poInput, OutputInterface $poOutput)
    {
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' Check if process is running ...');

        if ($this->managePid() == FALSE) {
            $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Process [' . file_get_contents($this->path) . '] is running ...');
            return;
        }
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    No running process ...');
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' ============================================== ');
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Start to manage webhooks ...');
        $loWebhookHelper = $this->getContainer()->get('webhook.helper');
        $loWebhookHelper->manage($poOutput);
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' ============================================== ');
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Remove Pid file.');
        $this->removePidFile();
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' ============================================== ');
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' Webhook send finished.');
    }

    /**
     * Manage PID
     * @return boolean
     */
    protected function managePid()
    {
        $lbFileExist = $this->checkIfFileExist();
        // ==== Check if file exist
        if ($lbFileExist == FALSE) {
            $this->savePidFile();
            return TRUE;
        }
        // ==== Check if file exist and if process is finished
        if ($lbFileExist == TRUE AND $this->checkIfProcessIsRunning() == FALSE) {
            $this->removePidFile();
            $this->savePidFile();
            return TRUE;
        }
        return FALSE;
    }

    /**
     * Save file with PID
     */
    protected function savePidFile()
    {
        $liPid = getmypid();
        file_put_contents($this->path, $liPid);
    }

    /**
     * Remove file with PID
     */
    protected function removePidFile()
    {
        unlink($this->path);
    }

    /**
     * Cehck if process is running
     * @return boolean
     */
    protected function checkIfProcessIsRunning()
    {
        $liPid = file_get_contents($this->path);
        if (posix_getpgid($liPid) == 0) {
            return FALSE;
        }
        return TRUE;
    }

    /**
     * Check if file exist
     * @return boolean
     */
    protected function checkIfFileExist()
    {
        if (file_exists($this->path)) {
            return TRUE;
        }
        return FALSE;
    }
}

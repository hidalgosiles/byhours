<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class DomainCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
                ->setName('app:check:domain')
                ->setDescription('Check domains settings.')
                ->setHelp('This command allows you to check domains settings.')
        ;
    }

    protected function execute(InputInterface $poInput, OutputInterface $poOutput)
    {
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' Start domains checking ...');
        $laUserDomain = $em->getRepository('DiagomailAppBundle:UserDomain')->findBy(array(
            'removed' => FALSE
        ));
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Found ' . count($laUserDomain) . ' domains');
        $loDomainHelper = $this->getContainer()->get('domain.helper');
        foreach ($laUserDomain as $loUserDomain) {
            $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Start domain checking - ' . $loUserDomain->getName());
            $loDomainHelper->checkDomainSettings($loUserDomain, $poOutput);
            $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    End domain checking - ' . $loUserDomain->getName());
            $poOutput->writeln('--------------------------------------------------------------');
        }
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . ' Domain checking finished.');
    }
}

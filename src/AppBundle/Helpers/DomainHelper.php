<?php
namespace AppBundle\Helpers;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Domain Helper 
 *
 * <pre>
 * Gheorghe 24/02/2017 Creation
 * </pre>
 * @author Gheorghe <gheorghe@leadiance.net>
 * @version 1.0
 */
class DomainHelper
{

    private $em;
    private $domainSettings;

    /**
     * 
     * @param EntityManager $em
     * @param type $domainSettings
     */
    public function __construct(EntityManager $em, $domainSettings)
    {
        $this->em = $em;
        $this->domainSettings = $domainSettings;
    }

    /**
     * Get domain settings
     * @return type
     */
    public function getDomainSettings()
    {
        return $this->domainSettings;
    }

    /**
     * Get CNAME settings
     * @param type $psDomain
     * @return type
     */
    public function getCnameSettings($psDomain)
    {
        $laSettings = dns_get_record($psDomain, DNS_CNAME);
        if (!empty($laSettings)) {
            return $laSettings[0]['target'];
        }
        return null;
    }

    /**
     * Get SPF text
     * @param type $psDomain
     * @return type
     */
    public function getSpfSettings($psDomain)
    {
        $laSettings = dns_get_record($psDomain, DNS_TXT);
        if (!empty($laSettings)) {
            return $laSettings[0]['txt'];
        }
        return null;
    }

    /**
     * Get SPF text
     * @param type $psDomain
     * @return type
     */
    public function getDkimSettings($psDomain)
    {
        $laDomainSettings = $this->getDomainSettings();
        $lsSubdomain = $laDomainSettings['selector'] . '.' . $laDomainSettings['domain_key'];
        $laSettings = dns_get_record($lsSubdomain . '.' . $psDomain, DNS_TXT);
        if (!empty($laSettings)) {
            return $laSettings[0]['txt'];
        }
        return null;
    }

    /**
     * Set spf settings
     * 
     * @param \Diagomail\AppBundle\Entity\UserDomain $psDomain
     * @return \Diagomail\AppBundle\Entity\UserDomain
     */
    protected function setSpfSettings(\Diagomail\AppBundle\Entity\UserDomain &$psDomain)
    {
        $lsSpfText = $this->getSpfSettings($psDomain->getName());
        if ($lsSpfText != null AND $lsSpfText == $psDomain->getSpfText()) {
            $psDomain->setSpfValidation(new \DateTime("NOW"));
            $psDomain->setSpfEnabled(true);
        } else {
            $psDomain->setSpfEnabled(false);
        }
        return $psDomain;
    }

    /**
     * Set dkim settings
     * 
     * @param \Diagomail\AppBundle\Entity\UserDomain $psDomain
     * @return \Diagomail\AppBundle\Entity\UserDomain
     */
    protected function setDkimSettings(\Diagomail\AppBundle\Entity\UserDomain &$psDomain)
    {
        $lsDkimSettings = $this->getDkimSettings($psDomain->getName());
        if ($lsDkimSettings != null AND $lsDkimSettings == $psDomain->getDkimText()) {
            $psDomain->setDkimValidation(new \DateTime("NOW"));
            $psDomain->setDkimEnabled(true);
        } else {
            $psDomain->setDkimEnabled(false);
        }
        return $psDomain;
    }

    /**
     * Set cname settings
     * @param \Diagomail\AppBundle\Entity\UserDomain $psDomain
     * @return \Diagomail\AppBundle\Entity\UserDomain
     */
    protected function setCnameSettings(\Diagomail\AppBundle\Entity\UserDomain &$poDomain)
    {
        if (is_null($poDomain->getTrackingDomain())) {
            $lsTrackingDomain = $this->getDomainSettings()['prefix'].'.'.$poDomain->getName();
            $poDomain->setTrackingDomain($lsTrackingDomain);
            $this->em->persist($poDomain);
            $this->em->flush($poDomain);
        }

        $lsCnameSettings = $this->getCnameSettings($poDomain->getTrackingDomain());
        $poDomain->setCnameValidation(new \DateTime("NOW"));
        if ($lsCnameSettings != null AND $lsCnameSettings == $this->getDomainSettings()['cname']) {
            $poDomain->setCnameValidation(new \DateTime("NOW"));
            $poDomain->setCnameEnabled(true);
        } else {
            $poDomain->setCnameEnabled(false);
        }
        return $poDomain;
    }

    /**
     * Check if domain settings is that we need
     * @param \Diagomail\AppBundle\Entity\UserDomain $poDomain
     * @return \Diagomail\AppBundle\Entity\UserDomain
     */
    public function checkDomainSettings(\Diagomail\AppBundle\Entity\UserDomain $poDomain, OutputInterface $poOutput)
    {
        // ===== GET SPF settings =====
        $this->setSpfSettings($poDomain);
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Check SPF records - ' . ($poDomain->getSpfEnabled() == TRUE ? 'TRUE' : 'FALSE'));

        // ===== GET DKIM settings =====
        $this->setDkimSettings($poDomain);
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Check DKIM records - ' . ($poDomain->getDkimEnabled() == TRUE ? 'TRUE' : 'FALSE'));

        // ===== GET CNAME settings =====
        $this->setCnameSettings($poDomain);
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Check CNAME records - ' . ($poDomain->getCnameEnabled() == TRUE ? 'TRUE' : 'FALSE'));

        // ===== Enabling domain if all is ok =====
        if ($poDomain->getDkimEnabled() == TRUE AND $poDomain->getSpfEnabled() == TRUE AND $poDomain->getCnameEnabled() == TRUE) {
            $poDomain->setEnabled(true);
        } else {
            $poDomain->setEnabled(false);
            $poDomain->setErrorDate(new \DateTime("NOW"));
        }
        $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    The DOMAIN settings are - ' . ($poDomain->getEnabled() == TRUE ? 'TRUE' : 'FALSE'));
        $this->em->flush($poDomain);
        return $poDomain;
    }
}

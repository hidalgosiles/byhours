<?php
namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * UserProperties
 *
 * @ORM\Table(name="user_properties",
 *  indexes={@ORM\Index(name="idx_c5d53c5fc6798db", columns={"account_type_id"}),
 *           @ORM\Index(name="idx_c5d53c5f3fe997de", columns={"timezone_id"}),
 *           @ORM\Index(name="idx_c5d53c5f82f1baf4", columns={"language_id"})
 * @ORM\Entity
 */
class UserProperties
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", options={"default" = "nextval('user_properties_id_seq'::regclass)"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="user_properties_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=false)
     */
    private $creationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="advertiser_id", type="string", nullable=true)
     */
    private $advertiserId;

    /**
     * @var \UserBundle\Entity\AccountType
     *
     * @ORM\ManyToOne(targetEntity="\UserBundle\Entity\AccountType", inversedBy="userProperties")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_type_id", referencedColumnName="id")
     * })
     */
    private $accountType;

    /**
     * @var \UserBundle\Entity\Timezone
     *
     * @ORM\ManyToOne(targetEntity="\UsersBundle\Entity\Timezone", inversedBy="userProperties")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="timezone_id", referencedColumnName="id")
     * })
     */
    private $timezone;

    /**
     * @var UserBundle\Entity\Languages
     *
     * @ORM\ManyToOne(targetEntity="\UserBundle\Entity\Languages", inversedBy="userProperties")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="language_id", referencedColumnName="id")
     * })
     */
    private $languages;

    /**
     * @var string
     *
     * @ORM\Column(name="email_billing_notifications", type="string", nullable=true)
     */
    private $emailBillingNotifications;

    /**
     *
     * @ORM\OneToOne(targetEntity="\UserBundle\Entity\Users", mappedBy="userProperties")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
 
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return UserProperties
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set quotaHourly
     *
     * @param float $quotaHourly
     *
     * @return UserProperties
     */
    public function setQuotaHourly($quotaHourly)
    {
        $this->quotaHourly = $quotaHourly;

        return $this;
    }

    /**
     * Get quotaHourly
     *
     * @return float
     */
    public function getQuotaHourly()
    {
        return $this->quotaHourly;
    }

    /**
     * Set accountType
     *
     * @param \Diagomail\UsersBundle\Entity\AccountType $accountType
     *
     * @return UserProperties
     */
    public function setAccountType(\Diagomail\UsersBundle\Entity\AccountType $accountType = null)
    {
        $this->accountType = $accountType;

        return $this;
    }

    /**
     * Get accountType
     *
     * @return \Diagomail\UsersBundle\Entity\AccountType
     */
    public function getAccountType()
    {
        return $this->accountType;
    }

    /**
     * Set reputationLevel
     *
     * @param \Diagomail\UsersBundle\Entity\UserReputationLevel $reputationLevel
     *
     * @return UserProperties
     */
    public function setReputationLevel(\Diagomail\UsersBundle\Entity\UserReputationLevel $reputationLevel = null)
    {
        $this->reputationLevel = $reputationLevel;

        return $this;
    }

    /**
     * Get reputationLevel
     *
     * @return \Diagomail\UsersBundle\Entity\UserReputationLevel
     */
    public function getReputationLevel()
    {
        return $this->reputationLevel;
    }

    /**
     * Set timezone
     *
     * @param \Diagomail\UsersBundle\Entity\Timezone $timezone
     *
     * @return UserProperties
     */
    public function setTimezone(\Diagomail\UsersBundle\Entity\Timezone $timezone = null)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone
     *
     * @return \Diagomail\UsersBundle\Entity\Timezone
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Set languages
     *
     * @param \Diagomail\UsersBundle\Entity\Languages $languages
     *
     * @return UserProperties
     */
    public function setLanguages(\Diagomail\UsersBundle\Entity\Languages $languages = null)
    {
        $this->languages = $languages;

        return $this;
    }

    /**
     * Get languages
     *
     * @return \Diagomail\UsersBundle\Entity\Languages
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Set user
     *
     * @param \Diagomail\UsersBundle\Entity\Users $user
     *
     * @return UserProperties
     */
    public function setUser(\Diagomail\UsersBundle\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Diagomail\UsersBundle\Entity\Users
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set company
     *
     * @param \Diagomail\UsersBundle\Entity\Company $company
     *
     * @return UserProperties
     */
    public function setCompany(\Diagomail\UsersBundle\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Diagomail\UsersBundle\Entity\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set creditPackage
     *
     * @param \Diagomail\AppBundle\Entity\CreditPackages $creditPackage
     *
     * @return UserProperties
     */
    public function setCreditPackage(\Diagomail\AppBundle\Entity\CreditPackages $creditPackage = null)
    {
        $this->creditPackage = $creditPackage;

        return $this;
    }

    /**
     * Get creditPackage
     *
     * @return \Diagomail\AppBundle\Entity\CreditPackages
     */
    public function getCreditPackage()
    {
        return $this->creditPackage;
    }

    /**
     * Set emailBillingNotifications
     *
     * @param string $emailBillingNotifications
     *
     * @return UserProperties
     */
    public function setEmailBillingNotifications($emailBillingNotifications)
    {
        $this->emailBillingNotifications = $emailBillingNotifications;

        return $this;
    }

    /**
     * Get emailBillingNotifications
     *
     * @return string
     */
    public function getEmailBillingNotifications()
    {
        return $this->emailBillingNotifications;
    }

    /**
     * Add creditBalanceTransaction
     *
     * @param \Diagomail\AppBundle\Entity\CreditBalanceTransaction $creditBalanceTransaction
     *
     * @return UserProperties
     */
    public function addCreditBalanceTransaction(\Diagomail\AppBundle\Entity\CreditBalanceTransaction $creditBalanceTransaction)
    {
        $this->creditBalanceTransaction[] = $creditBalanceTransaction;

        return $this;
    }

    /**
     * Remove creditBalanceTransaction
     *
     * @param \Diagomail\AppBundle\Entity\CreditBalanceTransaction $creditBalanceTransaction
     */
    public function removeCreditBalanceTransaction(\Diagomail\AppBundle\Entity\CreditBalanceTransaction $creditBalanceTransaction)
    {
        $this->creditBalanceTransaction->removeElement($creditBalanceTransaction);
    }

    /**
     * Get creditBalanceTransaction
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCreditBalanceTransaction()
    {
        return $this->creditBalanceTransaction;
    }

    /**
     * Set advertiserId
     *
     * @param string $advertiserId
     *
     * @return UserProperties
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;

        return $this;
    }

    /**
     * Get advertiserId
     *
     * @return string
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * Set advertiserCpm
     *
     * @param float $advertiserCpm
     *
     * @return UserProperties
     */
    public function setAdvertiserCpm($advertiserCpm)
    {
        $this->advertiserCpm = $advertiserCpm;

        return $this;
    }

    /**
     * Get advertiserCpm
     *
     * @return float
     */
    public function getAdvertiserCpm()
    {
        return $this->advertiserCpm;
    }

    /**
     * Set manualQuota
     *
     * @param boolean $manualQuota
     *
     * @return UserProperties
     */
    public function setManualQuota($manualQuota)
    {
        $this->manualQuota = $manualQuota;

        return $this;
    }

    /**
     * Get manualQuota
     *
     * @return boolean
     */
    public function getManualQuota()
    {
        return $this->manualQuota;
    }
}

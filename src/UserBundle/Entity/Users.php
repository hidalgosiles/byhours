<?php
namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Users
 *
 * @ORM\Table(name="users",
 *  indexes={@ORM\Index(name="idx_C5D53C5FA76ED395", columns={"user_properties_id"}),
 *           @ORM\Index(name="idx_A175C483A76ED377", columns={"user_personal_data_id"})})
 * @ORM\Entity(repositoryClass="\UserBundle\Repository\UsersRepository")
 */
class Users extends BaseUser
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", options={"default" = "nextval('users_id_seq'::regclass)"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="users_id_seq", allocationSize=1, initialValue=1)
     */
    protected $id;

    /**
     * @var \UserBundle\Entity\UserStatus
     *
     * @ORM\ManyToOne(targetEntity="\UserBundle\Entity\UserStatus", inversedBy="user")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_status_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $userStatus;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="\UserBundle\Entity\UserActivity", mappedBy="user")
     */
    private $userActivity;

    /**
     * @var \UserBundle\Entity\UserProperties
     *
     * @ORM\OneToOne(targetEntity="\UserBundle\Entity\UserProperties", inversedBy="user", cascade={"persist"})
     * @ORM\JoinColumn(name="user_properties_id", referencedColumnName="id", nullable=true)
     */
    private $userProperties;

    /**
     * @var \UserBundle\Entity\UserPersonalData
     *
     * @ORM\OneToOne(targetEntity="\UsersBundle\Entity\UserPersonalData", inversedBy="user", cascade={"persist"})
     * @ORM\JoinColumn(name="user_personal_data_id", referencedColumnName="id", nullable=true)
     */
    private $userPersonalData;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\RoomUser", mappedBy="user")
     */
    private $roomUser;

    public function __construct()
    {
        parent::__construct();
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        // your own logic
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
     * Set userStatus
     *
     * @param \UserBundle\Entity\UserStatus $userStatus
     *
     * @return Users
     */
    public function setUserStatus(\UserBundle\Entity\UserStatus $userStatus = null)
    {
        $this->userStatus = $userStatus;

        return $this;
    }

    /**
     * Get userStatus
     *
     * @return \UserBundle\Entity\UserStatus
     */
    public function getUserStatus()
    {
        return $this->userStatus;
    }

    /**
     * Add userActivity
     *
     * @param \UserBundle\Entity\UserActivity $userActivity
     *
     * @return Users
     */
    public function addUserActivity(\UserBundle\Entity\UserActivity $userActivity)
    {
        $this->userActivity[] = $userActivity;

        return $this;
    }

    /**
     * Remove userActivity
     *
     * @param \UserBundle\Entity\UserActivity $userActivity
     */
    public function removeUserActivity(\UsersBundle\Entity\UserActivity $userActivity)
    {
        $this->userActivity->removeElement($userActivity);
    }

    /**
     * Get userActivity
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserActivity()
    {
        return $this->userActivity;
    }


    /**
     * Add smsLog
     *
     * @param \Diagomail\UsersBundle\Entity\SmsLog $smsLog
     *
     * @return Users
     */
    public function addSmsLog(\Diagomail\UsersBundle\Entity\SmsLog $smsLog)
    {
        $this->smsLog[] = $smsLog;

        return $this;
    }

    /**
     * Set userProperties
     *
     * @param \UserBundle\Entity\UserProperties $userProperties
     *
     * @return Users
     */
    public function setUserProperties(\UserBundle\Entity\UserProperties $userProperties = null)
    {
        $this->userProperties = $userProperties;

        return $this;
    }

    /**
     * Get userProperties
     *
     * @return \UserBundle\Entity\UserProperties
     */
    public function getUserProperties()
    {
        return $this->userProperties;
    }

    /**
     * Set userPersonalData
     *
     * @param \UserBundle\Entity\UserPersonalData $userPersonalData
     *
     * @return Users
     */
    public function setUserPersonalData(\UserBundle\Entity\UserPersonalData $userPersonalData = null)
    {
        $this->userPersonalData = $userPersonalData;

        return $this;
    }

    /**
     * Get userPersonalData
     *
     * @return \UserBundle\Entity\UserPersonalData
     */
    public function getUserPersonalData()
    {
        return $this->userPersonalData;
    }


    /**
     * Add roomUser
     *
     * @param \AppBundle\Entity\RoomUser $roomUser
     *
     * @return Users
     */
    public function addRoomUser(\AppBundle\Entity\RoomUser $roomUser)
    {
        $this->roomUser[] = $roomUser;

        return $this;
    }

    /**
     * Remove roomUser
     *
     * @param \AppBundle\Entity\RoomUser $roomUser
     */
    public function removeRoomUser(\AppBundle\Entity\RoomUser $roomUser)
    {
        $this->roomUser->removeElement($roomUser);
    }

    /**
     * Get roomUser
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoomUser()
    {
        return $this->roomUser;
    }
}

<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UserPersonalData
 *
 * @ORM\Table(name="user_personal_data")
 * @ORM\Entity
 */
class UserPersonalData {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", options={"default" = "nextval('user_personal_data_id_seq'::regclass)"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="user_personal_data_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", nullable=true)
     * @Assert\NotBlank(message = "userPersonalData.firstname.message")
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", nullable=true)
     * @Assert\NotBlank(message = "userPersonalData.lastname.message")
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", nullable=false)
     * @Assert\NotBlank(message = "userPersonalData.phone.message")
     * @Assert\Length(min = "5", minMessage= "userPersonalData.phone.minMessage")
     */
    private $phone;

    /**
     *
     * @ORM\OneToOne(targetEntity="\UserBundle\Entity\Users", mappedBy="userPersonalData")
     */
    private $user;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return UserPersonalData
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return UserPersonalData
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return UserPersonalData
     */
    public function setPhone($phone) {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\Users $user
     *
     * @return UserPersonalData
     */
    public function setUser(\UserBundle\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\Users
     */
    public function getUser()
    {
        return $this->user;
    }
}

<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * AccountType
 *
 * @ORM\Table(name="account_type",
 *  uniqueConstraints={@ORM\UniqueConstraint(name="account_type_id_key", columns={"id"})})
 * @ORM\Entity(repositoryClass="\UserBundle\Entity\Repository\AccountTypeRepository")
 */
class AccountType {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", options={"default" = "nextval('account_type_id_seq'::regclass)"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="account_type_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     * @Assert\NotBlank(message="accountType.name.message")
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="\UserBundle\Entity\UserProperties", mappedBy="accountType")
     */
    private $userProperties;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return AccountType
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->userProperties = new \Doctrine\Common\Collections\ArrayCollection();

    }

    /**
     * Add userProperties
     *
     * @param \UserBundle\Entity\UserProperties $userProperty
     *
     * @return AccountType
     */
    public function addUserProperty(\UserBundle\Entity\UserProperties $userProperty)
    {
        $this->userProperties[] = $userProperty;

        return $this;
    }

    /**
     * Remove userProperties
     *
     * @param \UserBundle\Entity\UserProperties $userProperty
     */
    public function removeUserProperty(\UserBundle\Entity\UserProperties $userProperty)
    {
        $this->userProperties->removeElement($userProperty);
    }

    /**
     * Get userProperties
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserProperties()
    {
        return $this->userProperties;
    }

}

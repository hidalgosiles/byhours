<?php

namespace UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Languages
 *
 * @ORM\Table(name="languages",
 *  uniqueConstraints={@ORM\UniqueConstraint(name="languages_id_key", columns={"id"})})
 * @ORM\Entity(repositoryClass="\UserBundle\Repository\LanguagesRepository")
 */
class Languages {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", options={"default" = "nextval('languages_id_seq'::regclass)"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="languages_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     * @Assert\NotBlank(message="languages.name.message")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="short_name", type="string", nullable=false)
     * @Assert\Length(
     *      min = 2,
     *      max = 2,
     *      minMessage = "language.shortName.minMessage",
     *      maxMessage = "language.shortName.maxMessage"
     * )
     */
    private $shortName;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="\UserBundle\Entity\UserProperties", mappedBy="languages")
     */
    private $userProperties;
    

    public function __toString() {
        return $this->getName();
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->userProperties = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Languages
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
     * Set shortName
     *
     * @param string $shortName
     *
     * @return Languages
     */
    public function setShortName($shortName) {
        $this->shortName = $shortName;

        return $this;
    }

    /**
     * Get shortName
     *
     * @return string
     */
    public function getShortName() {
        return $this->shortName;
    }


    /**
     * Add userProperty
     *
     * @param \UserBundle\Entity\UserProperties $userProperty
     *
     * @return Languages
     */
    public function addUserProperty(\UserBundle\Entity\UserProperties $userProperty) {
        $this->userProperties[] = $userProperty;

        return $this;
    }

    /**
     * Remove userProperty
     *
     * @param \UserBundle\Entity\UserProperties $userProperty
     */
    public function removeUserProperty(\UserBundle\Entity\UserProperties $userProperty) {
        $this->userProperties->removeElement($userProperty);
    }

    /**
     * Get userProperties
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserProperties() {
        return $this->userProperties;
    }

}

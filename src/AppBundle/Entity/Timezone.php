<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Timezone
 *
 * @ORM\Table(name="timezone",
 *  uniqueConstraints={@ORM\UniqueConstraint(name="timezone_id_key", columns={"id"})},
 *  indexes={@ORM\Index(name="idx_f1322edb9f2c3fab", columns={"country_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TimezoneRepository")
 */
class Timezone
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", options={"default" = "nextval('timezone_id_seq'::regclass)"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="timezone_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", nullable=false)
     * @Assert\NotBlank(message="timezone.description.message")
     */
    private $description;

    /**
     * @var \AppBundle\Entity\Country
     *
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Country", inversedBy="timezone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * })
     */
    private $country;

    /**
     * @var integer
     *
     * @ORM\Column(name="gmt", type="integer", nullable=false)
     * @Assert\NotBlank(message="timezone.gmt.message")
     */
    private $gmt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="\UserBundle\Entity\UserProperties", mappedBy="timezone")
     */
    private $userProperties;

    protected $countryName;

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    public function __toString()
    {
        return $this->description;
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
     * Set description
     *
     * @param string $description
     *
     * @return Timezone
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set gmt
     *
     * @param string $gmt
     *
     * @return Timezone
     */
    public function setGmt($gmt)
    {
        $this->gmt = $gmt;

        return $this;
    }

    /**
     * Get gmt
     *
     * @return integer
     */
    public function getGmt()
    {
        return $this->gmt;
    }

    /**
     * Set country
     *
     * @param \AppBundle\Entity\Country $country
     *
     * @return Timezone
     */
    public function setCountry(\AppBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \AppBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add userProperty
     *
     * @param \UserBundle\Entity\UserProperties $userProperty
     *
     * @return Timezone
     */
    public function addUserProperty(\UserBundle\Entity\UserProperties $userProperty)
    {
        $this->userProperties[] = $userProperty;

        return $this;
    }

    /**
     * Remove userProperty
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

    public function getCountryName()
    {
        return $this->getCountry()->getName();
    }
}

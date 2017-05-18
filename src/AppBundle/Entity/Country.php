<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Country
 *
 * @ORM\Table(name="country",
 *  uniqueConstraints={@ORM\UniqueConstraint(name="country_id_key", columns={"id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CountryRepository")
 */
class Country {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", options={"default" = "nextval('country_id_seq'::regclass)"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="country_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=true)
     * @Assert\NotBlank(message="country.name.message")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="country_code", type="string", nullable=false)
     * @Assert\Country(message = "country.countryCode.message")
     */
    private $countryCode;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Timezone", mappedBy="country")
     */
    private $timezone;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Province", mappedBy="country")
     */
    private $province;

    public function __toString() {
        return $this->getName();
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->timezone = new \Doctrine\Common\Collections\ArrayCollection();
        $this->province = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Country
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
     * Set countryCode
     *
     * @param string $countryCode
     *
     * @return Country
     */
    public function setCountryCode($countryCode) {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Get countryCode
     *
     * @return string
     */
    public function getCountryCode() {
        return $this->countryCode;
    }


    /**
     * Add timezone
     *
     * @param \AppBundle\Entity\Timezone $timezone
     *
     * @return Country
     */
    public function addTimezone(\AppBundle\Entity\Timezone $timezone)
    {
        $this->timezone[] = $timezone;

        return $this;
    }

    /**
     * Remove timezone
     *
     * @param \AppBundle\Entity\Timezone $timezone
     */
    public function removeTimezone(\AppBundle\Entity\Timezone $timezone)
    {
        $this->timezone->removeElement($timezone);
    }

    /**
     * Get timezone
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Add province
     *
     * @param \AppBundle\Entity\Province $province
     *
     * @return Country
     */
    public function addProvince(\AppBundle\Entity\Province $province)
    {
        $this->province[] = $province;

        return $this;
    }

    /**
     * Remove province
     *
     * @param \AppBundle\Entity\Province $province
     */
    public function removeProvince(\AppBundle\Entity\Province $province)
    {
        $this->province->removeElement($province);
    }

    /**
     * Get province
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProvince()
    {
        return $this->province;
    }
}

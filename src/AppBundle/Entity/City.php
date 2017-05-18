<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * City
 *
 * @ORM\Table(name="city",
 *  uniqueConstraints={@ORM\UniqueConstraint(name="city_id_key", columns={"id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CityRepository")
 */
class City {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", options={"default" = "nextval('zone_id_seq'::regclass)"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="zone_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=true)
     * @Assert\NotBlank(message="city.name.message")
     */
    private $name;

    /**
     * @var \AppBundle\Entity\Province
     *
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Province", inversedBy="city")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="province_id", referencedColumnName="id")
     * })
     */
    private $province;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Zone", mappedBy="city")
     */
    private $zone;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->zone = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return City
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set province
     *
     * @param \AppBundle\Entity\Province $province
     *
     * @return City
     */
    public function setProvince(\AppBundle\Entity\Province $province = null)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return \AppBundle\Entity\Province
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Add zone
     *
     * @param \AppBundle\Entity\Zone $zone
     *
     * @return City
     */
    public function addZone(\AppBundle\Entity\Zone $zone)
    {
        $this->zone[] = $zone;

        return $this;
    }

    /**
     * Remove zone
     *
     * @param \AppBundle\Entity\Zone $zone
     */
    public function removeZone(\AppBundle\Entity\Zone $zone)
    {
        $this->zone->removeElement($zone);
    }

    /**
     * Get zone
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getZone()
    {
        return $this->zone;
    }
}

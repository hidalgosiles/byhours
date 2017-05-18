<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * Hotel
 *
 * @ORM\Table(name="hotel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HotelRepository")
 */
class Hotel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", options={"default" = "nextval('hotel_id_seq'::regclass)"} )
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="hotel_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     * @Assert\NotBlank(message="hotel.name.message")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", nullable=false)
     * @Assert\NotBlank(message="hotel.description.message")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", nullable=false)
     * @Assert\NotBlank(message = "hotel.address.message")
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="geolocation", type="string")
     */
    private $geolocation;

    /**
     * @var integer
     *
     * @ORM\Column(name="stars", type="integer", nullable=true, options={"default" = 0})
     * @Assert\Range(min=0, max=5,
     *  minMessage = "You must be indicate at least 0 stars",
     *  maxMessage = "You cannot indicate than {{ limit }} stars")
     */
    private $stars;

    /**
     * @var float
     *
     * @ORM\Column(name="rate_global", type="float", nullable=true, options={"default" = 0})
     */
    private $rateGlobal;

    /**
     * @var float
     *
     * @ORM\Column(name="rate_location", type="float", nullable=true, options={"default" = 0})
     */
    private $rateLocation;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=false)
     */
    private $creationDate;

    /**
     *
     * @ORM\OneToOne(targetEntity="\AppBundle\Entity\HotelProperties", mappedBy="hotel")
     */
    private $hotelProperties;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Room", mappedBy="hotel")
     */
    private $room;

    /**
     * Get id
     *
     * @return int
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
     * @return Hotel
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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return ClickLog
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
     * Set address
     *
     * @param string $address
     *
     * @return ClickLog
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Hotel
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
     * Set geolocation
     *
     * @param string $geolocation
     *
     * @return Hotel
     */
    public function setGeolocation($geolocation)
    {
        $this->geolocation = $geolocation;

        return $this;
    }

    /**
     * Get geolocation
     *
     * @return string
     */
    public function getGeolocation()
    {
        return $this->geolocation;
    }

    /**
     * Set stars
     *
     * @param integer $stars
     *
     * @return Hotel
     */
    public function setStars($stars)
    {
        $this->stars = $stars;

        return $this;
    }

    /**
     * Get stars
     *
     * @return integer
     */
    public function getStars()
    {
        return $this->stars;
    }

    /**
     * Set rateGlobal
     *
     * @param float $rateGlobal
     *
     * @return Hotel
     */
    public function setRateGlobal($rateGlobal)
    {
        $this->rateGlobal = $rateGlobal;

        return $this;
    }

    /**
     * Get rateGlobal
     *
     * @return float
     */
    public function getRateGlobal()
    {
        return $this->rateGlobal;
    }

    /**
     * Set rateLocation
     *
     * @param float $rateLocation
     *
     * @return Hotel
     */
    public function setRateLocation($rateLocation)
    {
        $this->rateLocation = $rateLocation;

        return $this;
    }

    /**
     * Get rateLocation
     *
     * @return float
     */
    public function getRateLocation()
    {
        return $this->rateLocation;
    }

    /**
     * Set hotelProperties
     *
     * @param \AppBundle\Entity\HotelProperties $hotelProperties
     *
     * @return Hotel
     */
    public function setHotelProperties(\AppBundle\Entity\HotelProperties $hotelProperties = null)
    {
        $this->hotelProperties = $hotelProperties;

        return $this;
    }

    /**
     * Get hotelProperties
     *
     * @return \AppBundle\Entity\HotelProperties
     */
    public function getHotelProperties()
    {
        return $this->hotelProperties;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->room = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add room
     *
     * @param \AppBundle\Entity\Room $room
     *
     * @return Hotel
     */
    public function addRoom(\AppBundle\Entity\Room $room)
    {
        $this->room[] = $room;

        return $this;
    }

    /**
     * Remove room
     *
     * @param \AppBundle\Entity\Room $room
     */
    public function removeRoom(\AppBundle\Entity\Room $room)
    {
        $this->room->removeElement($room);
    }

    /**
     * Get room
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoom()
    {
        return $this->room;
    }
}

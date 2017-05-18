<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * HotelProperties
 *
 * @ORM\Table(name="hotel_properties")
 * @ORM\Entity
 */
class HotelProperties {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", options={"default" = "nextval('hotel_properties_id_seq'::regclass)"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="hotel_properties_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="restaurant", type="boolean", nullable=false, options={"default"=false})
     */
    private $restaurant;

    /**
     * @var boolean
     *
     * @ORM\Column(name="elevator", type="boolean", nullable=false, options={"default"=false})
     */
    private $elevator;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pool", type="boolean", nullable=false, options={"default"=false})
     */
    private $pool;

    /**
     * @var boolean
     *
     * @ORM\Column(name="aiport_transfer", type="boolean", nullable=false, options={"default"=false})
     */
    private $aiportTransfer;

    /**
     * @var \AppBundle\Entity\Hotel
     *
     * @ORM\OneToOne(targetEntity="\AppBundle\Entity\Hotel", inversedBy="hotelProperties", cascade={"persist"})
     * @ORM\JoinColumn(name="hotel_id", referencedColumnName="id")
     */
    private $hotel;
    

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
     * Set restaurant
     *
     * @param boolean $restaurant
     *
     * @return HotelProperties
     */
    public function setRestaurant($restaurant)
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    /**
     * Get restaurant
     *
     * @return boolean
     */
    public function getRestaurant()
    {
        return $this->restaurant;
    }

    /**
     * Set elevator
     *
     * @param boolean $elevator
     *
     * @return HotelProperties
     */
    public function setElevator($elevator)
    {
        $this->elevator = $elevator;

        return $this;
    }

    /**
     * Get elevator
     *
     * @return boolean
     */
    public function getElevator()
    {
        return $this->elevator;
    }

    /**
     * Set pool
     *
     * @param boolean $pool
     *
     * @return HotelProperties
     */
    public function setPool($pool)
    {
        $this->pool = $pool;

        return $this;
    }

    /**
     * Get pool
     *
     * @return boolean
     */
    public function getPool()
    {
        return $this->pool;
    }

    /**
     * Set aiportTransfer
     *
     * @param boolean $aiportTransfer
     *
     * @return HotelProperties
     */
    public function setAiportTransfer($aiportTransfer)
    {
        $this->aiportTransfer = $aiportTransfer;

        return $this;
    }

    /**
     * Get aiportTransfer
     *
     * @return boolean
     */
    public function getAiportTransfer()
    {
        return $this->aiportTransfer;
    }

    /**
     * Set hotel
     *
     * @param \AppBundle\Entity\Hotel $hotel
     *
     * @return HotelProperties
     */
    public function setHotel(\AppBundle\Entity\Hotel $hotel = null)
    {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * Get hotel
     *
     * @return \AppBundle\Entity\Hotel
     */
    public function getHotel()
    {
        return $this->hotel;
    }
}

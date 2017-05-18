<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Room
 *
 * @ORM\Table(name="room",
 *  indexes={@ORM\Index(name="idx_D175C483566ED347", columns={"hotel_id"})})
 * @ORM\Entity
 */
class Room {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", options={"default" = "nextval('room_id_seq'::regclass)"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="room_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", nullable=false)
     * @Assert\NotBlank(message="room.description.message")
     */
    private $description;

    /**
     * @var \AppBundle\Entity\RoomStatus
     *
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\RoomStatus", inversedBy="room")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     * })
     */
    private $status;

    /**
     * @var \AppBundle\Entity\RoomType
     *
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\RoomType", inversedBy="room")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     * })
     */
    private $type;

    /**
     * @var \AppBundle\Entity\RoomProperties
     *
     * @ORM\OneToOne(targetEntity="\AppBundle\Entity\RoomProperties", mappedBy="room")
     */
    private $roomProperties;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", nullable=true, options={"default" = 0})
     */
    private $price;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\RoomUser", mappedBy="room")
     */
    private $roomUser;

    /**
     * @var \AppBundle\Entity\Hotel
     *
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Hotel", inversedBy="room")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hotel_id", referencedColumnName="id")
     * })
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
     * Set description
     *
     * @param string $description
     *
     * @return Room
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
     * Set price
     *
     * @param float $price
     *
     * @return Room
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set status
     *
     * @param \AppBundle\Entity\RoomStatus $status
     *
     * @return Room
     */
    public function setStatus(\AppBundle\Entity\RoomStatus $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \AppBundle\Entity\RoomStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set type
     *
     * @param \AppBundle\Entity\RoomType $type
     *
     * @return Room
     */
    public function setType(\AppBundle\Entity\RoomType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\RoomType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set roomProperties
     *
     * @param \AppBundle\Entity\RoomProperties $roomProperties
     *
     * @return Room
     */
    public function setRoomProperties(\AppBundle\Entity\RoomProperties $roomProperties = null)
    {
        $this->roomProperties = $roomProperties;

        return $this;
    }

    /**
     * Get roomProperties
     *
     * @return \AppBundle\Entity\RoomProperties
     */
    public function getRoomProperties()
    {
        return $this->roomProperties;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->roomUser = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add roomUser
     *
     * @param \AppBundle\Entity\RoomUser $roomUser
     *
     * @return Room
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

    /**
     * Set hotel
     *
     * @param \AppBundle\Entity\Hotel $hotel
     *
     * @return Room
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

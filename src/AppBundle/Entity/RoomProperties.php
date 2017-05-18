<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * RoomProperties
 *
 * @ORM\Table(name="room_properties")
 * @ORM\Entity
 */
class RoomProperties {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", options={"default" = "nextval('room_properties_id_seq'::regclass)"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="room_properties_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="heating", type="boolean", nullable=false, options={"default"=false})
     */
    private $heating;

    /**
     * @var boolean
     *
     * @ORM\Column(name="towels", type="boolean", nullable=false, options={"default"=false})
     */
    private $towels;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tv", type="boolean", nullable=false, options={"default"=false})
     */
    private $tv;

    /**
     * @var \AppBundle\Entity\Room
     *
     * @ORM\OneToOne(targetEntity="\AppBundle\Entity\Room", inversedBy="roomProperties", cascade={"persist"})
     * @ORM\JoinColumn(name="room_id", referencedColumnName="id")
     */
    private $room;

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
     * Set heating
     *
     * @param boolean $heating
     *
     * @return RoomProperties
     */
    public function setHeating($heating)
    {
        $this->heating = $heating;

        return $this;
    }

    /**
     * Get heating
     *
     * @return boolean
     */
    public function getHeating()
    {
        return $this->heating;
    }

    /**
     * Set towels
     *
     * @param boolean $towels
     *
     * @return RoomProperties
     */
    public function setTowels($towels)
    {
        $this->towels = $towels;

        return $this;
    }

    /**
     * Get towels
     *
     * @return boolean
     */
    public function getTowels()
    {
        return $this->towels;
    }

    /**
     * Set tv
     *
     * @param boolean $tv
     *
     * @return RoomProperties
     */
    public function setTv($tv)
    {
        $this->tv = $tv;

        return $this;
    }

    /**
     * Get tv
     *
     * @return boolean
     */
    public function getTv()
    {
        return $this->tv;
    }

    /**
     * Set room
     *
     * @param \AppBundle\Entity\Room $room
     *
     * @return RoomProperties
     */
    public function setRoom(\AppBundle\Entity\Room $room = null)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get room
     *
     * @return \AppBundle\Entity\Room
     */
    public function getRoom()
    {
        return $this->room;
    }
}

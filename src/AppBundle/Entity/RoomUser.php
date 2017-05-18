<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * RoomUser
 *
 * @ORM\Table(name="room_user",
 *  indexes={@ORM\Index(name="idx_F5C53C5FA76ED392", columns={"user_id"}),
 *           @ORM\Index(name="idx_D175C483566ED347", columns={"room_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoomUserRepository")
 */
class RoomUser {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", options={"default" = "nextval('room_user_id_seq'::regclass)"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="room_user_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \UserBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="\UserBundle\Entity\Users", inversedBy="roomUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \AppBundle\Entity\Room
     *
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Room", inversedBy="roomUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="room_id", referencedColumnName="id")
     * })
     */
    private $room;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=false)
     */
    private $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reservation_date_initial", type="datetime", nullable=false)
     */
    private $reservationDateInitial;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reservation_date_final", type="datetime", nullable=false)
     */
    private $reservationDateFinal;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float", nullable=true, options={"default" = 0})
     */
    private $amount;

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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return RoomUser
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
     * Set reservationDateInitial
     *
     * @param \DateTime $reservationDateInitial
     *
     * @return RoomUser
     */
    public function setReservationDateInitial($reservationDateInitial)
    {
        $this->reservationDateInitial = $reservationDateInitial;

        return $this;
    }

    /**
     * Get reservationDateInitial
     *
     * @return \DateTime
     */
    public function getReservationDateInitial()
    {
        return $this->reservationDateInitial;
    }

    /**
     * Set reservationDateFinal
     *
     * @param \DateTime $reservationDateFinal
     *
     * @return RoomUser
     */
    public function setReservationDateFinal($reservationDateFinal)
    {
        $this->reservationDateFinal = $reservationDateFinal;

        return $this;
    }

    /**
     * Get reservationDateFinal
     *
     * @return \DateTime
     */
    public function getReservationDateFinal()
    {
        return $this->reservationDateFinal;
    }

    /**
     * Set amount
     *
     * @param float $amount
     *
     * @return RoomUser
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\Users $user
     *
     * @return RoomUser
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

    /**
     * Set room
     *
     * @param \AppBundle\Entity\Room $room
     *
     * @return RoomUser
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

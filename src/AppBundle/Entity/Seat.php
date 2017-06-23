<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seat
 *
 * @ORM\Table(name="seat")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SeatRepository")
 */
class Seat
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Theater
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Theater", inversedBy="seats")
     */
    private $theater;

    /**
     * @var SeatType
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\SeatType", inversedBy="seats")
     */
    private $seatType;

    /**
     * @var int
     *
     * @ORM\Column(name="row", type="integer")
     */
    private $row;

    /**
     * @var int
     *
     * @ORM\Column(name="chair", type="integer")
     */
    private $chair;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ticket", mappedBy="seat")
     */
    private $tickets;

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
     * Set theater
     *
     * @param integer $theater
     *
     * @return Seat
     */
    public function setTheater($theater)
    {
        $this->theater = $theater;

        return $this;
    }

    /**
     * Get theater
     *
     * @return Theater
     */
    public function getTheater()
    {
        return $this->theater;
    }

    /**
     * Set seatType
     *
     * @param SeatType $seatType
     *
     * @return Seat
     */
    public function setSeatType($seatType)
    {
        $this->seatType = $seatType;

        return $this;
    }

    /**
     * Get seatType
     *
     * @return SeatType
     */
    public function getSeatType()
    {
        return $this->seatType;
    }

    /**
     * Set row
     *
     * @param integer $row
     *
     * @return Seat
     */
    public function setRow($row)
    {
        $this->row = $row;

        return $this;
    }

    /**
     * Get row
     *
     * @return int
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * Set chair
     *
     * @param integer $chair
     *
     * @return Seat
     */
    public function setChair($chair)
    {
        $this->chair = $chair;

        return $this;
    }

    /**
     * Get chair
     *
     * @return int
     */
    public function getChair()
    {
        return $this->chair;
    }
}


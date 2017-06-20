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
     * @var int
     *
     * @ORM\Column(name="screen", type="integer")
     */
    private $screen;

    /**
     * @var int
     *
     * @ORM\Column(name="seatType", type="integer")
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set screen
     *
     * @param integer $screen
     *
     * @return Seat
     */
    public function setScreen($screen)
    {
        $this->screen = $screen;

        return $this;
    }

    /**
     * Get screen
     *
     * @return int
     */
    public function getScreen()
    {
        return $this->screen;
    }

    /**
     * Set seatType
     *
     * @param integer $seatType
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
     * @return int
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


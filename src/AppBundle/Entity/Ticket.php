<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TicketRepository")
 */
class Ticket
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
     * @var Showing
     *
     * @Serializer\Exclude()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Showing", inversedBy="tickets")
     */
    private $showing;

    /**
     * @var Seat
     *
     * @Serializer\Exclude()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Seat", inversedBy="tickets");
     */
    private $seat;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isReserved", type="boolean")
     */
    private $isReserved;


    /**
     * @var boolean
     *
     * @ORM\Column(name="isPaid", type="boolean")
     */
    private $isPaid;

    /**
     * @var float;
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @Serializer\VirtualProperty()
     * @Serializer\SerializedName("row")
     */
    public function row()
    {
        return $this->getSeat()->getRow();
    }

    /**
     * @Serializer\VirtualProperty()
     * @Serializer\SerializedName("chair")
     */
    public function chair()
    {
        return $this->getSeat()->getChair();
    }

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
     * Set showing
     *
     * @param Showing $showing
     *
     * @return Ticket
     */
    public function setShowing($showing)
    {
        $this->showing = $showing;

        return $this;
    }

    /**
     * Get showing
     *
     * @return Showing
     */
    public function getShowing()
    {
        return $this->showing;
    }

    /**
     * Set seat
     *
     * @param Seat $seat
     *
     * @return Ticket
     */
    public function setSeat($seat)
    {
        $this->seat = $seat;

        return $this;
    }

    /**
     * Get seat
     *
     * @return Seat
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * Set isReserved
     *
     * @param boolean $isReserved
     *
     * @return Ticket
     */
    public function setIsReserved($isReserved)
    {
        $this->isReserved = $isReserved;

        return $this;
    }

    /**
     * Get isReserved
     *
     * @return boolean
     */
    public function isReserved()
    {
        return $this->isReserved;
    }

    /**
     * @param boolean $isPaid
     *
     * @return Ticket
     */
    public function setIsPaid($isPaid)
    {
        $this->isPaid = $isPaid;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isPaid()
    {
        return $this->isPaid;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return Ticket
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

}


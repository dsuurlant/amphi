<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var int
     *
     * @ORM\Column(name="showing", type="integer")
     */
    private $showing;

    /**
     * @var int
     *
     * @ORM\Column(name="seat", type="integer")
     */
    private $seat;

    /**
     * @var bool
     *
     * @ORM\Column(name="isReserved", type="boolean")
     */
    private $isReserved;


    /**
     * @var bool
     *
     * @ORM\Column(name="isPaid", type="boolean")
     */
    private $isPaid;

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
     * @param integer $showing
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
     * @return int
     */
    public function getShowing()
    {
        return $this->showing;
    }

    /**
     * Set seat
     *
     * @param integer $seat
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
     * @return int
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * Set user
     *
     * @param integer $user
     *
     * @return Ticket
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return int
     */
    public function getUser()
    {
        return $this->user;
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
     * @param bool $isPaid
     *
     * @return Ticket
     */
    public function setIsPaid(bool $isPaid)
    {
        $this->isPaid = $isPaid;

        return $this;
    }


    /**
     * @return bool
     */
    public function isPaid(): bool
    {
        return $this->isPaid;
    }

}


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Showing
 *
 * @ORM\Table(name="showing")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShowingRepository")
 */
class Showing
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
     * @var \DateTime
     *
     * @ORM\Column(name="showDateTime", type="datetimetz")
     */
    private $showDateTime;

    /**
     * @var Theater
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Theater", inversedBy="showings")
     */
    private $theater;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Movie", inversedBy="showings")
     */
    private $movie;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ticket", mappedBy="showing")
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
     * Set showDateTime
     *
     * @param \DateTime $showDateTime
     *
     * @return Showing
     */
    public function setShowDateTime($showDateTime)
    {
        $this->showDateTime = $showDateTime;

        return $this;
    }

    /**
     * Get showDateTime
     *
     * @return \DateTime
     */
    public function getShowDateTime()
    {
        return $this->showDateTime;
    }

    /**
     * Set Theater
     *
     * @param integer $theater
     *
     * @return Showing
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
     * Set movie
     *
     * @param integer $movie
     *
     * @return Showing
     */
    public function setMovie($movie)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get movie
     *
     * @return int
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * @return array
     */
    public function getTickets(): array
    {
        return $this->tickets;
    }

    /**
     * @param array $tickets
     *
     * @return Showing
     */
    public function setTickets(array $tickets): Showing
    {
        $this->tickets = $tickets;

        return $this;
    }


}


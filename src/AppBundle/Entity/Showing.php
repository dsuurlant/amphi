<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

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
     * @Serializer\Exclude()
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
     * @Serializer\Exclude()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Theater", inversedBy="showings")     *
     */
    private $theater;

    /**
     * @var Movie
     * @Serializer\Exclude()
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Movie", inversedBy="showings")
     */
    private $movie;

    /**
     * @var array
     * @Serializer\Exclude()
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ticket", mappedBy="showing")
     */
    private $tickets;

    /**
     * @Serializer\VirtualProperty()
     * @Serializer\SerializedName("location")
     */
    public function location()
    {
        return $this->getTheater()->getLocation()->getName();
    }

    /**
     * @Serializer\VirtualProperty()
     * @Serializer\SerializedName("movie")
     */
    public function movie()
    {
        return $this->getMovie()->getName();
    }

    /**
     * @Serializer\VirtualProperty()
     * @Serializer\SerializedName("type")
     */
    public function type()
    {
        return $this->getTheater()->getTheaterType()->getFilmFormat()->getName();
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


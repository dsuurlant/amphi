<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Theater
 *
 * @ORM\Table(name="theater")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TheaterRepository")
 */
class Theater
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
     * @var TheaterType
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TheaterType", inversedBy="theaters")
     */
    private $theaterType;

    /**
     * @var Location
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Location", inversedBy="theaters")
     */
    private $location;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Showing", mappedBy="theater")
     */
    private $showings;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Seat", mappedBy="theater")
     */
    private $seats;

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
     * Set theaterType
     *
     * @param integer $theaterType
     *
     * @return Theater
     */
    public function setTheaterType($theaterType)
    {
        $this->theaterType = $theaterType;

        return $this;
    }

    /**
     * Get theaterType
     *
     * @return TheaterType
     */
    public function getTheaterType()
    {
        return $this->theaterType;
    }

    /**
     * Set location
     *
     * @param integer $location
     *
     * @return Theater
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return array
     */
    public function getShowings()
    {
        return $this->showings;
    }

    /**
     * @param array $showings
     *
     * @return Theater
     */
    public function setShowings($showings)
    {
        $this->showings = $showings;

        return $this;
    }

    /**
     * @return array
     */
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * @param array $seats
     *
     * @return Theater
     */
    public function setSeats($seats)
    {
        $this->seats = $seats;

        return $this;
    }

}


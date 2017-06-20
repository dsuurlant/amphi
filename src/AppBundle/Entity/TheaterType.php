<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TheaterType
 *
 * @ORM\Table(name="theater_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TheaterTypeRepository")
 */
class TheaterType
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="filmFormat", type="integer")
     */
    private $filmFormat;

    /**
     * @var int
     *
     * @ORM\Column(name="soundFormat", type="integer")
     */
    private $soundFormat;

    /**
     * @var int
     *
     * @ORM\Column(name="totalSeats", type="integer")
     */
    private $totalSeats;

    /**
     * @var int
     *
     * @ORM\Column(name="screenSize", type="integer")
     */
    private $screenSize;


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
     * Set name
     *
     * @param string $name
     *
     * @return TheaterType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set filmFormat
     *
     * @param integer $filmFormat
     *
     * @return TheaterType
     */
    public function setFilmFormat($filmFormat)
    {
        $this->filmFormat = $filmFormat;

        return $this;
    }

    /**
     * Get filmFormat
     *
     * @return int
     */
    public function getFilmFormat()
    {
        return $this->filmFormat;
    }

    /**
     * Set soundFormat
     *
     * @param integer $soundFormat
     *
     * @return TheaterType
     */
    public function setSoundFormat($soundFormat)
    {
        $this->soundFormat = $soundFormat;

        return $this;
    }

    /**
     * Get soundFormat
     *
     * @return int
     */
    public function getSoundFormat()
    {
        return $this->soundFormat;
    }

    /**
     * Set totalSeats
     *
     * @param integer $totalSeats
     *
     * @return TheaterType
     */
    public function setTotalSeats($totalSeats)
    {
        $this->totalSeats = $totalSeats;

        return $this;
    }

    /**
     * Get totalSeats
     *
     * @return int
     */
    public function getTotalSeats()
    {
        return $this->totalSeats;
    }
    
    /**
     * @return int
     */
    public function getScreenSize(): int
    {
        return $this->screenSize;
    }

    /**
     * @param int $screenSize
     *
     * @return TheaterType
     */
    public function setScreenSize(int $screenSize): TheaterType
    {
        $this->screenSize = $screenSize;

        return $this;
    }


}


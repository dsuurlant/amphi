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
     * @var int
     *
     * @ORM\Column(name="theatre", type="integer")
     */
    private $theatre;

    /**
     * @var int
     *
     * @ORM\Column(name="media", type="integer")
     */
    private $media;


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
     * Set theatre
     *
     * @param integer $theatre
     *
     * @return Showing
     */
    public function setTheatre($theatre)
    {
        $this->theatre = $theatre;

        return $this;
    }

    /**
     * Get theatre
     *
     * @return int
     */
    public function getTheatre()
    {
        return $this->theatre;
    }

    /**
     * Set media
     *
     * @param integer $media
     *
     * @return Showing
     */
    public function setMedia($media)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return int
     */
    public function getMedia()
    {
        return $this->media;
    }
}


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Metadata
 *
 * @ORM\Table(name="metadata")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MetadataRepository")
 */
class Metadata
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
     * @var Movie
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Movie", inversedBy="metadatas")
     */
    private $movie;

    /**
     * @var MetadataType
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\MetadataType", inversedBy="metadatas")
     */
    private $metadataType;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text")
     */
    private $value;

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
     * Set movie
     *
     * @param Movie $movie
     *
     * @return Metadata
     */
    public function setMovie($movie)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get movie
     *
     * @return Movie
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * Set metadataType
     *
     * @param integer $metadataType
     *
     * @return Metadata
     */
    public function setMetadataType($metadataType)
    {
        $this->metadataType = $metadataType;

        return $this;
    }

    /**
     * Get metadataType
     *
     * @return MetadataType
     */
    public function getMetadataType()
    {
        return $this->metadataType;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return Metadata
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}


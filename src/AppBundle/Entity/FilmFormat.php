<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FilmFormat
 *
 * @ORM\Table(name="film_format")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FilmFormatRepository")
 */
class FilmFormat
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Theater", mappedBy="filmFormat")
     */
    private $theaters;


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
     * @return FilmFormat
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
     * @return array
     */
    public function getTheaters(): array
    {
        return $this->theaters;
    }

    /**
     * @param array $theaters
     *
     * @return FilmFormat
     */
    public function setTheaters(array $theaters): FilmFormat
    {
        $this->theaters = $theaters;

        return $this;
    }


}


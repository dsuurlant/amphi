<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SoundFormat
 *
 * @ORM\Table(name="sound_format")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SoundFormatRepository")
 */
class SoundFormat
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
     * @var array
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Theater", mappedBy="soundFormat")
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
     * @return SoundFormat
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
     */
    public function setTheaters(array $theaters)
    {
        $this->theaters = $theaters;
    }


}


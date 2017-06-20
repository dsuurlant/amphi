<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ScreenSize
 *
 * @ORM\Table(name="screen_size")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ScreenSizeRepository")
 */
class ScreenSize
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
     * @var string
     *
     * @ORM\Column(name="heightCentimeters", type="decimal", precision=5, scale=1, nullable=true)
     */
    private $heightCentimeters;

    /**
     * @var string
     *
     * @ORM\Column(name="widthInCm", type="decimal", precision=5, scale=1, nullable=true)
     */
    private $widthInCm;

    /**
     * @var string
     *
     * @ORM\Column(name="aspectRatio", type="string", length=10, nullable=true)
     */
    private $aspectRatio;


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
     * @return ScreenSize
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
     * Set heightCentimeters
     *
     * @param string $heightCentimeters
     *
     * @return ScreenSize
     */
    public function setHeightCentimeters($heightCentimeters)
    {
        $this->heightCentimeters = $heightCentimeters;

        return $this;
    }

    /**
     * Get heightCentimeters
     *
     * @return string
     */
    public function getHeightCentimeters()
    {
        return $this->heightCentimeters;
    }

    /**
     * Set widthInCm
     *
     * @param string $widthInCm
     *
     * @return ScreenSize
     */
    public function setWidthInCm($widthInCm)
    {
        $this->widthInCm = $widthInCm;

        return $this;
    }

    /**
     * Get widthInCm
     *
     * @return string
     */
    public function getWidthInCm()
    {
        return $this->widthInCm;
    }

    /**
     * Set aspectRatio
     *
     * @param string $aspectRatio
     *
     * @return ScreenSize
     */
    public function setAspectRatio($aspectRatio)
    {
        $this->aspectRatio = $aspectRatio;

        return $this;
    }

    /**
     * Get aspectRatio
     *
     * @return string
     */
    public function getAspectRatio()
    {
        return $this->aspectRatio;
    }
}


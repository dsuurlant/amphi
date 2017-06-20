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
     * @ORM\Column(name="heightInCm", type="decimal", precision=5, scale=1, nullable=true)
     */
    private $heightInCm;

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
     * @var array
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Theater", mappedBy="screenSize")
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
     * Set heightInCm
     *
     * @param string $heightInCm
     *
     * @return ScreenSize
     */
    public function setHeightInCm($heightInCm)
    {
        $this->heightInCm = $heightInCm;

        return $this;
    }

    /**
     * Get heightInCm
     *
     * @return string
     */
    public function getHeightInCm()
    {
        return $this->heightInCm;
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
     * @return ScreenSize
     */
    public function setTheaters(array $theaters): ScreenSize
    {
        $this->theaters = $theaters;

        return $this;
    }
    

}


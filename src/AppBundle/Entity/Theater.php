<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Theater
 *
 * @ORM\Table(name="theater")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TheaterRepository")
 */
class Theater {
	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var int
	 *
	 * @ORM\Column(name="theaterType", type="integer")
	 */
	private $theaterType;

	/**
	 * @var int
	 *
	 * @ORM\Column(name="location", type="integer")
	 */
	private $location;


	/**
	 * Get id
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}


	/**
	 * Set theaterType
	 *
	 * @param integer $theaterType
	 *
	 * @return Theater
	 */
	public function setTheaterType( $theaterType ) {
		$this->theaterType = $theaterType;

		return $this;
	}

	/**
	 * Get theaterType
	 *
	 * @return int
	 */
	public function getTheaterType() {
		return $this->theaterType;
	}

	/**
	 * Set location
	 *
	 * @param integer $location
	 *
	 * @return Theater
	 */
	public function setLocation( $location ) {
		$this->location = $location;

		return $this;
	}

	/**
	 * Get location
	 *
	 * @return int
	 */
	public function getLocation() {
		return $this->location;
	}
	
}


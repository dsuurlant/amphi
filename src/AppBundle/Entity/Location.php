<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table(name="location")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LocationRepository")
 */
class Location {
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
	 * @var string
	 *
	 * @ORM\Column(name="description", type="text", nullable=true)
	 */
	private $description;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="streetName", type="string", length=255)
	 */
	private $streetName;

	/**
	 * @var int
	 *
	 * @ORM\Column(name="streetNumber", type="integer")
	 */
	private $streetNumber;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="postalCode", type="string", length=10)
	 */
	private $postalCode;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="city", type="string", length=255)
	 */
	private $city;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="country", type="string", length=3)
	 */
	private $country;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="phoneNumber", type="string", length=15, nullable=true)
	 */
	private $phoneNumber;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="email", type="string", length=255, nullable=true)
	 */
	private $email;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="website", type="string", length=255, nullable=true)
	 */
	private $website;


	/**
	 * Get id
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set name
	 *
	 * @param string $name
	 *
	 * @return Location
	 */
	public function setName( $name ) {
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Set description
	 *
	 * @param string $description
	 *
	 * @return Location
	 */
	public function setDescription( $description ) {
		$this->description = $description;

		return $this;
	}

	/**
	 * Get description
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Set streetName
	 *
	 * @param string $streetName
	 *
	 * @return Location
	 */
	public function setStreetName( $streetName ) {
		$this->streetName = $streetName;

		return $this;
	}

	/**
	 * Get streetName
	 *
	 * @return string
	 */
	public function getStreetName() {
		return $this->streetName;
	}

	/**
	 * Set streetNumber
	 *
	 * @param integer $streetNumber
	 *
	 * @return Location
	 */
	public function setStreetNumber( $streetNumber ) {
		$this->streetNumber = $streetNumber;

		return $this;
	}

	/**
	 * Get streetNumber
	 *
	 * @return int
	 */
	public function getStreetNumber() {
		return $this->streetNumber;
	}

	/**
	 * Set postalCode
	 *
	 * @param string $postalCode
	 *
	 * @return Location
	 */
	public function setPostalCode( $postalCode ) {
		$this->postalCode = $postalCode;

		return $this;
	}

	/**
	 * Get postalCode
	 *
	 * @return string
	 */
	public function getPostalCode() {
		return $this->postalCode;
	}

	/**
	 * Set city
	 *
	 * @param string $city
	 *
	 * @return Location
	 */
	public function setCity( $city ) {
		$this->city = $city;

		return $this;
	}

	/**
	 * Get city
	 *
	 * @return string
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Set country
	 *
	 * @param string $country
	 *
	 * @return Location
	 */
	public function setCountry( $country ) {
		$this->country = $country;

		return $this;
	}

	/**
	 * Get country
	 *
	 * @return string
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * Set phoneNumber
	 *
	 * @param string $phoneNumber
	 *
	 * @return Location
	 */
	public function setPhoneNumber( $phoneNumber ) {
		$this->phoneNumber = $phoneNumber;

		return $this;
	}

	/**
	 * Get phoneNumber
	 *
	 * @return string
	 */
	public function getPhoneNumber() {
		return $this->phoneNumber;
	}

	/**
	 * Set email
	 *
	 * @param string $email
	 *
	 * @return Location
	 */
	public function setEmail( $email ) {
		$this->email = $email;

		return $this;
	}

	/**
	 * Get email
	 *
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Set website
	 *
	 * @param string $website
	 *
	 * @return Location
	 */
	public function setWebsite( $website ) {
		$this->website = $website;

		return $this;
	}

	/**
	 * Get website
	 *
	 * @return string
	 */
	public function getWebsite() {
		return $this->website;
	}
}


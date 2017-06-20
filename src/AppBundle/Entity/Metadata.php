<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Metadata
 *
 * @ORM\Table(name="metadata")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MetadataRepository")
 */
class Metadata {
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
	 * @ORM\Column(name="media", type="integer")
	 */
	private $media;

	/**
	 * @var int
	 *
	 * @ORM\Column(name="metadataType", type="integer")
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
	public function getId() {
		return $this->id;
	}

	/**
	 * Set media
	 *
	 * @param integer $media
	 *
	 * @return Metadata
	 */
	public function setMedia( $media ) {
		$this->media = $media;

		return $this;
	}

	/**
	 * Get media
	 *
	 * @return int
	 */
	public function getMedia() {
		return $this->media;
	}

	/**
	 * Set metadataType
	 *
	 * @param integer $metadataType
	 *
	 * @return MetadataType
	 */
	public function setMetadataType( $metadataType ) {
		$this->metadataType = $metadataType;

		return $this;
	}

	/**
	 * Get metadataType
	 *
	 * @return MetadataType
	 */
	public function getMetadataType() {
		return $this->metadataType;
	}

	/**
	 * Set value
	 *
	 * @param string $value
	 *
	 * @return Metadata
	 */
	public function setDataValue( $value ) {
		$this->value = $value;

		return $this;
	}

	/**
	 * Get value
	 *
	 * @return string
	 */
	public function getvalue() {
		return $this->value;
	}
}


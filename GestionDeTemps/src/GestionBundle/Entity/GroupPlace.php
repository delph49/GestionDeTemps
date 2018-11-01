<?php

namespace GestionBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\Place;

/**
 * GroupPlace
 *
 * @ORM\Table(name="group_place")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\GroupPlaceRepository")
 */
class GroupPlace {

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
     * @ORM\Column(name="title_group", type="string", length=15, nullable=true)
     */
    private $titleGroup;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="info_active_group_place", type="boolean")
     */
    private $infoActiveGroupPlace;

    /**
     * @ORM\OneToMany(targetEntity="Place", mappedBy="groupsPlaces")
     */
    private $place;

    /**
     * Constructor/Constructeur
     */
    function __construct() {
        $this->place = new ArrayCollection();
    }

    /**
     * Getters and Setters
     */

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set titleGroup
     *
     * @param string $titleGroup
     *
     * @return GroupPlace
     */
    public function setTitleGroup($titleGroup) {
        $this->titleGroup = $titleGroup;

        return $this;
    }

    /**
     * Get titleGroup
     *
     * @return string
     */
    public function getTitleGroup() {
        return $this->titleGroup;
    }

    /**
     * Set place
     * 
     * @param Place $place
     *
     * @return GroupPlace
     */
    public function setPlace($place) {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     * 
     * @return Place
     */
    public function getPlace() {
        return $this->place;
    }

    /**
     * Get infoActiveGroupPlace
     *
     * @return boolean
     */
    public function getInfoActiveGroupPlace() {
        return $this->infoActiveGroupPlace;
    }

    /**
     * Set infoActiveGroupPlace
     *
     * @return GroupPlace
     */
    public function setInfoActiveGroupPlace($infoActiveGroupPlace) {
        $this->infoActiveGroupPlace = $infoActiveGroupPlace;

        return $this;
    }

    /**
     * toString method/Méthode toString
     */
    public function __toString() {
        return $this->titleGroup;
    }

}

<?php

namespace GestionBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\GroupPlace;

/**
 * Place
 *
 * @ORM\Table(name="place")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\PlaceRepository")
 */
class Place {

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
     * @ORM\Column(name="title_place", type="string", length=50, nullable=true)
     */
    private $titlePlace;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="info_active_place", type="boolean")
     */
    private $infoActivePlace;

    /**
     * @ORM\ManyToOne(targetEntity="GroupPlace", inversedBy="place")
     * @@ORM\Column(nullable=true)
     */
    private $groupsPlaces;

    /**
     * @ORM\OneToMany(targetEntity="Intervention", mappedBy="places") 
     */
    private $intervention;

    /**
     * Constructor/Constructeur
     */
    function __construct() {
        $this->intervention = new ArrayCollection();
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
     * Set titlePlace
     *
     * @param string $titlePlace
     *
     * @return Place
     */
    public function setTitlePlace($titlePlace) {
        $this->titlePlace = $titlePlace;

        return $this;
    }

    /**
     * Getters and Setters
     */

    /**
     * Get titlePlace
     *
     * @return string
     */
    public function getTitlePlace() {
        return $this->titlePlace;
    }

    /**
     * Get groupsPlaces
     * 
     * @return GroupPlace
     */
    public function getGroupsPlaces() {
        return $this->groupsPlaces;
    }

    /**
     * Set groupsPlaces
     *
     * @param GroupPlace $groupsPlaces
     * 
     * @return Place
     */
    public function setGroupsPlaces($groupsPlaces) {
        $this->groupsPlaces = $groupsPlaces;
    }

    /**
     * Set intervention
     *
     * @param Intervention $intervention
     * 
     * @return Place
     */
    public function setIntervention($intervention) {
        $this->intervention = $intervention;

        return $this;
    }

    /**
     * Get intervention
     * 
     * @return Intervention
     */
    public function getIntervention() {
        return $this->intervention;
    }

    /**
     * Get infoActivePlace
     *
     * @return boolean
     */
    public function getInfoActivePlace() {
        return $this->infoActivePlace;
    }

    /**
     * Set infoActivePlace
     *
     * @return boolean
     */
    public function setInfoActivePlace($infoActivePlace) {
        $this->infoActivePlace = $infoActivePlace;

        return $this;
    }

    /**
     * toString method/Méthode toString
     */
    public function __toString() {
        if (is_null($this->titlePlace)) {
            return '';
        }
        return $this->titlePlace;
    }

}

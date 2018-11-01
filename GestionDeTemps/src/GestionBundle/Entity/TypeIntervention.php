<?php

namespace GestionBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\Intervention;

/**
 * TypeIntervention
 *
 * @ORM\Table(name="type_intervention")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\TypeInterventionRepository")
 */
class TypeIntervention {

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
     * @ORM\Column(name="title_type_intervention", type="string", length=40, nullable=true)
     */
    private $titleTypeIntervention;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="info_active_type_intervention", type="boolean")
     */
    private $infoActiveTypeIntervention;

    /**
     * @ORM\OneToMany(targetEntity="Intervention", mappedBy="typeIntervention")
     */
    private $intervention;

    /**
     * Constructor/Constructeur
     */
    function __construct() {
        $this->intervention = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set titleTypeIntervention
     *
     * @param string $titleTypeIntervention
     *
     * @return TypeIntervention
     */
    public function setTitleTypeIntervention($titleTypeIntervention) {
        $this->titleTypeIntervention = $titleTypeIntervention;

        return $this;
    }

    /**
     * Get titleTypeIntervention
     *
     * @return string
     */
    public function getTitleTypeIntervention() {
        return $this->titleTypeIntervention;
    }

    /**
     * Add intervention
     *
     * @param Intervention $intervention
     *
     * @return TypeIntervention
     */
    public function addIntervention(Intervention $intervention) {
        $this->intervention[] = $intervention;

        return $this;
    }

    /**
     * Remove intervention
     *
     * @param Intervention $intervention
     */
    public function removeIntervention(Intervention $intervention) {
        $this->intervention->removeElement($intervention);
    }

    /**
     * Get intervention
     *
     * @return Collection
     */
    public function getIntervention() {
        return $this->intervention;
    }

    /**
     * Get infoActiveTypeIntervention
     *
     * @return boolean
     */
    public function getInfoActiveTypeIntervention() {
        return $this->infoActiveTypeIntervention;
    }

    /**
     * Set infoActiveTypeIntervention
     *
     * @return boolean
     */
    public function setInfoActiveTypeIntervention($infoActiveTypeIntervention) {
        $this->infoActiveTypeIntervention = $infoActiveTypeIntervention;

        return $this;
    }

    /**
     * toString method/Méthode toString
     */
    public function __toString() {
        return $this->titleTypeIntervention;
    }

}

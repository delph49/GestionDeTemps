<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use GestionBundle\Entity\KindWork;
use GestionBundle\Entity\Place;
use GestionBundle\Entity\TypeIntervention;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Intervention
 *
 * @ORM\Table(name="intervention")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\InterventionRepository")
 */
class Intervention {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="intervention_date", type="date")
     * 
     */
    private $interventionDate;

    /**
     * @var string
     *
     * @ORM\Column(name="week_number", type="string", length=3)
     *      
     */
    private $weekNumber;

    /**
     * @var float
     *
     * @ORM\Column(name="number_hours", type="float")
     */
    private $numberHours;

    /**
     * @var float
     * 
     * @ORM\Column(name="total_material_cost", type="float") 
     */
     private $totalMaterialCost;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text", nullable=true)
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity="KindWork", inversedBy="intervention")
     */
    private $kindWork;

    /**
     *
     * @ORM\ManyToOne(targetEntity="TypeIntervention", inversedBy="intervention")
     * 
     */
    private $typeIntervention;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Place", inversedBy="intervention")
     * 
     */
    private $places;

    /**
     *
     * @ManyToOne(targetEntity="Technician", inversedBy="interventions")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */
    private $technician;

    /**
     * Constructor/Constructeur
     */
    public function __construct() {
        
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
     * Set interventionDate
     *
     * @param DateTime $interventionDate
     *
     * @return Intervention
     */
    public function setInterventionDate($interventionDate) {
        $this->interventionDate = $interventionDate;

        return $this;
    }

    /**
     * Get interventionDate
     *
     * @return DateTime
     */
    public function getInterventionDate() {
        return $this->interventionDate;
    }

    /**
     * Set weekNumber
     *
     * @param integer $weekNumber
     *
     * @return Intervention
     */
    public function setWeekNumber($weekNumber) {
        $this->weekNumber = $weekNumber;

        return $this;
    }

    /**
     * Get weekNumber
     *
     * @return string
     */
    public function getWeekNumber() {
        return $this->weekNumber;
    }

    /**
     * Set numberHours
     *
     * @param float $numberHours
     *
     * @return Intervention
     */
    public function setNumberHours($numberHours) {
        $this->numberHours = $numberHours;

        return $this;
    }

    /**
     * Get numberHours
     *
     * @return float
     */
    public function getNumberHours() {
        return $this->numberHours;
    }
    
    /**
     * Get totalMaterialCost
     *
     * @return float
     */
    public function getTotalMaterialCost() {
        return $this->totalMaterialCost;
    }
    
    /**
     * Set totalMaterialCost
     *
     * @param float $totalMaterialCost
     *
     * @return Intervention
     */
    public function setTotalMaterialCost($totalMaterialCost) {
        $this->totalMaterialCost = $totalMaterialCost;
        
        return $this;
    }

    /**
     * Set comments
     *
     * @param string $comments
     *
     * @return Intervention
     */
    public function setComments($comments) {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments() {
        return $this->comments;
    }

    /**
     * Set kindWork
     *
     * @param \GestionBundle\Entity\KindWork $kindWork
     *
     * @return Intervention
     */
    public function setKindWork($kindWork) {
        $this->kindWork = $kindWork;
    }

    /**
     * Set typeIntervention
     *
     * @param \GestionBundle\Entity\TypeIntervention $typeIntervention
     *
     * @return Intervention
     */
    public function setTypeIntervention($typeIntervention) {
        $this->typeIntervention = $typeIntervention;
    }

    /**
     * Get kindWork
     *
     * @return KindWork
     */
    public function getKindWork() {
        return $this->kindWork;
    }

    /**
     * Get typeIntervention
     *
     * @return TypeIntervention
     */
    public function getTypeIntervention() {
        return $this->typeIntervention;
    }

    /**
     * Get places
     *
     * @return Place
     */
    public function getPlaces() {
        return $this->places;
    }

    /**
     * Set places
     *
     * @param \GestionBundle\Entity\Place $places
     *
     * @return Intervention
     */
    public function setPlaces($places) {
        $this->places = $places;
    }

    /**
     * Get technician
     *
     * @return Technician
     */
    public function getTechnician() {
        return $this->technician;
    }

    /**
     * Set technician
     *
     * @param \GestionBundle\Entity\Technician $technician
     *
     * @return Intervention
     */
    public function setTechnician($technician) {
        $this->technician = $technician;
    }

    /**
     * toString method/Méthode toString
     */
    public function __toString() {
        if (is_null($this->comments)) {
            return '';
        }
        return $this->comments;
    }

}

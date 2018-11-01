<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\KindWork;

/**
 * LaborCost
 *
 * @ORM\Table(name="labor_cost")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\LaborCostRepository")
 */
class LaborCost {

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
     * @ORM\Column(name="kind_labor_cost", type="string", length=20, nullable=true)
     */
    private $kindLaborCost;

    /**
     * @var float
     *
     * @ORM\Column(name="labor_cost", type="float", nullable=true)
     */
    private $laborCost;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="info_active_labor_cost", type="boolean")
     */
    private $infoActiveLaborCost;

    /**
     * @ORM\OneToOne(targetEntity="KindWork", mappedBy="laborCost") 
     */
    private $kindWork;

    /**
     * Constructor/Constructeur
     */
    function __construct() {
        
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
     * Set kindLaborCost
     *
     * @param string $kindLaborCost
     *
     * @return LaborCost
     */
    public function setKindLaborCost($kindLaborCost) {
        $this->kindLaborCost = $kindLaborCost;

        return $this;
    }

    /**
     * Get kindLaborCost
     *
     * @return string
     */
    public function getKindLaborCost() {
        return $this->kindLaborCost;
    }

    /**
     * Set laborCost
     *
     * @param float $laborCost
     *
     * @return LaborCost
     */
    public function setLaborCost($laborCost) {
        $this->laborCost = $laborCost;

        return $this;
    }

    /**
     * Get laborCost
     *
     * @return float
     */
    public function getLaborCost() {
        return $this->laborCost;
    }

    /**
     * Get place
     * 
     * @return KindWork
     */
    public function getKindWork() {
        return $this->kindWork;
    }

    /**
     * Set kindWork
     * @param KindWork $kindWork
     *
     * @return LaborCost
     */
    public function setKindWork($kindWork) {
        $this->kindWork = $kindWork;

        return $this;
    }

    /**
     * Get infoActiveLaborCost
     *
     * @return boolean
     */
    public function getInfoActiveLaborCost() {
        return $this->infoActiveLaborCost;
    }

    /**
     * Set infoActiveLaborCost
     *
     * @return boolean
     */
    public function setInfoActiveLaborCost($infoActiveLaborCost) {
        $this->infoActiveLaborCost = $infoActiveLaborCost;

        return $this;
    }

    /**
     * toString method/Méthode toString
     */
    public function __toString() {
        return $this->kindLaborCost;
    }

}

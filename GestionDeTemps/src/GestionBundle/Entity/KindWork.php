<?php

namespace GestionBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GestionBundle\Entity\Intervention;
use GestionBundle\Entity\LaborCost;

/**
 * KindWork
 *
 * @ORM\Table(name="kind_work")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\KindWorkRepository")
 */
class KindWork {

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
     * @ORM\Column(name="title_kind_work", type="string", length=30)
     */
    private $titleKindWork;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="info_active_kind_work", type="boolean")
     */
    private $infoActiveKindWork;

    /**
     * @var Intervention
     * 
     * --contraintes de validation
     *
     * --liaison avec Intervention
     * @ORM\OneToMany(targetEntity="Intervention", mappedBy="kindWork") 
     */
    private $intervention;

    /**
     * @var LaborCost
     * 
     * -- Liaison bidirectionnelle entre KindWork et LaborCost
     * @ORM\OneToOne(targetEntity="LaborCost", inversedBy="kindWork") 
     */
    private $laborCost;

    /**
     * Constructor/Constructeur
     */
    public function __construct() {

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
     * Set titleKindWork
     *
     * @param string $titleKindWork
     *
     * @return KindWork
     */
    public function setTitleKindWork($titleKindWork) {
        $this->titleKindWork = $titleKindWork;

        return $this;
    }

    /**
     * Get titleKindWork
     *
     * @return string
     */
    public function getTitleKindWork() {
        return $this->titleKindWork;
    }

    /**
     * Set intervention
     *
     * @param Intervention $intervention
     * 
     * @return KindWork
     */
    public function setIntervention($intervention) {
        $this->intervention = $intervention;

        return $this;
    }

    /**
     * Set laborCost
     * 
     * @param LaborCost $laborCost
     *
     * @return KindWork
     */
    public function setLaborCost($laborCost) {
        $this->laborCost = $laborCost;

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
     * Get laborCost
     * 
     * @return LaborCost
     */
    public function getLaborCost() {
        return $this->laborCost;
    }

    /**
     * Get infoActiveKindWork
     *
     * @return boolean
     */
    public function getInfoActiveKindWork() {
        return $this->infoActiveKindWork;
    }

    /**
     * Set infoActiveKindWork
     *
     * @return boolean
     */
    public function setInfoActiveKindWork($infoActiveKindWork) {
        $this->infoActiveKindWork = $infoActiveKindWork;

        return $this;
    }

    /**
     * toString method/Méthode toString
     */
    public function __toString() {
        if (is_null($this->titleKindWork)) {
            return '';
        }
        return $this->titleKindWork;
    }

}

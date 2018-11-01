<?php

namespace GestionBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use GestionBundle\Entity\Intervention;
use GestionBundle\Entity\Technician;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Technician
 *
 * @ORM\Table(name="technician")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\TechnicianRepository")
 */
class Technician {

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
     * @ORM\Column(name="last_name", type="string", length=50)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=50)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=10, nullable=true)
     */
    private $phoneNumber;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_begin", type="date", nullable=true)
     */
    private $dateBegin;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_end", type="date", nullable=true)
     */
    private $dateEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="trades", type="string", length=20)
     */
    private $trades;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="info_active_technician", type="boolean")
     */
    private $infoActiveTechnician;

    /**
     * @OneToMany(targetEntity="Intervention", mappedBy="technician") 
     */
    private $interventions;

    /**
     * Constructor/Constructeur
     */
    function __construct() {
        $this->interventions = new ArrayCollection();
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
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Technician
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Technician
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return Technician
     */
    public function setPhoneNumber($phoneNumber) {
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
     * Set dateBegin
     *
     * @param DateTime $dateBegin
     *
     * @return Technician
     */
    public function setDateBegin($dateBegin) {
        $this->dateBegin = $dateBegin;

        return $this;
    }

    /**
     * Get dateBegin
     *
     * @return DateTime
     */
    public function getDateBegin() {
        return $this->dateBegin;
    }

    /**
     * Set dateEnd
     *
     * @param DateTime $dateEnd
     *
     * @return Technician
     */
    public function setDateEnd($dateEnd) {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return DateTime
     */
    public function getDateEnd() {
        return $this->dateEnd;
    }

    /**
     * Set trades
     *
     * @param string $trades
     *
     * @return Technician
     */
    public function setTrades($trades) {
        $this->trades = $trades;

        return $this;
    }

    /**
     * Get trades
     *
     * @return string
     */
    public function getTrades() {
        return $this->trades;
    }

    /**
     * Get intervention
     * 
     * @return Intervention
     */
    public function getInterventions() {
        return $this->interventions;
    }

    /**
     * Set intervention
     *
     * @param \GestionBundle\Entity\Intervention $interventions
     * 
     * @return Technician
     */
    public function setInterventions($interventions) {
        $this->interventions = $interventions;
    }

    public function removeIntervention(Intervention $intervention) {
        $this->interventions->removeElement($intervention);
    }

    public function addIntervention(Intervention $intervention) {
        $this->interventions[] = $intervention;

        return $this;
    }

    /**
     * Get infoActiveTechnician
     *
     * @return boolean
     */
    public function getInfoActiveTechnician() {
        return $this->infoActiveTechnician;
    }

    /**
     * Set infoActiveTechnician
     *
     * @return boolean
     */
    public function setInfoActiveTechnician($infoActiveTechnician) {
        $this->infoActiveTechnician = $infoActiveTechnician;

        return $this;
    }

    /**
     * toString method/Méthode toString
     */
    public function __toString() {
        return $this->lastName . ' ' . $this->firstName;
    }

}

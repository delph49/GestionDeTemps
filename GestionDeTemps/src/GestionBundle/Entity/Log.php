<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Log
 *
 * @ORM\Table(name="log")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\LogRepository")
 */
class Log {

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
     * @ORM\Column(name="user_name", type="string", length=100)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="action_performed", type="string", length=50)
     */
    private $actionPerformed;

    /**
     * Constructor/Constructeur
     */
    function __construct() {
        
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
     * Set userName
     *
     * @param string $userName
     *
     * @return Log
     */
    public function setUserName($userName) {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUserName() {
        return $this->userName;
    }

    /**
     * Set actionPerformed
     *
     * @param string $actionPerformed
     *
     * @return Log
     */
    public function setActionPerformed($actionPerformed) {
        $this->actionPerformed = $actionPerformed;

        return $this;
    }

    /**
     * Get actionPerformed
     *
     * @return string
     */
    public function getActionPerformed() {
        return $this->actionPerformed;
    }

    /**
     * toString method/Méthode toString
     */
    public function __toString() {
        return $this->userName;
    }

}

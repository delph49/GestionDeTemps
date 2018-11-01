<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * FOSUserBundle
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @Assert\Regex(
     *  pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[0-9a-zA-Z]{8,}$/",
     *  message="Le mot de passe doit faire 8 caractères au minimum avec 
     *  une majuscule et un chiffre sans accent." )
     */
    protected $plainPassword;

    public function __construct()
    {
        parent::__construct();
       
    }
}

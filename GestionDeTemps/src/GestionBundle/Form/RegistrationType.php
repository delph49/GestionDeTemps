<?php

/**
 * Description of RegistrationType
 * 
 * To override the FOSUserBundle RegistrationType. This class inherits from 
 * the base FOSUserBundle fos_user_registration type using the form type hierarchy
 * and then adds the roles and enabled fields.
 * 
 * Pour surcharger le RegistrationType de FOSUserBundle. Cette classe hérite du 
 * fos_user_registrationtype de base FOSUserBundle en utilisant la hiérarchie des types 
 * de formulaire, puis ajoute les champs "roles" et "enabled". .
 * 
 * @author Delph
 */

namespace GestionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('roles', CollectionType::class, array(
                    'entry_type' => ChoiceType::class,
                    'entry_options' => array('label' => false, 'choices' => array(
                            'ROLE_ADMIN' => 'ROLE_SUPER_ADMIN',
                            'ROLE_USER' => 'ROLE_USER'))))
                ->add('enabled');
    }

    public function getParent() {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix() {
        return 'gestion_user_registration';
    }

}

<?php

/**
 * Description of User
 *
 * @author Delph
 */

namespace GestionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('email', EmailType::class, array('label' => 'Email'))
                ->add('username', null, array('label' => 'Pseudo'))
                ->add('roles', CollectionType::class, array(
                    'entry_type' => ChoiceType::class,
                    'entry_options' => array(
                    /*
                    * To remove the 0 after "Role" from the display
                    * Pour enlever le 0 qu'il y a après "Rôle" à l'affichage                  
                    */
                        'label' => false,
                        'choices' => array(
                            'ROLE_ADMIN' => 'ROLE_SUPER_ADMIN',
                            'ROLE_USER' => 'ROLE_USER'
                        )
                    )
                        )
                )
                ->add('enabled');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'gestionbundle_user';
    }

}

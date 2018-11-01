<?php

namespace GestionBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InterventionType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
                ->add('technician', EntityType::class, ['class' => 'GestionBundle:Technician', 'placeholder' => 'Sélectionnez un technicien',
//  call to the function findByAlphabeticOrder () which is in TechnicianRepository for the alphabetical sorting of last names then first names
//  appel à la fonction findByAlphabeticOrder() qui est dans TechnicianRepository pour le tri alphabétique des noms puis des prénoms
                    'query_builder' => function(EntityRepository $er) {
                        return $er->findByAlphabeticOrder();
                    },])
//  To have just the year before and the current year
//  Pour avoir l'année d'avant et l'année en cours uniquement
                ->add('interventionDate', DateType::class, array('widget' => 'choice', 'years' => range(date('Y') - 1, date('Y')),
))
//To have a drop-down list with the existing possibilities and thus limit errors
//Pour avoir une liste déroulante avec les possibilités existantes et ainsi limiter les erreurs
                ->add('weekNumber', ChoiceType::class, ['placeholder' => 'Sélectionnez une semaine', 'choices' => array('S01' => "S01", 'S02' => "S02", 'S03' => "S03",
                        'S04' => "S04", 'S05' => "S05", 'S06' => "S06", 'S07' => "S07", 'S08' => "S08", 'S09' => "S09", 'S10' => "S10", 'S11' => "S11", 'S12' => "S12",
                        'S13' => "S13", 'S14' => "S14", 'S15' => "S15", 'S16' => "S16", 'S17' => "S17", 'S18' => "S18", 'S19' => "S19", 'S20' => "S20", 'S21' => "S21",
                        'S22' => "S22", 'S23' => "S23", 'S24' => "S24", 'S25' => "S25", 'S26' => "S26", 'S27' => "S27", 'S28' => "S28", 'S29' => "S29", 'S30' => "S30",
                        'S31' => "S31", 'S32' => "S32", 'S33' => "S33", 'S34' => "S34", 'S35' => "S35", 'S36' => "S36", 'S37' => "S37", 'S38' => "S38", 'S39' => "S39",
                        'S40' => "S40", 'S41' => "S41", 'S42' => "S42", 'S43' => "S43", 'S44' => "S44", 'S45' => "S45", 'S46' => "S46", 'S47' => "S47", 'S48' => "S48",
                        'S49' => "S49", 'S50' => "S50", 'S51' => "S51", 'S52' => "S52", 'S53' => "S53")])
//To have a drop-down list with the existing possibilities and thus limit errors
//Pour avoir une liste déroulante avec les possibilités existantes et ainsi limiter les erreurs
                ->add('numberHours', ChoiceType::class, ['placeholder' => "Sélectionnez un nombre d'heures", 'choices' => array('0h15' => 0.25, '0h30' => 0.50, '0h45' => 0.75,
                        '1h00' => 1, '1h15' => 1.25, '1h30' => 1.5, '1h45' => 1.75, '2h00' => 2, '2h15' => 2.25, '2h30' => 2.5, '2h45' => 2.75, '3h00' => 3, '3h15' => 3.25,
                        '3h30' => 3.5, '3h45' => 3.75, '4h00' => 4, '4h15' => 4.25, '4h30' => 4.5, '4h45' => 4.75, '5h00' => 5, '5h15' => 5.25, '5h30' => 5.5, '5h45' => 5.75,
                        '6h00' => 6, '6h15' => 6.25, '6h30' => 6.5, '6h45' => 6.75, '7h00' => 7, '7h15' => 7.25, '7h30' => 7.5, '7h45' => 7.75, '8h00' => 8, '8h15' => 8.25,
                        '8h30' => 8.5, '8h45' => 8.75, '9h00' => 9, '9h15' => 9.25, '9h30' => 9.5, '9h45' => 9.75, '10h00' => 10, '10h15' => 10.25, '10h30' => 10.5,
                        '10h45' => 10.75, '11h00' => 11, '11h15' => 11.25, '11h30' => 11.5, '11h45' => 11.75, '12h00' => 12), 'required' => true])
                ->add('places', EntityType::class, ['class' => 'GestionBundle:Place', 'placeholder' => 'Sélectionnez un lieu', 'required' => false,
//  call to the function findByAlphabeticOrder () which is in PlaceRepository for the alphabetical sorting of title place
//  appel à la fonction findByAlphabeticOrder() qui est dans PlaceRepository pour le tri alphabétique des noms de lieux
                    'query_builder' => function(EntityRepository $er) {
                        return $er->findByAlphabeticOrder();
                    },])
                ->add('typeIntervention', EntityType::class, ['class' => 'GestionBundle:TypeIntervention', 'placeholder' => "Sélectionnez une nature d'intervention si nécessaire"
                    , 'required' => false,
//  call to the function findByAlphabeticOrder () which is in TypeInterventionRepository for the alphabetical sorting of title place
//  appel à la fonction findByAlphabeticOrder() qui est dans TypeInterventionRepository pour le tri alphabétique des intitulés des natures d'intervention
                    'query_builder' => function(EntityRepository $er) {
                        return $er->findByAlphabeticOrder();
                    },])
                ->add('kindWork', EntityType::class, ['class' => 'GestionBundle:KindWork', 'placeholder' => 'Sélectionnez un type de travail',
//  call to the function findByAlphabeticOrder () which is in KindWorkRepository for the alphabetical sorting of title of the type of intervention
//  appel à la fonction findByAlphabeticOrder() qui est dans Kind WorkRepository pour le tri alphabétique des intitulés de types de travaux
                    'query_builder' => function(EntityRepository $er) {
                        return $er->findByAlphabeticOrder();
                    },])
                ->add('totalMaterialCost')
                ->add('comments', TextareaType::class, ['required' => false]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\Intervention'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'gestionbundle_intervention';
    }

}

<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Intervention;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

/**
 * Intervention controller.
 *
 */
class InterventionController extends Controller {

    /**
     * Lists all intervention entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $interventions = $em->getRepository('GestionBundle:Intervention')->findAll();

        return $this->render('intervention/index.html.twig', array(
                    'interventions' => $interventions,
        ));
    }

    /**
     * Creates a new intervention entity.
     *
     */
    public function newAction(Request $request) {
        $intervention = new Intervention();
        $form = $this->createForm('GestionBundle\Form\InterventionType', $intervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($intervention);
            $em->flush();

            return $this->redirectToRoute('intervention_show', array('id' => $intervention->getId()));
        }

        return $this->render('intervention/new.html.twig', array(
                    'intervention' => $intervention,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays an intervention entity.
     * Trouve et affiche une entité d'intervention.
     */
    public function showAction(Intervention $intervention) {
        $deleteForm = $this->createDeleteForm($intervention);

        return $this->render('intervention/show.html.twig', array(
                    'intervention' => $intervention,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing intervention entity.
     * Affiche un formulaire pour modifier une entité d'intervention existante.
     */
    public function editAction(Request $request, Intervention $intervention) {
        $deleteForm = $this->createDeleteForm($intervention);
        $editForm = $this->createForm('GestionBundle\Form\InterventionType', $intervention);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('intervention_show', array('id' => $intervention->getId()));
        }

        return $this->render('intervention/edit.html.twig', array(
                    'intervention' => $intervention,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes an intervention entity.
     * Supprime une entité d'intervention.
     */
    public function deleteAction(Request $request, Intervention $intervention) {
        $form = $this->createDeleteForm($intervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($intervention);
            $em->flush();
        }

        return $this->redirectToRoute('intervention_index');
    }

    /**
     * Creates a form to delete an intervention entity.
     * Crée un formulaire pour supprimer une entité d'intervention.
     *
     * @param Intervention $intervention The intervention entity
     *
     * @return Form The form
     */
    private function createDeleteForm(Intervention $intervention) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('intervention_delete', array('id' => $intervention->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

    public function summaryAction() {
        $em = $this->getDoctrine()->getManager();
        
        $interventions = $em->getRepository('GestionBundle:Intervention')->summaryArray();
        return $this->render('stat/summary.html.twig', ['controller_name' => 'InterventionController',
                    'interventions' => $interventions]);
    }

    public function weekTechnicianAction() {
        $em = $this->getDoctrine()->getManager();
        
        $interventions = $em->getRepository('GestionBundle:Intervention')->weekTechnicianArray();
        
        return $this->render('stat/weekTechnician.html.twig', ['controller_name' => 'InterventionController',
                    'interventions' => $interventions]);       
    }
    
    public function placeKindWorkWeekAction() {
        $em = $this->getDoctrine()->getManager();
        
        $interventions = $em->getRepository('GestionBundle:Intervention')->placeKindWorkWeekArray();
        
        return $this->render('stat/placeKindWorkWeek.html.twig', ['controller_name' => 'InterventionController',
                    'interventions' => $interventions]);       
    }
    
     /**
     * Function that calls the groupTypeInterArray() function of the Repository to send to 
     * the corresponding view for displaying the "groupTypeInter" table
     * Fonction qui appelle la fonction groupTypeInterArray() du Repository
     * pour envoyer à la vue correspondant pour l'affichage du tableau "groupTypeInter"
     */
    public function groupTypeInterAction() {
        $em = $this->getDoctrine()->getManager();
        
        $interventions = $em->getRepository('GestionBundle:Intervention')->groupTypeInterArray();
        return $this->render('stat/groupTypeInter.html.twig', ['controller_name' => 'InterventionController',
                    'interventions' => $interventions]);      
    }
    
    public function kindWorkTechnicianAction() {
        $em = $this->getDoctrine()->getManager();
        
        $interventions = $em->getRepository('GestionBundle:Intervention')->kindWorkTechnicianArray();
        return $this->render('stat/kindWorkTechnician.html.twig', ['controller_name' => 'InterventionController',
                    'interventions' => $interventions]);
    }
    
    public function kindWorkTechnicianWeekAction() {
        $em = $this->getDoctrine()->getManager();
        
        $interventions = $em->getRepository('GestionBundle:Intervention')->kindWorkTechnicianWeekArray();
        return $this->render('stat/kindWorkTechnicianWeek.html.twig', ['controller_name' => 'InterventionController',
                    'interventions' => $interventions]);
    }
    
    public function InvestInterPlaceKindWorkAction() {
        $em = $this->getDoctrine()->getManager();
        
        $interventions = $em->getRepository('GestionBundle:Intervention')->investInterPlaceKindWorkArray();
        return $this->render('stat/investInterPlaceKindWork.html.twig', ['controller_name' => 'InterventionController',
                    'interventions' => $interventions]);
    }
    
    /**
     * Function that calls the dayTechnicianHoursCostArray() function of the Repository to send to 
     * the corresponding view for displaying the "dayTechnicianHoursCost" table
     * Fonction qui appelle la fonction dayTechnicianHoursCostArray() du Repository
     * pour envoyer à la vue correspondant pour l'affichage du tableau "dayTechnicianHoursCost"
     */
    public function DayTechnicianHoursCostAction() {
        $em = $this->getDoctrine()->getManager();
        
        $interventions = $em->getRepository('GestionBundle:Intervention')->dayTechnicianHoursCostArray();
        return $this->render('stat/dayTechnicianHoursCost.html.twig', ['controller_name' => 'InterventionController',
                    'interventions' => $interventions]);
        }
        
    public function KindWorkPlaceCostAction() {
        $em = $this->getDoctrine()->getManager();
        
        $interventions = $em->getRepository('GestionBundle:Intervention')->kindWorkPlaceCostArray();
        return $this->render('stat/kindWorkPlaceCost.html.twig', ['controller_name' => 'InterventionController',
                    'interventions' => $interventions]);
        }
    
    public function homepageTableAction() {
        $em = $this->getDoctrine()->getManager();
        
        $interventions = $em->getRepository('GestionBundle:Intervention')->homepageTableArray();
        return $this->render('login_success.html.twig', ['controller_name' => 'InterventionController',
                    'interventions' => $interventions]);
        }
}

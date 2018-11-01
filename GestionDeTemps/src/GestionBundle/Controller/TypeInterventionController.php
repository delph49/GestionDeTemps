<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\TypeIntervention;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Typeintervention controller.
 *
 */
class TypeInterventionController extends Controller
{
    /**
     * Lists all typeIntervention entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeInterventions = $em->getRepository('GestionBundle:TypeIntervention')->findAll();

        return $this->render('typeintervention/index.html.twig', array(
            'typeInterventions' => $typeInterventions,
        ));
    }

    /**
     * Creates a new typeIntervention entity.
     *
     */
    public function newAction(Request $request)
    {
        $typeIntervention = new Typeintervention();
        $form = $this->createForm('GestionBundle\Form\TypeInterventionType', $typeIntervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeIntervention);
            $em->flush();

            return $this->redirectToRoute('typeintervention_show', array('id' => $typeIntervention->getId()));
        }

        return $this->render('typeintervention/new.html.twig', array(
            'typeIntervention' => $typeIntervention,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typeIntervention entity.
     *
     */
    public function showAction(TypeIntervention $typeIntervention)
    {
        $deleteForm = $this->createDeleteForm($typeIntervention);

        return $this->render('typeintervention/show.html.twig', array(
            'typeIntervention' => $typeIntervention,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typeIntervention entity.
     *
     */
    public function editAction(Request $request, TypeIntervention $typeIntervention)
    {
        $deleteForm = $this->createDeleteForm($typeIntervention);
        $editForm = $this->createForm('GestionBundle\Form\TypeInterventionType', $typeIntervention);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typeintervention_show', array('id' => $typeIntervention->getId()));
        }

        return $this->render('typeintervention/edit.html.twig', array(
            'typeIntervention' => $typeIntervention,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typeIntervention entity.
     *
     */
    public function deleteAction(Request $request, TypeIntervention $typeIntervention)
    {
        $form = $this->createDeleteForm($typeIntervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeIntervention);
            $em->flush();
        }

        return $this->redirectToRoute('typeintervention_index');
    }

    /**
     * Creates a form to delete a typeIntervention entity.
     *
     * @param TypeIntervention $typeIntervention The typeIntervention entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeIntervention $typeIntervention)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typeintervention_delete', array('id' => $typeIntervention->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

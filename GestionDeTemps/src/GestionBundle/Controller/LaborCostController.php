<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\LaborCost;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Laborcost controller.
 *
 */
class LaborCostController extends Controller
{
    /**
     * Lists all laborCost entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $laborCosts = $em->getRepository('GestionBundle:LaborCost')->findAll();

        return $this->render('laborcost/index.html.twig', array(
            'laborCosts' => $laborCosts,
        ));
    }

    /**
     * Creates a new laborCost entity.
     *
     */
    public function newAction(Request $request)
    {
        $laborCost = new Laborcost();
        $form = $this->createForm('GestionBundle\Form\LaborCostType', $laborCost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($laborCost);
            $em->flush();

            return $this->redirectToRoute('laborcost_show', array('id' => $laborCost->getId()));
        }

        return $this->render('laborcost/new.html.twig', array(
            'laborCost' => $laborCost,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a laborCost entity.
     *
     */
    public function showAction(LaborCost $laborCost)
    {
        $deleteForm = $this->createDeleteForm($laborCost);

        return $this->render('laborcost/show.html.twig', array(
            'laborCost' => $laborCost,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing laborCost entity.
     *
     */
    public function editAction(Request $request, LaborCost $laborCost)
    {
        $deleteForm = $this->createDeleteForm($laborCost);
        $editForm = $this->createForm('GestionBundle\Form\LaborCostType', $laborCost);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('laborcost_show', array('id' => $laborCost->getId()));
        }

        return $this->render('laborcost/edit.html.twig', array(
            'laborCost' => $laborCost,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a laborCost entity.
     *
     */
    public function deleteAction(Request $request, LaborCost $laborCost)
    {
        $form = $this->createDeleteForm($laborCost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($laborCost);
            $em->flush();
        }

        return $this->redirectToRoute('laborcost_index');
    }

    /**
     * Creates a form to delete a laborCost entity.
     *
     * @param LaborCost $laborCost The laborCost entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LaborCost $laborCost)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('laborcost_delete', array('id' => $laborCost->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

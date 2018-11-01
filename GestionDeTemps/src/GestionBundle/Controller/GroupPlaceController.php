<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\GroupPlace;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Groupplace controller.
 *
 */
class GroupPlaceController extends Controller
{
    /**
     * Lists all groupPlace entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
      
        $groupPlaces = $em->getRepository('GestionBundle:GroupPlace')->findAll();

        return $this->render('groupplace/index.html.twig', array(
            'groupPlaces' => $groupPlaces,
        ));
    }

    /**
     * Creates a new groupPlace entity.
     *
     */
    public function newAction(Request $request)
    {
        $groupPlace = new Groupplace();
        $form = $this->createForm('GestionBundle\Form\GroupPlaceType', $groupPlace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupPlace);
            $em->flush();

            return $this->redirectToRoute('groupplace_show', array('id' => $groupPlace->getId()));
        }

        return $this->render('groupplace/new.html.twig', array(
            'groupPlace' => $groupPlace,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a groupPlace entity.
     *
     */
    public function showAction(GroupPlace $groupPlace)
    {
        $deleteForm = $this->createDeleteForm($groupPlace);

        return $this->render('groupplace/show.html.twig', array(
            'groupPlace' => $groupPlace,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing groupPlace entity.
     *
     */
    public function editAction(Request $request, GroupPlace $groupPlace)
    {
        $deleteForm = $this->createDeleteForm($groupPlace);
        $editForm = $this->createForm('GestionBundle\Form\GroupPlaceType', $groupPlace);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('groupplace_show', array('id' => $groupPlace->getId()));
        }

        return $this->render('groupplace/edit.html.twig', array(
            'groupPlace' => $groupPlace,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a groupPlace entity.
     *
     */
    public function deleteAction(Request $request, GroupPlace $groupPlace)
    {
        $form = $this->createDeleteForm($groupPlace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($groupPlace);
            $em->flush();
        }

        return $this->redirectToRoute('groupplace_index');
    }

    /**
     * Creates a form to delete a groupPlace entity.
     *
     * @param GroupPlace $groupPlace The groupPlace entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(GroupPlace $groupPlace)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('groupplace_delete', array('id' => $groupPlace->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

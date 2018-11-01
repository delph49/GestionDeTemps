<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Technician;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Technician controller.
 *
 */
class TechnicianController extends Controller
{
    /**
     * Lists all technician entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $technicians = $em->getRepository('GestionBundle:Technician')->findAll();

        return $this->render('technician/index.html.twig', array(
            'technicians' => $technicians,
        ));
    }

    /**
     * Creates a new technician entity.
     *
     */
    public function newAction(Request $request)
    {
        $technician = new Technician();
        $form = $this->createForm('GestionBundle\Form\TechnicianType', $technician);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($technician);
            $em->flush();

            return $this->redirectToRoute('technician_show', array('id' => $technician->getId()));
        }

        return $this->render('technician/new.html.twig', array(
            'technician' => $technician,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a technician entity.
     *
     */
    public function showAction(Technician $technician)
    {
        $deleteForm = $this->createDeleteForm($technician);

        return $this->render('technician/show.html.twig', array(
            'technician' => $technician,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing technician entity.
     *
     */
    public function editAction(Request $request, Technician $technician)
    {
        $deleteForm = $this->createDeleteForm($technician);
        $editForm = $this->createForm('GestionBundle\Form\TechnicianType', $technician);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('technician_edit', array('id' => $technician->getId()));
        }

        return $this->render('technician/edit.html.twig', array(
            'technician' => $technician,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a technician entity.
     *
     */
    public function deleteAction(Request $request, Technician $technician)
    {
        $form = $this->createDeleteForm($technician);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($technician);
            $em->flush();
        }

        return $this->redirectToRoute('technician_index');
    }

    /**
     * Creates a form to delete a technician entity.
     *
     * @param Technician $technician The technician entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Technician $technician)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('technician_delete', array('id' => $technician->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\KindWork;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Kindwork controller.
 *
 */
class KindWorkController extends Controller
{
    /**
     * Lists all kindWork entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $kindWorks = $em->getRepository('GestionBundle:KindWork')->findAll();

        return $this->render('kindwork/index.html.twig', array(
            'kindWorks' => $kindWorks,
        ));
    }

    /**
     * Creates a new kindWork entity.
     *
     */
    public function newAction(Request $request)
    {
        $kindWork = new Kindwork();
        $form = $this->createForm('GestionBundle\Form\KindWorkType', $kindWork);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($kindWork);
            $em->flush();

            return $this->redirectToRoute('kindwork_show', array('id' => $kindWork->getId()));
        }

        return $this->render('kindwork/new.html.twig', array(
            'kindWork' => $kindWork,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a kindWork entity.
     *
     */
    public function showAction(KindWork $kindWork)
    {
        $deleteForm = $this->createDeleteForm($kindWork);

        return $this->render('kindwork/show.html.twig', array(
            'kindWork' => $kindWork,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing kindWork entity.
     *
     */
    public function editAction(Request $request, KindWork $kindWork)
    {
        $deleteForm = $this->createDeleteForm($kindWork);
        $editForm = $this->createForm('GestionBundle\Form\KindWorkType', $kindWork);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('kindwork_show', array('id' => $kindWork->getId()));
        }

        return $this->render('kindwork/edit.html.twig', array(
            'kindWork' => $kindWork,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a kindWork entity.
     *
     */
    public function deleteAction(Request $request, KindWork $kindWork)
    {
        $form = $this->createDeleteForm($kindWork);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($kindWork);
            $em->flush();
        }

        return $this->redirectToRoute('kindwork_index');
    }

    /**
     * Creates a form to delete a kindWork entity.
     *
     * @param KindWork $kindWork The kindWork entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(KindWork $kindWork)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('kindwork_delete', array('id' => $kindWork->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

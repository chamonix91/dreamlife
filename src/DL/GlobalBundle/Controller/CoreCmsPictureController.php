<?php

namespace DL\GlobalBundle\Controller;

use DL\GlobalBundle\Entity\CoreCmsPicture;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Corecmspicture controller.
 *
 */
class CoreCmsPictureController extends Controller
{
    /**
     * Lists all coreCmsPicture entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $coreCmsPictures = $em->getRepository('DLGlobalBundle:CoreCmsPicture')->findAll();

        return $this->render('corecmspicture/index.html.twig', array(
            'coreCmsPictures' => $coreCmsPictures,
        ));
    }

    /**
     * Creates a new coreCmsPicture entity.
     *
     */
    public function newAction(Request $request)
    {
        $coreCmsPicture = new Corecmspicture();
        $form = $this->createForm('DL\GlobalBundle\Form\CoreCmsPictureType', $coreCmsPicture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($coreCmsPicture);
            $em->flush();

            return $this->redirectToRoute('Picture_show', array('uid' => $coreCmsPicture->getUid()));
        }

        return $this->render('corecmspicture/new.html.twig', array(
            'coreCmsPicture' => $coreCmsPicture,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a coreCmsPicture entity.
     *
     */
    public function showAction(CoreCmsPicture $coreCmsPicture)
    {
        $deleteForm = $this->createDeleteForm($coreCmsPicture);

        return $this->render('corecmspicture/show.html.twig', array(
            'coreCmsPicture' => $coreCmsPicture,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing coreCmsPicture entity.
     *
     */
    public function editAction(Request $request, CoreCmsPicture $coreCmsPicture)
    {
        $deleteForm = $this->createDeleteForm($coreCmsPicture);
        $editForm = $this->createForm('DL\GlobalBundle\Form\CoreCmsPictureType', $coreCmsPicture);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Picture_edit', array('uid' => $coreCmsPicture->getUid()));
        }

        return $this->render('corecmspicture/edit.html.twig', array(
            'coreCmsPicture' => $coreCmsPicture,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a coreCmsPicture entity.
     *
     */
    public function deleteAction(Request $request, CoreCmsPicture $coreCmsPicture)
    {
        $form = $this->createDeleteForm($coreCmsPicture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($coreCmsPicture);
            $em->flush();
        }

        return $this->redirectToRoute('Picture_index');
    }

    /**
     * Creates a form to delete a coreCmsPicture entity.
     *
     * @param CoreCmsPicture $coreCmsPicture The coreCmsPicture entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CoreCmsPicture $coreCmsPicture)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Picture_delete', array('uid' => $coreCmsPicture->getUid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

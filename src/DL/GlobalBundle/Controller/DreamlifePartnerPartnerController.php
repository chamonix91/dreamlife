<?php

namespace DL\GlobalBundle\Controller;

use DL\GlobalBundle\Entity\CoreCustomerAddress;
use DL\GlobalBundle\Entity\DreamlifePartnerPartner;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Dreamlifepartnerpartner controller.
 *
 */
class DreamlifePartnerPartnerController extends Controller
{
    /**
     * Lists all dreamlifePartnerPartner entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dreamlifePartnerPartners = $em->getRepository('DLGlobalBundle:DreamlifePartnerPartner')->findAll();

        return $this->render('dreamlifepartnerpartner/index.html.twig', array(
            'dreamlifePartnerPartners' => $dreamlifePartnerPartners,
        ));
    }

    /**
     * Creates a new dreamlifePartnerPartner entity.
     *
     */
    public function newAction(Request $request)
    {
        $dreamlifePartnerPartner = new Dreamlifepartnerpartner();

        $form = $this->createForm('DL\GlobalBundle\Form\DreamlifePartnerPartnerType', $dreamlifePartnerPartner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dreamlifePartnerPartner);
            $em->flush();

            return $this->redirectToRoute('Partner_show', array('uid' => $dreamlifePartnerPartner->getUid()));
        }

        return $this->render('dreamlifepartnerpartner/new.html.twig', array(
            'dreamlifePartnerPartner' => $dreamlifePartnerPartner,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a dreamlifePartnerPartner entity.
     *
     */
    public function showAction(DreamlifePartnerPartner $dreamlifePartnerPartner)
    {
        $deleteForm = $this->createDeleteForm($dreamlifePartnerPartner);

        return $this->render('dreamlifepartnerpartner/show.html.twig', array(
            'dreamlifePartnerPartner' => $dreamlifePartnerPartner,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing dreamlifePartnerPartner entity.
     *
     */
    public function editAction(Request $request, DreamlifePartnerPartner $dreamlifePartnerPartner)
    {
        $deleteForm = $this->createDeleteForm($dreamlifePartnerPartner);
        $editForm = $this->createForm('DL\GlobalBundle\Form\DreamlifePartnerPartnerType', $dreamlifePartnerPartner);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Partner_edit', array('uid' => $dreamlifePartnerPartner->getUid()));
        }

        return $this->render('dreamlifepartnerpartner/edit.html.twig', array(
            'dreamlifePartnerPartner' => $dreamlifePartnerPartner,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a dreamlifePartnerPartner entity.
     *
     */
    public function deleteAction(Request $request, DreamlifePartnerPartner $dreamlifePartnerPartner)
    {
        $form = $this->createDeleteForm($dreamlifePartnerPartner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dreamlifePartnerPartner);
            $em->flush();
        }

        return $this->redirectToRoute('Partner_index');
    }

    /**
     * Creates a form to delete a dreamlifePartnerPartner entity.
     *
     * @param DreamlifePartnerPartner $dreamlifePartnerPartner The dreamlifePartnerPartner entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DreamlifePartnerPartner $dreamlifePartnerPartner)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Partner_delete', array('uid' => $dreamlifePartnerPartner->getUid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

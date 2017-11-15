<?php

namespace DL\GlobalBundle\Controller;

use DL\GlobalBundle\Entity\CoreCustomerAddress;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Corecustomeraddress controller.
 *
 */
class CoreCustomerAddressController extends Controller
{
    /**
     * Lists all coreCustomerAddress entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $coreCustomerAddresses = $em->getRepository('DLGlobalBundle:CoreCustomerAddress')->findAll();

        return $this->render('corecustomeraddress/index.html.twig', array(
            'coreCustomerAddresses' => $coreCustomerAddresses,
        ));
    }

    /**
     * Creates a new coreCustomerAddress entity.
     *
     */
    public function newAction(Request $request)
    {
        $coreCustomerAddress = new CoreCustomerAddress();

        $form = $this->createForm('DL\GlobalBundle\Form\CoreCustomerAddressType', $coreCustomerAddress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($coreCustomerAddress);
            $em->flush();

            return $this->redirectToRoute('fos_user_registration_register', array('addressId' => $coreCustomerAddress->getUid()));
        }

        return $this->render('corecustomeraddress/new.html.twig', array(
            'coreCustomerAddress' => $coreCustomerAddress,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a coreCustomerAddress entity.
     *
     */
    public function showAction(CoreCustomerAddress $coreCustomerAddress)
    {
        $deleteForm = $this->createDeleteForm($coreCustomerAddress);

        return $this->render('corecustomeraddress/show.html.twig', array(
            'coreCustomerAddress' => $coreCustomerAddress,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing coreCustomerAddress entity.
     *
     */
    public function editAction(Request $request, CoreCustomerAddress $coreCustomerAddress)
    {
        $deleteForm = $this->createDeleteForm($coreCustomerAddress);
        $editForm = $this->createForm('DL\GlobalBundle\Form\CoreCustomerAddressType', $coreCustomerAddress);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('address_edit', array('uid' => $coreCustomerAddress->getUid()));
        }

        return $this->render('corecustomeraddress/edit.html.twig', array(
            'coreCustomerAddress' => $coreCustomerAddress,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a coreCustomerAddress entity.
     *
     */
    public function deleteAction(Request $request, CoreCustomerAddress $coreCustomerAddress)
    {
        $form = $this->createDeleteForm($coreCustomerAddress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($coreCustomerAddress);
            $em->flush();
        }

        return $this->redirectToRoute('address_index');
    }

    /**
     * Creates a form to delete a coreCustomerAddress entity.
     *
     * @param CoreCustomerAddress $coreCustomerAddress The coreCustomerAddress entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CoreCustomerAddress $coreCustomerAddress)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('address_delete', array('uid' => $coreCustomerAddress->getUid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

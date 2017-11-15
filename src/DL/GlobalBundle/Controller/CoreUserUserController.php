<?php

namespace DL\GlobalBundle\Controller;

use DL\GlobalBundle\Entity\CoreCustomerAddress;
use DL\GlobalBundle\Entity\CoreUserUser;
use DL\GlobalBundle\Entity\DreamlifePartnerConfig;
use DL\GlobalBundle\Entity\DreamlifePartnerProduct;
use DL\GlobalBundle\Form\AdresseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Coreuseruser controller.
 *
 */
class CoreUserUserController extends Controller
{
    /**
     * Lists all coreUserUser entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $coreUserUsers = $em->getRepository('DLGlobalBundle:CoreUserUser')->findBy(array(), array('lastName' => 'asc'));

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $coreUserUsers,
            $request->query->get('page', 1)/*page number*/,
            100/*limit per page*/
        );

        return $this->render('coreuseruser/index.html.twig', array(
            'pagination' => $pagination,
        ));
    }

    /**
     * Creates a new coreUserUser entity.
     *
     */
    public function newAction(Request $request)
    {



        $coreUserUser = new Coreuseruser();
        $form = $this->createForm('DL\GlobalBundle\Form\CoreUserUserType', $coreUserUser)
        ;
        $form->handleRequest($request);
        

        /*$adresse = new CoreCustomerAddress();
        $form1 = $this->createForm(AdresseType::class, $adresse);
        $form1->handleRequest($request);*/



        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($coreUserUser);
            $em->flush();
            return $this->redirectToRoute('user_show', array('id' => $coreUserUser->getId()));
        }



        return $this->render('coreuseruser/new.html.twig', array(
//            array(
            'coreUserUser' => $coreUserUser,
            'form' => $form->createView(),
        /*), array(
            'adresse' => $adresse,
            'form1' => $form1->createView(),*/

        ));
    }

    /**
     * Finds and displays a coreUserUser entity.
     *
     */
    public function showAction(CoreUserUser $coreUserUser)
    {
        $deleteForm = $this->createDeleteForm($coreUserUser);

        return $this->render('coreuseruser/show.html.twig', array(
            'coreUserUser' => $coreUserUser,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing coreUserUser entity.
     *
     */
    public function editAction(Request $request, CoreUserUser $coreUserUser)
    {
        $deleteForm = $this->createDeleteForm($coreUserUser);
        $editForm = $this->createForm('DL\GlobalBundle\Form\CoreUserUserType', $coreUserUser);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_edit', array('id' => $coreUserUser->getId()));
        }

        return $this->render('coreuseruser/edit.html.twig', array(
            'coreUserUser' => $coreUserUser,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a coreUserUser entity.
     *
     */
    public function deleteAction(Request $request, CoreUserUser $coreUserUser)
    {
        $form = $this->createDeleteForm($coreUserUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($coreUserUser);
            $em->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * Creates a form to delete a coreUserUser entity.
     *
     * @param CoreUserUser $coreUserUser The coreUserUser entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CoreUserUser $coreUserUser)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $coreUserUser->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }




}

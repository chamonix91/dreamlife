<?php

namespace DL\GlobalBundle\Controller;

use DL\GlobalBundle\Entity\CoreUserUser;
use DL\GlobalBundle\Entity\DreamlifePartnerSale;
use DL\GlobalBundle\Form\CommanderType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class UtilisateurController extends Controller
{
    public function indexAction()
    {
        return $this->render('DLGlobalBundle:UserInterface:Accueil.html.twig', array());
    }

    public function allproductsAction()
    {
        return $this->render('@DLGlobal/FrontEnd/listeproduit.html.twig', array());
    }

    public function eventsAction()
    {
        return $this->render('@DLGlobal/FrontEnd/event.html.twig', array());
    }

    public function homeAction()
    {
        return $this->render('@DLGlobal/FrontEnd/index.html.twig', array());
    }

    public function validationCompteAction(Request $request)
    {

        $coreuseruser = new CoreUserUser();
        $form = $this->createForm('DL\GlobalBundle\Form\ConfirmationType', $coreuseruser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($coreuseruser);
            $em->flush();

            return $this->redirectToRoute('home', array());
        }

        return $this->render('@DLGlobal/FrontEnd/confirmationinscri.html.twig', array('coreuseruser' => $coreuseruser,
            'form' => $form->createView(),));
    }


    public function commanderProduit1Action(Request $request) {





        return $this->render('@DLGlobal/FrontEnd/commandeP1.html.twig', array());
    }

    public function ValidationProduit1Action(Request $request) {


        $id= $this->getUser();


        $em = $this->getDoctrine()->getEntityManager();
        $commander = new DreamlifePartnerSale();
        $sales = $em->getRepository('DLGlobalBundle:CoreUserUser')->findOneBy(array('id' => $id));
        //$sales->setId($sales->getId() - 1);
        $form = $this->createForm(CommanderType::class, $commander);



        //$commander->setPartnerUid($sales);

        $commander->setPartnerUid($sales->getid() - 1);
        $commander->setAmount(350.5);
        $em->persist($commander);
        $ax=2;
        $em->flush();



        return $this->render('@DLGlobal/FrontEnd/ValidationCommande1.html.twig', array(
            'form' => $form->createView(),
            'commande' => $sales));
    }

    public function commanderProduit2Action(Request $request) {





        return $this->render('@DLGlobal/FrontEnd/commande2.html.twig', array());
    }
    public function validationProduit2Action(Request $request) {


        $id= $this->getUser();

        $em = $this->getDoctrine()->getEntityManager();
        $commander = new DreamlifePartnerSale();
        $sales = $em->getRepository('DLGlobalBundle:CoreUserUser')->findOneBy(array('id' => $id ));
        $sales->setId($sales->getId());
        $form = $this->createForm(CommanderType::class, $commander);



        //$commander->setPartnerUid($sales);

        $commander->setPartnerUid($sales->getid()-1);
        $commander->setAmount(1100.5);
        $em->persist($commander);
        $em->flush();

        return $this->render('@DLGlobal/FrontEnd/ValidationCommande2.html.twig', array(
            'form' => $form->createView(),
            'commande' => $sales));
    }
}

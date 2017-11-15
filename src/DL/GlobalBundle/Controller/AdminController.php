<?php

namespace DL\GlobalBundle\Controller;

use DL\GlobalBundle\DLGlobalBundle;
use DL\GlobalBundle\Entity\CoreUserUser;
use DL\GlobalBundle\Form\RechCommission;
use DL\GlobalBundle\Form\RechReservation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DL\GlobalBundle\Entity\DreamlifePartnerPartner;
use DL\GlobalBundle\Form\DreamlifePartnerPartnerType;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function homeAction()
    {
        return $this->render('@DLGlobal/Backend/index.html.twig', array());
    }


    /*Public function newPartnerAction(){


        $em = $this->getDoctrine()->getManager();

        $active = 0;
        $actives = $em->getRepository('DLGlobalBundle:CoreUserUser')->findBy(array('active'=> $active));



        return $this->render('@DLGlobal/Backend/newPartner.html.twig', array(
            'actives' => $actives,
        ));


    }*/

    Public function inactivePartnerAction(){


        $em = $this->getDoctrine()->getManager();

        $active = 0;
        $actives = $em->getRepository('DLGlobalBundle:CoreUserUser')->findBy(array('active'=> $active));



        return $this->render('@DLGlobal/Backend/listecommandes.html.twig', array(
            'actives' => $actives,

        ));




           /* $em = $this->getDoctrine()->getEntityManager();
            $user = $this->getUser();
            $commandes = $em->getRepository('DLGlobalBundle:CoreUserUser')->findAll();
            var_dump($user->getId());
            return $this->render('@DLGlobal/Backend/listecommandes.html.twig',
                array('commandes' => $commandes));*/

    }
    /**
     * @Route("admin/activerPartner/{ids}", name="neud_one")
     *
     */
    Public function activerPartnerAction( Request $request){

        $em = $this->getDoctrine()->getEntityManager();
        $id=$request->get('ids');
        $ide= (Integer)$id;

        $sales = $em->getRepository('DLGlobalBundle:CoreUserUser')->find($ide);
       // var_dump($sales->getTreeParentId());die;
        $recur =$em->getRepository('DLGlobalBundle:CoreUserUser')->findOneByemail($sales->getTreeParentId());
        //var_dump($recur->getId());die;
        $x=$this->testnbrhield($recur->getId()-1);
        $sales->setActive(true);
        $partner = new DreamlifePartnerPartner();
        $partner->setEnrollerId($sales->getRecruiterId()-1);
        $partner->setTreeParentId($recur->getId()-1);
        $partner->setUserUid($sales);

        if($x==2){
            //redirect error page
        }elseif ($x==1){
            //issob partner right
            $partner->setTreePosition("dreamlife_partner.tree_position.right");
        }else{
            //issob partner left
            $partner->setTreePosition("dreamlife_partner.tree_position.left");
        }
        $em->persist($partner);
        $em->flush();
        $em->merge($sales);
        return $this->render('@DLGlobal/Backend/activerpartner.html.twig',array(''));

    }
    public  function testnbrhield($i){
        $neud = $this->get('doctrine.orm.entity_manager')
            ->getRepository('DLGlobalBundle:DreamlifePartnerPartner')
            ->FindCount($i);
        return $neud;
    }
    public  function testamount($i){
        $neud = $this->get('doctrine.orm.entity_manager')
            ->getRepository('DLGlobalBundle:DreamlifePartnerSale')
            ->Findexiste($i);
        return $neud;
    }
    /**
     * @Route("admin/showcommande/{ids}", name="neud_one")
     *
     */
    Public function showcommandeAction( Request $request){

        $em = $this->getDoctrine()->getEntityManager();
        $id=$request->get('ids');
        $ide= (Integer)$id;


         $sales = $em->getRepository('DLGlobalBundle:DreamlifePartnerSale')->findOneBypartnerUid($ide-1);
        $usercom =$em->getRepository('DLGlobalBundle:CoreUserUser')->find($ide);
        // $sales = $em->getRepository('DLGlobalBundle:CoreUserUser')->find($ide);
       // $sales = $em->getRepository('DLGlobalBundle:CoreUserUser')->findAll();


        $x=$this->testamount($ide-1);
        if($x>0) {
            return $this->render('@DLGlobal/Backend/showcomande.html.twig', array('sale' => $sales, 'usercom' =>$usercom));
        }
        else{
            return $this->render('@DLGlobal/Backend/error.html.twig', array('sale' => $sales));
        }

    }






}

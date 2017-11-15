<?php

namespace DL\GlobalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class EarnController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
    public function EarnedUserAction(Request $request)
    {
        $neuds = $this->get('doctrine.orm.entity_manager')
            ->getRepository('DLGlobalBundle:CoreUserUser')
           // ->findAll();
           ->findBy(array(), array('lastName' => 'asc'));
        $earned= array();

        foreach ($neuds as $neut) {
            $neud = $this->get('doctrine.orm.entity_manager')
                ->getRepository('DLGlobalBundle:DreamlifePartnerPartner')
                ->findBytreeParentId($neut->getId()-1);
            $x=0;
            foreach ($neud as $neus) {
                $x++;
            }
            if($x==2){
                array_push($earned,$neut);
            }
        }
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $earned,
            $request->query->get('page', 1)/*page number*/,
            50/*limit per page*/
        );

       // var_dump($pagination);die();

        return $this->render('@DLGlobal/Backend/earnedpartner.html.twig', array('pagination' => $pagination));
    }
}

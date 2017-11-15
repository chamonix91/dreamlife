<?php

namespace DL\GlobalBundle\Controller;

use DL\GlobalBundle\Entity\CoreCustomerAddress;
use DL\GlobalBundle\Entity\CoreUserUser;
use DL\GlobalBundle\Form\InscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DLGlobalBundle:Default:index.html.twig');
    }


}

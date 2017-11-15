<?php

namespace DL\GlobalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProduitController extends Controller
{
    public function produit1Action()
    {
        return $this->render('@DLGlobal/FrontEnd/produit1.html.twig', array());
    }

    public function produit2Action()
    {
        return $this->render('@DLGlobal/FrontEnd/produit2.html.twig', array());
    }
}

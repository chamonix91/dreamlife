<?php

namespace DL\GlobalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TreeController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
    //prerequi
    public function getmychield($i)
    {

        $neuds = $this->get('doctrine.orm.entity_manager')
            ->getRepository('DLGlobalBundle:DreamlifePartnerPartner')
            ->findBytreeParentId($i);
        return $neuds;
    }
    public function getnature($i)
    {

        $neuds = $this->get('doctrine.orm.entity_manager')
            ->getRepository('DLGlobalBundle:DreamlifePartnerPartner')
            ->findBytreeParentId($i);
        $x=0;
        foreach ($neuds as $neut) {
            $x++;
        }
        return $x;
    }
    public function getmyinfo($i)
    {

        $neud = $this->get('doctrine.orm.entity_manager')
            ->getRepository('DLGlobalBundle:CoreUserUser')
            ->findOneById($i);
        return($neud);
    }
    public function getsaledate($i)
    {

        $neud = $this->get('doctrine.orm.entity_manager')
            ->getRepository('DLGlobalBundle:DreamlifePartnerSale')
            ->findOneBypartnerUid($i);
        return($neud->getPaidDate());
    }
    public function verifsale($i)
    {

        $neud = $this->get('doctrine.orm.entity_manager')
            ->getRepository('DLGlobalBundle:DreamlifePartnerSale')
            ->Findexiste($i);//chamsi;
        return($neud);
    }
    public function getsale($i)
    {

        $neud = $this->get('doctrine.orm.entity_manager')
            ->getRepository('DLGlobalBundle:DreamlifePartnerSale')
            ->findOneBypartnerUid($i);
        return($neud);
    }
    //finprerequi
    /**
     * @Route("/tree/{neud_id}", name="neud_one")
     * @Method({"GET"})
     */
    public function getTreeByIdAction(Request $request)
    {
        $neud = $this->get('doctrine.orm.entity_manager')
            ->getRepository('DLGlobalBundle:CoreUserUser')
            ->find($request->get('neud_id'));
        //$this->getnature($neud->getUid()-1)
        /* @var $place Place */

        if($this->getnature($neud->getId()-1)==2) {
            if ($this->getmychield($neud->getId()-1 )[0]->getTreePosition()=="dreamlife_partner.tree_position.left") {
                $formatted = [
                    'name' => $neud->getId(),
                    'title' => $neud->getLastName() . ' ' . $neud->getFirstName(),
                    'children' => [['name' => $this->getmychield($neud->getId()-1)[0]->getUserUid(),
                        'title' => $this->getmyinfo($this->getmychield($neud->getId() - 1)[0]->getUserUid())->getFirstName() . ' ' . $this->getmyinfo($this->getmychield($neud->getId() - 1)[0]->getUserUid())->getLastName(),],
                        ['name' => $this->getmychield($neud->getId() - 1)[1]->getUserUid(),
                            'title' => $this->getmyinfo($this->getmychield($neud->getId() - 1)[1]->getUserUid())->getFirstName() . ' ' . $this->getmyinfo($this->getmychield($neud->getId() - 1)[1]->getUserUid())->getLastName(),
                        ]],
                ];
            }
            else{
                $formatted = [
                    'name' => $neud->getId(),
                    'title' => $neud->getLastName() . ' ' . $neud->getFirstName(),
                    'children' => [['name' => $this->getmychield($neud->getId() - 1)[1]->getUserUid(),
                        'title' => $this->getmyinfo($this->getmychield($neud->getId() - 1)[1]->getUserUid()->getId())->getFirstName() . ' ' . $this->getmyinfo($this->getmychield($neud->getId() - 1)[0]->getUserUid()->getId())->getLastName(),],
                        ['name' => $this->getmychield($neud->getId() - 1)[0]->getUserUid()->getUId(),
                            'title' => $this->getmyinfo($this->getmychield($neud->getId() - 1)[0]->getUserUid()->getId())->getFirstName() . ' ' . $this->getmyinfo($this->getmychield($neud->getId() - 1)[1]->getUserUid()->getId())->getLastName(),
                        ]],
                ];

            }
        }
        elseif ($this->getnature($neud->getId()-1)==1)
        {
            $formatted = [
                'name' => $neud->getId(),
                'title' => $neud->getLastName().' '. $neud->getFirstName(),
                'children' =>[ ['name' =>$this->getmychield($neud->getId()-1 )[0]->getUserUid(),
                    'title' => $this->getmyinfo($this->getmychield($neud->getId()-1 )[0]->getUserUid())->getFirstName().' '.$this->getmyinfo($this->getmychield($neud->getId()-1 )[0]->getUserUid())->getLastName(),],
                ],
            ];

        }else{
            $formatted = [
                'name' => $neud->getId(),
                'title' => $neud->getLastName().' '. $neud->getFirstName(),

            ];

        }

        return new JsonResponse($formatted);
    }
    public function TreebyidAction()
    {
        $number = mt_rand(0, 100);
        //$this->getNeudsAction();
        return $this->render('DLGlobalBundle:Backend:treepartner.html.twig', array(
            'number' => $number,
        ));
    }
    ///bel session
    /**
     * @Route("/my/{neud_id}", name="neud_one")
     * @Method({"GET"})
     */
    public function getMyTreeAction(Request $request)
    {
        $neud = $this->get('doctrine.orm.entity_manager')
            ->getRepository('DLGlobalBundle:CoreUserUser')
            ->find($request->get('neud_id'));
        //$this->getnature($neud->getUid()-1)
        /* @var $place Place */

        if($this->getnature($neud->getId()-1)==2) {
            if ($this->getmychield($neud->getId()-1 )[0]->getTreePosition()=="dreamlife_partner.tree_position.left") {
                $formatted = [
                    'name' => $neud->getId(),
                    'title' => $neud->getLastName() . ' ' . $neud->getFirstName(),
                    'children' => [['name' => $this->getmychield($neud->getId()-1)[0]->getUserUid(),
                        'title' => $this->getmyinfo($this->getmychield($neud->getId() - 1)[0]->getUserUid())->getFirstName() . ' ' . $this->getmyinfo($this->getmychield($neud->getId() - 1)[0]->getUserUid())->getLastName(),],
                        ['name' => $this->getmychield($neud->getId() - 1)[1]->getUserUid(),
                            'title' => $this->getmyinfo($this->getmychield($neud->getId() - 1)[1]->getUserUid())->getFirstName() . ' ' . $this->getmyinfo($this->getmychield($neud->getId() - 1)[1]->getUserUid())->getLastName(),
                        ]],
                ];
            }
            else{
                $formatted = [
                    'name' => $neud->getId(),
                    'title' => $neud->getLastName() . ' ' . $neud->getFirstName(),
                    'children' => [['name' => $this->getmychield($neud->getId() - 1)[1]->getUserUid(),
                        'title' => $this->getmyinfo($this->getmychield($neud->getId() - 1)[1]->getUserUid()->getId())->getFirstName() . ' ' . $this->getmyinfo($this->getmychield($neud->getId() - 1)[0]->getUserUid()->getId())->getLastName(),],
                        ['name' => $this->getmychield($neud->getId() - 1)[0]->getUserUid()->getUId(),
                            'title' => $this->getmyinfo($this->getmychield($neud->getId() - 1)[0]->getUserUid()->getId())->getFirstName() . ' ' . $this->getmyinfo($this->getmychield($neud->getId() - 1)[1]->getUserUid()->getId())->getLastName(),
                        ]],
                ];

            }
        }
        elseif ($this->getnature($neud->getId()-1)==1)
        {
            $formatted = [
                'name' => $neud->getId(),
                'title' => $neud->getLastName().' '. $neud->getFirstName(),
                'children' =>[ ['name' =>$this->getmychield($neud->getId()-1 )[0]->getUserUid(),
                    'title' => $this->getmyinfo($this->getmychield($neud->getId()-1 )[0]->getUserUid())->getFirstName().' '.$this->getmyinfo($this->getmychield($neud->getId()-1 )[0]->getUserUid())->getLastName(),],
                ],
            ];

        }else{
            $formatted = [
                'name' => $neud->getId(),
                'title' => $neud->getLastName().' '. $neud->getFirstName(),

            ];

        }

        return new JsonResponse($formatted);
    }
    public function TreemyAction()
    {
        $number = mt_rand(0, 100);
        //$this->getNeudsAction();
        return $this->render('DLGlobalBundle:FrontEnd:treemy.html.twig', array(
            'number' => $number,
        ));
    }
    //bel session
    /***earning****/
    /**
     * @Route("/earning/{neud_id}", name="neud_one")
     * @Method({"GET"})
     */
    public function getearnAction(Request $request)
    {
        $neud = $this->get('doctrine.orm.entity_manager')
            ->getRepository('DLGlobalBundle:CoreUserUser')
            ->find($request->get('neud_id'));
        //array_push($t, $neut);
        $lchield = array();
        $rchield = array();
        $naturel = array();
        $naturer = array();
        $levelpl = array();
        $levelpr = array();
        array_push($lchield, $this->getmyinfo($this->getmychield($neud->getId() - 1)[0]->getUserUid()));
        array_push($rchield, $this->getmyinfo($this->getmychield($neud->getId() - 1)[1]->getUserUid()));
        //  }

        $taille = 1;
        $a = 0;
        for ($c = 0; $c < $taille; $c++) {
            array_push($naturel, $this->getnature($lchield[$c]->getId() - 1));
            $a++;
            if ($this->getnature($lchield[$c]->getId() - 1) == 2) {
                array_push($lchield, $this->getmyinfo($this->getmychield($lchield[$c]->getId() - 1)[0]->getUserUid()));
                array_push($lchield, $this->getmyinfo($this->getmychield($lchield[$c]->getId() - 1)[1]->getUserUid()));
                $taille = $taille + 2;
            } elseif ($this->getnature($lchield[$c]->getId() - 1) == 1) {
                array_push($lchield, $this->getmyinfo($this->getmychield($lchield[$c]->getId() - 1)[0]->getUserUid()));
                $taille++;
            }

        }
        $tailler = 1;
        $ar = 0;
        for ($c = 0; $c < $tailler; $c++) {
            array_push($naturer, $this->getnature($rchield[$c]->getId() - 1));
            $ar++;
            if ($this->getnature($rchield[$c]->getId() - 1) == 2) {
                array_push($rchield, $this->getmyinfo($this->getmychield($rchield[$c]->getId() - 1)[0]->getUserUid()));
                array_push($rchield, $this->getmyinfo($this->getmychield($rchield[$c]->getId() - 1)[1]->getUserUid()));
                $tailler = $tailler + 2;
            } elseif ($this->getnature($rchield[$c]->getId() - 1) == 1) {
                array_push($rchield, $this->getmyinfo($this->getmychield($rchield[$c]->getId() - 1)[0]->getUserUid()));
                $tailler++;
            }

        }
        array_push($levelpl, 1);
        $nbtour = $naturel[0];
        $dep = 1;
        $lvl = 2;
        while ($nbtour > 0) {
            $x = $nbtour;
            $nbtour = 0;
            for ($c = $dep; $c < $dep + $x; $c++) {
                $nbtour = $nbtour + $naturel[$c];
                $levelpl[$c] = $lvl;


            }
            $dep = $dep + $x;
            $lvl++;
        }
        /***right**/
        array_push($levelpr, 1);
        $nbtour = $naturer[0];
        $dep = 1;
        $lvl = 2;
        while ($nbtour > 0) {
            $x = $nbtour;
            $nbtour = 0;
            for ($c = $dep; $c < $dep + $x; $c++) {
                $nbtour = $nbtour + $naturer[$c];
                $levelpr[$c] = $lvl;


            }
            $dep = $dep + $x;
            $lvl++;
        }
        /****creditation partner***/
        $lcp = array();
        $lci = 0;
        foreach ($naturel as $k) {
            if ($k == 2 && $this->verifsale($this->getmychield($lchield[$lci]->getId() - 1)[0]->getUserUid() - 1) > 0 &&
                $this->verifsale($this->getmychield($lchield[$lci]->getId() - 1)[1]->getUserUid() - 1) > 0) {
                if ($this->getsale($this->getmychield($lchield[$lci]->getId() - 1)[0]->getUserUid() - 1)->getPaidDate() <
                    $this->getsale($this->getmychield($lchield[$lci]->getId() - 1)[1]->getUserUid() - 1)->getPaidDate()) {
                    $lcp[] = [
                        'partner' => $lchield[$lci]->getId(),
                        'level' => $levelpl[$lci],
                        'takwin' => $this->getsale($this->getmychield($lchield[$lci]->getId() - 1)[1]->getUserUid() - 1)->getPaidDate()
                    ];
                } else {
                    $lcp[] = [
                        'partner' => $lchield[$lci]->getId(),
                        'level' => $levelpl[$lci],
                        'takwin' => $this->getsale($this->getmychield($lchield[$lci]->getId() - 1)[0]->getUserUid() - 1)->getPaidDate()
                    ];
                }
            }
            $lci++;
        }
        $rcp = array();
        $rci = 0;
        foreach ($naturer as $k) {
            if ($k == 2 && $this->verifsale($this->getmychield($rchield[$rci]->getId() - 1)[0]->getUserUid() - 1) > 0 &&
                $this->verifsale($this->getmychield($rchield[$rci]->getId() - 1)[1]->getUserUid() - 1) > 0) {
                if ($this->getsale($this->getmychield($rchield[$rci]->getId() - 1)[0]->getUserUid() - 1)->getPaidDate() <
                    $this->getsale($this->getmychield($rchield[$rci]->getId() - 1)[1]->getUserUid() - 1)->getPaidDate()) {
                    $rcp[] = [
                        'partner' => $rchield[$rci]->getId(),
                        //'title' => $neut->getParentId(),
                        'level' => $levelpr[$rci],
                        'takwin' => $this->getsale($this->getmychield($rchield[$rci]->getId() - 1)[1]->getUserUid() - 1)->getPaidDate(),
                        'exec' => 0];

                } else {
                    $rcp[] = [
                        'partner' => $rchield[$rci]->getId(),
                        //'title' => $neut->getParentId(),
                        'level' => $levelpr[$rci],
                        'takwin' => $this->getsale($this->getmychield($rchield[$rci]->getId() - 1)[0]->getUserUid() - 1)->getPaidDate(),
                        'exec' => 0];

                }
            }
            $rci++;
        }
        function build_sorter($key)
        {
            return function ($a, $b) use ($key) {
                return ($a[$key] > $b[$key]);
            };
        }

        usort($lcp, build_sorter('takwin'));
        usort($rcp, build_sorter('takwin'));
        /****max level ****/
        $tailletabl = 0;
        foreach ($lcp as $k) {
            $tailletabl++;

        }
        $tailletabr = 0;
        foreach ($rcp as $k) {
            $tailletabr++;


        }

        $startMonth = new \DateTime('2017' . '-' . '03' . '-31 23:59:59');//date end old pay plan
        if (($this->getsale($this->getmychield($neud->getId() - 1)[0]->getUserUid() - 1)->getPaidDate() < $startMonth) &&
            ($this->getsale($this->getmychield($neud->getId() - 1)[0]->getUserUid() - 1)->getPaidDate() < $startMonth)) {

            $dcommision = ($this->getsale($this->getmychield($neud->getId() - 1)[0]->getUserUid() - 1)->getAmount() +
                    $this->getsale($this->getmychield($neud->getId() - 1)[1]->getUserUid() - 1)->getAmount()) * 0.14;
        } else {
            $dcommision = ($this->getsale($this->getmychield($neud->getId() - 1)[0]->getUserUid() - 1)->getAmount() +
                    $this->getsale($this->getmychield($neud->getId() - 1)[1]->getUserUid() - 1)->getAmount()) * 0.14;
        }
        $commision=0.0;
        $saber3 = array();
        if ($tailletabl < $tailletabr) {
            foreach ($lcp as $k) {
                foreach ($rcp as $l) {
                    $key = array_search($l['partner'], $saber3);
                    if ($k['level'] == $l['level'] && $key == 0) {
                        array_push($saber3, $l['partner']);
                        if (($this->getsale($this->getmychield($k['partner'] - 1)[0]->getUserUid() - 1)->getPaidDate() < $startMonth) && //deano
                            ($this->getsale($this->getmychield($k['partner'] - 1)[1]->getUserUid() - 1)->getPaidDate() < $startMonth) &&
                            ($this->getsale($this->getmychield($l['partner'] - 1)[0]->getUserUid() - 1)->getPaidDate() < $startMonth) &&
                            ($this->getsale($this->getmychield($l['partner'] - 1)[1]->getUserUid() - 1)->getPaidDate() < $startMonth)) {
                            //7esba 9dima
                            if ($k['level'] == 1) {
                                $commision = $commision + ($this->getsale($this->getmychield($k['partner'] - 1)[0]->getUserUid() - 1)->getAmount() + //deano
                                        $this->getsale($this->getmychield($k['partner'] - 1)[1]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[0]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[1]->getUserUid() - 1)->getAmount()) * 0.08;
                            } elseif ($k['level'] == 2) {
                                $commision = $commision + ($this->getsale($this->getmychield($k['partner'] - 1)[0]->getUserUid() - 1)->getAmount() + //deano
                                        $this->getsale($this->getmychield($k['partner'] - 1)[1]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[0]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[1]->getUserUid() - 1)->getAmount()) * 0.06;
                            } elseif ($k['level'] == 3) {
                                $commision = $commision + ($this->getsale($this->getmychield($k['partner'] - 1)[0]->getUserUid() - 1)->getAmount() + //deano
                                        $this->getsale($this->getmychield($k['partner'] - 1)[1]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[0]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[1]->getUserUid() - 1)->getAmount()) * 0.04;
                            } elseif ($k['level'] == 4) {
                                $commision = $commision + ($this->getsale($this->getmychield($k['partner'] - 1)[0]->getUserUid() - 1)->getAmount() + //deano
                                        $this->getsale($this->getmychield($k['partner'] - 1)[1]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[0]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[1]->getUserUid() - 1)->getAmount()) * 0.03;

                            } else {
                                $commision = $commision + ($this->getsale($this->getmychield($k['partner'] - 1)[0]->getUserUid() - 1)->getAmount() + //deano
                                        $this->getsale($this->getmychield($k['partner'] - 1)[1]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[0]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[1]->getUserUid() - 1)->getAmount()) * 0.02;
                            }
                            //7esba 9dima

                        } else {
                            //7esba jdida
                            if ($k['level'] == 1) {
                                $commision = $commision + ($this->getsale($this->getmychield($k['partner'] - 1)[0]->getUserUid() - 1)->getAmount() + //deano
                                        $this->getsale($this->getmychield($k['partner'] - 1)[1]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[0]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[1]->getUserUid() - 1)->getAmount()) * 0.08;
                            } elseif ($k['level'] == 2) {
                                $commision = $commision + ($this->getsale($this->getmychield($k['partner'] - 1)[0]->getUserUid() - 1)->getAmount() + //deano
                                        $this->getsale($this->getmychield($k['partner'] - 1)[1]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[0]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[1]->getUserUid() - 1)->getAmount()) * 0.06;
                            } else {
                                $commision = $commision + ($this->getsale($this->getmychield($k['partner'] - 1)[0]->getUserUid() - 1)->getAmount() + //deano
                                        $this->getsale($this->getmychield($k['partner'] - 1)[1]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[0]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[1]->getUserUid() - 1)->getAmount()) * 0.05;
                            }
                            //7esba jdida

                        }
                        break;
                    }
                }
            }
        }
        else{
            foreach ($rcp as $k) {
                foreach ($lcp as $l) {
                    $key = array_search($l['partner'], $saber3);
                    if ($k['level'] == $l['level'] && $key == 0) {
                        array_push($saber3, $l['partner']);
                        if (($this->getsale($this->getmychield($k['partner'] - 1)[0]->getUserUid() - 1)->getPaidDate() < $startMonth) && //deano
                            ($this->getsale($this->getmychield($k['partner'] - 1)[1]->getUserUid() - 1)->getPaidDate() < $startMonth) &&
                            ($this->getsale($this->getmychield($l['partner'] - 1)[0]->getUserUid() - 1)->getPaidDate() < $startMonth) &&
                            ($this->getsale($this->getmychield($l['partner'] - 1)[1]->getUserUid() - 1)->getPaidDate() < $startMonth)) {
                            //7esba 9dima
                            if ($k['level'] == 1) {
                                $commision = $commision + ($this->getsale($this->getmychield($k['partner'] - 1)[0]->getUserUid() - 1)->getAmount() + //deano
                                        $this->getsale($this->getmychield($k['partner'] - 1)[1]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[0]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[1]->getUserUid() - 1)->getAmount()) * 0.08;
                            } elseif ($k['level'] == 2) {
                                $commision = $commision + ($this->getsale($this->getmychield($k['partner'] - 1)[0]->getUserUid() - 1)->getAmount() + //deano
                                        $this->getsale($this->getmychield($k['partner'] - 1)[1]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[0]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[1]->getUserUid() - 1)->getAmount()) * 0.06;
                            } elseif ($k['level'] == 3) {
                                $commision = $commision + ($this->getsale($this->getmychield($k['partner'] - 1)[0]->getUserUid() - 1)->getAmount() + //deano
                                        $this->getsale($this->getmychield($k['partner'] - 1)[1]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[0]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[1]->getUserUid() - 1)->getAmount()) * 0.04;
                            } elseif ($k['level'] == 4) {
                                $commision = $commision + ($this->getsale($this->getmychield($k['partner'] - 1)[0]->getUserUid() - 1)->getAmount() + //deano
                                        $this->getsale($this->getmychield($k['partner'] - 1)[1]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[0]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[1]->getUserUid() - 1)->getAmount()) * 0.03;

                            } else {
                                $commision = $commision + ($this->getsale($this->getmychield($k['partner'] - 1)[0]->getUserUid() - 1)->getAmount() + //deano
                                        $this->getsale($this->getmychield($k['partner'] - 1)[1]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[0]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[1]->getUserUid() - 1)->getAmount()) * 0.02;
                            }
                            //7esba 9dima

                        } else {
                            //7esba jdida
                            if ($k['level'] == 1) {
                                $commision = $commision + ($this->getsale($this->getmychield($k['partner'] - 1)[0]->getUserUid() - 1)->getAmount() + //deano
                                        $this->getsale($this->getmychield($k['partner'] - 1)[1]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[0]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[1]->getUserUid() - 1)->getAmount()) * 0.08;
                            } elseif ($k['level'] == 2) {
                                $commision = $commision + ($this->getsale($this->getmychield($k['partner'] - 1)[0]->getUserUid() - 1)->getAmount() + //deano
                                        $this->getsale($this->getmychield($k['partner'] - 1)[1]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[0]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[1]->getUserUid() - 1)->getAmount()) * 0.06;
                            } else {
                                $commision = $commision + ($this->getsale($this->getmychield($k['partner'] - 1)[0]->getUserUid() - 1)->getAmount() + //deano
                                        $this->getsale($this->getmychield($k['partner'] - 1)[1]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[0]->getUserUid() - 1)->getAmount() +
                                        $this->getsale($this->getmychield($l['partner'] - 1)[1]->getUserUid() - 1)->getAmount()) * 0.05;
                            }
                            //7esba jdida

                        }
                        break;
                    }
                }
            }
        }
        $formatted = array();
        $formatted[]=[
            'dcommission' => $dcommision ,
            'icommission' => $commision ,
            'htcommission' => ($commision+$dcommision) ,
            'ttccommission' => ($commision+$dcommision)* 0.85 ,
        ];


        return new JsonResponse($formatted);
////////End
    }
}

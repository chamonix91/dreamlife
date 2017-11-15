<?php
/**
 * Created by PhpStorm.
 * User: chamseddin
 * Date: 29/10/2017
 * Time: 22:55
 */

namespace DL\GlobalBundle\Repository;
use Doctrine\ORM\EntityRepository;


class SaleRepository extends EntityRepository
{

    public function findAllusers()
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('a')
            ->from('GlobalBundle:CoreUserUser', 'a');
        $query = $qb->getQuery();
        return $query->getResult();
    }


    public function getCommandes($user) {

        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('r')
            ->from('GlobalBundle:CoreUserUser', 'r')
            ->join('r.partnerUid', 'u', 'WITH', 'u.id =:user')

            ->setParameter('id', $user);
        $query = $qb->getQuery();
        $reservation = $query->getResult();
        return $reservation;
    }
    public function Findexiste($i)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('count(sale.uid)');
        $qb->from('DLGlobalBundle:DreamlifePartnerSale','sale');
        $qb->where('sale.partnerUid = :name');
        $qb->setParameter('name', $i);
        $count = $qb->getQuery()->getSingleScalarResult();
        return $count;
    }




}
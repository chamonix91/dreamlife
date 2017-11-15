<?php

namespace DL\GlobalBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PartnerRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Product p ORDER BY p.name ASC'
            )
            ->getResult();
    }
    public function FindCount($i)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('count(partner.uid)');
        $qb->from('DLGlobalBundle:DreamlifePartnerPartner','partner');
        $qb->where('partner.treeParentId = :name');
        $qb->setParameter('name', $i);
        $count = $qb->getQuery()->getSingleScalarResult();
        return $count;
    }

    /*public function findAllByPlaced()
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('a')
            ->from('GlobalBundle:DreamlifePartnerPartner', 'a')
            ->where('isPlaced'== 0);
        $query = $qb->getQuery();
        return $query->getResult();
    }*/

}
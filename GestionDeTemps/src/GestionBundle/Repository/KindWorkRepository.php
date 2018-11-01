<?php

namespace GestionBundle\Repository;

/**
 * KindWorkRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class KindWorkRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByAlphabeticOrder()
    {
        $qb = $this->createQueryBuilder('k')
            ->orderBy('k.titleKindWork', 'ASC')
            ->where('k.infoActiveKindWork = true');
        return $qb;
    }
}
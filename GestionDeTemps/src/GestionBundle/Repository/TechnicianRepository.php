<?php

namespace GestionBundle\Repository;

/**
 * TechnicianRepository
 *
 */
class TechnicianRepository extends \Doctrine\ORM\EntityRepository {

    /**
     * Function to return lastnames of technicians in alphabetical order
     * Fonction pour retourner les noms des techniciens en ordre alphabétique
     */
    public function findByAlphabeticOrder() {
        $qb = $this->createQueryBuilder('t')
                ->orderBy('t.lastName', 'ASC')
                ->addOrderBy('t.firstName', 'ASC')
                ->where('t.infoActiveTechnician = true');
        return $qb;
    }

}

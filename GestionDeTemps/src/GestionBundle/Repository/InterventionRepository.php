<?php

namespace GestionBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * InterventionRepository
 *
 * 
 */
class InterventionRepository extends EntityRepository {

    public function findAll() {
        $qb = $this
                ->createQueryBuilder('i')
        ;

        return $qb->getQuery()->execute();
    }

    public function summaryArray() {
        $qb = $this->createQueryBuilder('i')
                ->select('i.id, YEAR(i.interventionDate) AS year, i.interventionDate , i.weekNumber, t.lastName AS lastName, t.firstName AS firstName, '
                        . 't.trades AS trades, ti.titleTypeIntervention AS titleTypeIntervention, k.titleKindWork AS titleKindWork, '
                        . 'g.titleGroup AS titleGroup, p.titlePlace AS titlePlace, i.numberHours, l.kindLaborCost AS kindLaborCost, '
                        . 'l.laborCost AS laborCostHour, i.totalMaterialCost, ROUND((l.laborCost*i.numberHours),4) AS totalLaborCost, '
                        . 'i.comments')
                ->innerJoin('i.kindWork', 'k')
                ->innerJoin('k.laborCost', 'l')
                ->innerJoin('i.typeIntervention', 'ti')
                ->innerJoin('i.technician', 't')
                ->innerJoin('i.places', 'p')
                ->innerJoin('p.groupsPlaces', 'g')
                ->groupBy('i.id')
                ->orderBy('i.interventionDate', 'DESC');
        return $qb->getQuery()->execute();
    }

    /**
     * Function with Query Builder for the table "weekTechnician"
     * YEAR is function of "beberlei/DoctrineExtensions"
     * Fonction avec QueryBuilder pour le tableau "weekTechnician"
     * YEAR est une fonction de "beberlei/DoctrineExtensions"
     */
    public function weekTechnicianArray() {
        $qb = $this->createQueryBuilder('i')
                ->select('SUBSTRING(i.interventionDate, 1, 4) AS year, t.id, '
                        . 'i.weekNumber, t.lastName, t.firstName, '
                        . 'SUM(i.numberHours) AS totalNumberHours')
                ->innerJoin('i.technician', 't')
                ->groupBy('t.id')
                ->addGroupBy('year')
                ->orderBy('i.weekNumber', 'ASC')
                ->addOrderBy('t.lastName', 'ASC')
                ->addOrderBy('year', 'DESC');
        return $qb->getQuery()->execute();
    }
    
    /**
     * Function with Query Builder for the table "placeKindWorkWeek"
     * YEAR and ROUND are functions of "beberlei/DoctrineExtensions"
     * Fonction avec QueryBuilder pour le tableau "placeKindWorkWeek"
     * YEAR et ROUND sont des fonctions de "beberlei/DoctrineExtensions"
     */
    public function placeKindWorkWeekArray() {
        $qb = $this->createQueryBuilder('i')
                ->select('YEAR(i.interventionDate) AS year, p.titlePlace, i.weekNumber, SUM(i.numberHours) AS totalNumberHours, '
                        . 'SUM(i.totalMaterialCost) AS totalMaterialCost, ROUND(SUM(l.laborCost*i.numberHours), 4) AS totalLaborCost, '
                        . 'ti.titleTypeIntervention, k.titleKindWork')
                ->innerJoin('i.kindWork', 'k')
                ->innerJoin('k.laborCost', 'l')
                ->innerJoin('i.places', 'p')
                ->innerJoin('i.typeIntervention', 'ti')
                ->groupBy('k.titleKindWork')
                ->addGroupBy('p.titlePlace')
                ->orderBy('year', 'DESC')
                ->addOrderBy('p.titlePlace', 'ASC')
                ->addOrderBy('i.weekNumber', 'ASC');
        return $qb->getQuery()->execute();
    }

    /**
     * Function with Query Builder for the table "groupTypeInter"
     * YEAR and ROUND are functions of "beberlei/DoctrineExtensions"
     * Fonction avec QueryBuilder pour le tableau "groupTypeInter"
     * YEAR et ROUND sont des fonctions de "beberlei/DoctrineExtensions"
     */
    public function groupTypeInterArray() {
        $qb = $this->createQueryBuilder('i')
                ->select('YEAR(i.interventionDate) AS year, g.titleGroup, SUM(i.numberHours) AS totalNumberHours, '
                        . 'SUM(i.totalMaterialCost) AS totalMaterialCost, ROUND(SUM(l.laborCost*i.numberHours), 4) '
                        . 'AS totalLaborCost, ti.titleTypeIntervention, k.titleKindWork')
                ->innerJoin('i.kindWork', 'k')
                ->innerJoin('k.laborCost', 'l')
                ->innerJoin('i.places', 'p')
                ->innerJoin('p.groupsPlaces', 'g')
                ->innerJoin('i.typeIntervention', 'ti')
                ->groupBy('k.titleKindWork')
                ->addGroupBy('g.titleGroup')
                ->addGroupBy('year')
                ->orderBy('year', 'DESC')
                ->addOrderBy('p.titlePlace', 'ASC')
                ->addOrderBy('i.weekNumber', 'ASC');
        return $qb->getQuery()->execute();
    }

    public function kindWorkTechnicianArray() {
        $qb = $this->createQueryBuilder('i')
                ->select('YEAR(i.interventionDate) AS year, SUM(i.numberHours) AS totalNumberHours, '
                        . ' t.lastName, t.firstName, k.titleKindWork')
                ->innerJoin('i.kindWork', 'k')
                ->innerJoin('i.technician', 't')
                ->groupBy('k.titleKindWork')
                ->addGroupBy('year')
                ->addGroupBy('t.lastName')
                ->addGroupBy('t.firstName')
                ->orderBy('year', 'DESC')
                ->addOrderBy('k.titleKindWork', 'ASC')
                ->addOrderBy('t.lastName', 'ASC')
                ->addOrderBy('t.firstName', 'ASC');
        return $qb->getQuery()->execute();
    }

    public function kindWorkTechnicianWeekArray() {
        $qb = $this->createQueryBuilder('i')
                ->select('YEAR(i.interventionDate) AS year, i.weekNumber, SUM(i.numberHours) '
                        . 'AS totalNumberHours, t.lastName, t.firstName, k.titleKindWork')
                ->innerJoin('i.kindWork', 'k')
                ->innerJoin('i.technician', 't')
                ->groupBy('k.titleKindWork')
                ->addGroupBy('year')
                ->addGroupBy('i.weekNumber')
                ->addGroupBy('t.lastName')
                ->addGroupBy('t.firstName')
                ->orderBy('year', 'DESC')
                ->addOrderBy('k.titleKindWork', 'ASC')
                ->addOrderBy('i.weekNumber', 'ASC')
                ->addOrderBy('t.lastName', 'ASC')
                ->addOrderBy('t.firstName', 'ASC');
        return $qb->getQuery()->execute();
    }

    public function investInterPlaceKindWorkArray() {
        $qb = $this->createQueryBuilder('i')
                ->select('YEAR(i.interventionDate) AS year, i.id, p.titlePlace, k.titleKindWork , '
                        . ' ROUND(SUM(l.laborCost*i.numberHours), 4) AS totalLaborCost, i.comments')
                ->innerJoin('i.kindWork', 'k')
                ->innerJoin('k.laborCost', 'l')
                ->innerJoin('i.places', 'p')
                ->where('k.titleKindWork = :titleKindWork')
                ->setParameter('titleKindWork', 'Investissement')
                ->groupBy('k.titleKindWork')
                ->addGroupBy('year')
                ->addGroupBy('p.titlePlace')
                ->orderBy('year', 'DESC')
                ->addOrderBy('i.id', 'ASC')
                ->addOrderBy('p.titlePlace', 'ASC');
        return $qb->getQuery()->execute();
    }

    /**
     * Function with Query Builder for the table "dayTechnicianHoursCost"
     * YEAR and ROUND are functions of "beberlei/DoctrineExtensions"
     * Fonction avec QueryBuilder pour le tableau "dayTechnicianHoursCost"
     * YEAR et ROUND sont des fonctions de "beberlei/DoctrineExtensions"
     */
    public function dayTechnicianHoursCostArray() {
        $qb = $this->createQueryBuilder('i')
                ->select('YEAR(i.interventionDate) AS year, i.interventionDate, t.lastName, t.firstName, '
                        . 'SUM(i.numberHours) AS totalNumberHours, ROUND(SUM(l.laborCost*i.numberHours),4) AS totalLaborCost')
                ->innerJoin('i.kindWork', 'k')
                ->innerJoin('k.laborCost', 'l')
                ->innerJoin('i.technician', 't')
                ->groupBy('year')
                ->addGroupBy('i.interventionDate')
                ->addGroupBy('t.lastName')
                ->addGroupBy('t.firstName')
                ->orderBy('year', 'DESC')
                ->addOrderBy('i.interventionDate', 'ASC')
                ->addOrderBy('t.lastName', 'ASC')
                ->addOrderBy('t.firstName', 'ASC');
        return $qb->getQuery()->execute();
    }

    public function kindWorkPlaceCostArray() {
        $qb = $this->createQueryBuilder('i')
                ->select('YEAR(i.interventionDate) AS year, p.titlePlace, k.titleKindWork, '
                        . 'ROUND(SUM(l.laborCost*i.numberHours), 4) AS totalLaborCost, SUM(i.totalMaterialCost) AS totalMaterialCost')
                ->innerJoin('i.kindWork', 'k')
                ->innerJoin('k.laborCost', 'l')
                ->innerJoin('i.places', 'p')
                ->groupBy('year')
                ->addGroupBy('k.titleKindWork')
                ->addGroupBy('p.titlePlace')
                ->orderBy('year', 'DESC')
                ->addOrderBy('k.titleKindWork', 'ASC')
                ->addOrderBy('p.titlePlace', 'ASC');
        return $qb->getQuery()->execute();
    }
    
    public function homepageTableArray() {
        $qb = $this->createQueryBuilder('i')
                ->select('YEAR(CURRENT_DATE()) AS year, i.id, i.interventionDate, i.weekNumber, t.lastName, t.firstName, t.trades, i.numberHours, k.titleKindWork, '
                        . 'ROUND(SUM(l.laborCost*i.numberHours), 4) AS totalLaborCost, ti.titleTypeIntervention, i.totalMaterialCost, p.titlePlace, g.titleGroup, i.comments')
                ->where('YEAR(i.interventionDate) = YEAR(CURRENT_DATE())')
                ->innerJoin('i.kindWork', 'k')
                ->innerJoin('k.laborCost', 'l')
                ->innerJoin('i.typeIntervention', 'ti')
                ->innerJoin('i.technician', 't')
                ->innerJoin('i.places', 'p')
                ->innerJoin('p.groupsPlaces', 'g')
                ->groupBy('i.id')
                ->addGroupBy('i.interventionDate')
                ->addGroupBy('t.lastName')
                ->addGroupBy('t.firstName')
                ->orderBy('i.interventionDate', 'DESC');
        return $qb->getQuery()->execute();

                
    }

}

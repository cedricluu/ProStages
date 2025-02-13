<?php

namespace App\Repository;

use App\Entity\Stage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Stage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stage[]    findAll()
 * @method Stage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stage::class);
    }


    // /**
    //  * @return Stage[] Returns an array of Stage objects
    //  */


    public function findAllAvecNomEntreprise()
{
    return $this->getEntityManager()->createQuery('
    SELECT s, e, f
    FROM App\Entity\Stage s
    JOIN s.entreprise e
    JOIN s.formation f')
        ->execute()
    ;
}

public function findByIdStage($id)
{
    return $this->createQueryBuilder('s')
        ->join('s.entreprise','e')
        ->join('s.formation','f')
        ->addSelect('e')
        ->addSelect('f')
        ->andWhere('s.id = :id')
        ->setParameter('id', $id)
        ->getQuery()
        ->getResult()
    ;
}
/*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Stage
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

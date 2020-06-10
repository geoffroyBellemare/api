<?php

namespace App\Repository;

use App\Entity\SpotSubType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SpotSubType|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpotSubType|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpotSubType[]    findAll()
 * @method SpotSubType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpotSubTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpotSubType::class);
    }

    // /**
    //  * @return SpotSubType[] Returns an array of SpotSubType objects
    //  */
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
    public function findOneBySomeField($value): ?SpotSubType
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

<?php

namespace WouldYouRatherBundle\Repository;

use WouldYouRatherBundle\Entity\WouldYou;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @extends ServiceEntityRepository<WouldYou>
 */
class WouldYouRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WouldYou::class);
    }

//    /**
//     * @return WouldYou[] Returns an array of WouldYou objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?WouldYou
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function findRandomActive(?int $excludeId = null): ?WouldYou
    {
        $queryBuilder = $this->createQueryBuilder('w')
            ->select('w.id')
            ->where('w.active = :active')
            ->andWhere('w.deletedAt IS NULL')
            ->setParameter('active', true);

        if ($excludeId !== null) {
            $queryBuilder
                ->andWhere('w.id != :excludeId')
                ->setParameter('excludeId', $excludeId);
        }

        $ids = $queryBuilder
            ->getQuery()
            ->getSingleColumnResult();

        if ($ids === []) {
            return null;
        }

        $randomId = $ids[array_rand($ids)];

        return $this->find($randomId);
    }
}

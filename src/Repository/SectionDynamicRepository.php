<?php

namespace App\Repository;

use App\Entity\SectionDynamic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SectionDynamic>
 *
 * @method SectionDynamic|null find($id, $lockMode = null, $lockVersion = null)
 * @method SectionDynamic|null findOneBy(array $criteria, array $orderBy = null)
 * @method SectionDynamic[]    findAll()
 * @method SectionDynamic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectionDynamicRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SectionDynamic::class);
    }

//    /**
//     * @return SectionDynamic[] Returns an array of SectionDynamic objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SectionDynamic
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

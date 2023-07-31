<?php

namespace App\Repository;

use App\Entity\SectionStatic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SectionStatic>
 *
 * @method SectionStatic|null find($id, $lockMode = null, $lockVersion = null)
 * @method SectionStatic|null findOneBy(array $criteria, array $orderBy = null)
 * @method SectionStatic[]    findAll()
 * @method SectionStatic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectionStaticRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SectionStatic::class);
    }

//    /**
//     * @return SectionStatic[] Returns an array of SectionStatic objects
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

//    public function findOneBySomeField($value): ?SectionStatic
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

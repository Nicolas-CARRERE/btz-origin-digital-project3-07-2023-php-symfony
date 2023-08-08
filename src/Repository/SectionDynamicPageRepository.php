<?php

namespace App\Repository;

use App\Entity\SectionDynamicPage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SectionDynamicPage>
 *
 * @method SectionDynamicPage|null find($id, $lockMode = null, $lockVersion = null)
 * @method SectionDynamicPage|null findOneBy(array $criteria, array $orderBy = null)
 * @method SectionDynamicPage[]    findAll()
 * @method SectionDynamicPage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectionDynamicPageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SectionDynamicPage::class);
    }

//    /**
//     * @return SectionDynamicPage[] Returns an array of SectionDynamicPage objects
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

//    public function findOneBySomeField($value): ?SectionDynamicPage
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

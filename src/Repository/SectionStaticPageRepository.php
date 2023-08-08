<?php

namespace App\Repository;

use App\Entity\SectionStaticPage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SectionStaticPage>
 *
 * @method SectionStaticPage|null find($id, $lockMode = null, $lockVersion = null)
 * @method SectionStaticPage|null findOneBy(array $criteria, array $orderBy = null)
 * @method SectionStaticPage[]    findAll()
 * @method SectionStaticPage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectionStaticPageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SectionStaticPage::class);
    }

//    /**
//     * @return SectionStaticPage[] Returns an array of SectionStaticPage objects
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

//    public function findOneBySomeField($value): ?SectionStaticPage
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

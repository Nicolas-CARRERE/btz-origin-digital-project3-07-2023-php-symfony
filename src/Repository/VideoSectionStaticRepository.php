<?php

namespace App\Repository;

use App\Entity\VideoSectionStatic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VideoSectionStatic>
 *
 * @method VideoSectionStatic|null find($id, $lockMode = null, $lockVersion = null)
 * @method VideoSectionStatic|null findOneBy(array $criteria, array $orderBy = null)
 * @method VideoSectionStatic[]    findAll()
 * @method VideoSectionStatic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoSectionStaticRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VideoSectionStatic::class);
    }

//    /**
//     * @return VideoSectionStatic[] Returns an array of VideoSectionStatic objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VideoSectionStatic
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

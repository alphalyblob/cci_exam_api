<?php

namespace App\Repository;

use App\Entity\EducationalBackground;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EducationalBackground>
 *
 * @method EducationalBackground|null find($id, $lockMode = null, $lockVersion = null)
 * @method EducationalBackground|null findOneBy(array $criteria, array $orderBy = null)
 * @method EducationalBackground[]    findAll()
 * @method EducationalBackground[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EducationalBackgroundRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EducationalBackground::class);
    }

//    /**
//     * @return EducationalBackground[] Returns an array of EducationalBackground objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EducationalBackground
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

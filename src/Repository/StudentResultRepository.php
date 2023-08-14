<?php

namespace App\Repository;

use App\Entity\StudentResult;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StudentResult>
 *
 * @method StudentResult|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudentResult|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudentResult[]    findAll()
 * @method StudentResult[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentResultRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudentResult::class);
    }

//    /**
//     * @return StudentResult[] Returns an array of StudentResult objects
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

//    public function findOneBySomeField($value): ?StudentResult
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

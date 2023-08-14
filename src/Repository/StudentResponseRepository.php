<?php

namespace App\Repository;

use App\Entity\StudentResponse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StudentResponse>
 *
 * @method StudentResponse|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudentResponse|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudentResponse[]    findAll()
 * @method StudentResponse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentResponseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudentResponse::class);
    }

//    /**
//     * @return StudentResponse[] Returns an array of StudentResponse objects
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

//    public function findOneBySomeField($value): ?StudentResponse
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

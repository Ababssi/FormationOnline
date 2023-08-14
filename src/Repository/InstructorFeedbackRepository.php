<?php

namespace App\Repository;

use App\Entity\InstructorFeedback;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InstructorFeedback>
 *
 * @method InstructorFeedback|null find($id, $lockMode = null, $lockVersion = null)
 * @method InstructorFeedback|null findOneBy(array $criteria, array $orderBy = null)
 * @method InstructorFeedback[]    findAll()
 * @method InstructorFeedback[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstructorFeedbackRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InstructorFeedback::class);
    }

//    /**
//     * @return InstructorFeedback[] Returns an array of InstructorFeedback objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?InstructorFeedback
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

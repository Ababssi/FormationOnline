<?php

namespace App\Repository;

use App\Entity\LessonFeedback;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LessonFeedback>
 *
 * @method LessonFeedback|null find($id, $lockMode = null, $lockVersion = null)
 * @method LessonFeedback|null findOneBy(array $criteria, array $orderBy = null)
 * @method LessonFeedback[]    findAll()
 * @method LessonFeedback[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LessonFeedbackRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LessonFeedback::class);
    }

//    /**
//     * @return LessonFeedback[] Returns an array of LessonFeedback objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LessonFeedback
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

<?php

namespace App\Repository;

use App\Entity\Pigment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Pigment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pigment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pigment[]    findAll()
 * @method Pigment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PigmentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Pigment::class);
    }

    // /**
    //  * @return Pigment[] Returns an array of Pigment objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pigment
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\Nanomateriaux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Nanomateriaux|null find($id, $lockMode = null, $lockVersion = null)
 * @method Nanomateriaux|null findOneBy(array $criteria, array $orderBy = null)
 * @method Nanomateriaux[]    findAll()
 * @method Nanomateriaux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NanomateriauxRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Nanomateriaux::class);
    }

    // /**
    //  * @return Nanomateriaux[] Returns an array of Nanomateriaux objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Nanomateriaux
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

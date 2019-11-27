<?php

namespace App\Repository;

use App\Entity\Imageuser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Imageuser|null find($id, $lockMode = null, $lockVersion = null)
 * @method Imageuser|null findOneBy(array $criteria, array $orderBy = null)
 * @method Imageuser[]    findAll()
 * @method Imageuser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageuserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Imageuser::class);
    }

    // /**
    //  * @return Imageuser[] Returns an array of Imageuser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Imageuser
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

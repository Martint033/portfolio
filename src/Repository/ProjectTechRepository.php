<?php

namespace App\Repository;

use App\Entity\ProjectTech;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProjectTech|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjectTech|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectTech[]    findAll()
 * @method ProjectTech[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectTechRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProjectTech::class);
    }

//    /**
//     * @return ProjectTech[] Returns an array of ProjectTech objects
//     */
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
    public function findOneBySomeField($value): ?ProjectTech
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

<?php

namespace App\Repository;

use App\Entity\ProjectLanguage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProjectLanguage|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjectLanguage|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectLanguage[]    findAll()
 * @method ProjectLanguage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectLanguageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProjectLanguage::class);
    }

//    /**
//     * @return ProjectLanguage[] Returns an array of ProjectLanguage objects
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
    public function findOneBySomeField($value): ?ProjectLanguage
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

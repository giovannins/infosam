<?php

namespace App\Repository;

use App\Entity\DependentePensionista;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DependentePensionista>
 *
 * @method DependentePensionista|null find($id, $lockMode = null, $lockVersion = null)
 * @method DependentePensionista|null findOneBy(array $criteria, array $orderBy = null)
 * @method DependentePensionista[]    findAll()
 * @method DependentePensionista[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DependentePensionistaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DependentePensionista::class);
    }

//    /**
//     * @return DependentePensionista[] Returns an array of DependentePensionista objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DependentePensionista
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

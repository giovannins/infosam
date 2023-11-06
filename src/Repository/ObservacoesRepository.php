<?php

namespace App\Repository;

use App\Entity\Observacoes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Observacoes>
 *
 * @method Observacoes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Observacoes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Observacoes[]    findAll()
 * @method Observacoes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObservacoesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Observacoes::class);
    }

//    /**
//     * @return Observacoes[] Returns an array of Observacoes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Observacoes
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

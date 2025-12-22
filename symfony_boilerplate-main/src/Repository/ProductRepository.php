<?php

namespace App\Repository;

use App\Entity\Product;
use App\Enum\ProductStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * Recherche de produits par nom ou description
     */
    public function searchByTerm(string $term): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.name LIKE :term OR p.description LIKE :term')
            ->setParameter('term', '%' . $term . '%')
            ->orderBy('p.name', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    /**
     * Compte les produits par statut
     */
   public function countByStatus(): array
{
    $results = $this->createQueryBuilder('p')
        ->select('p.status as status', 'COUNT(p.id) as count')
        ->groupBy('p.status')
        ->getQuery()
        ->getResult();

    $formatted = [];
    foreach ($results as $result) {
        $formatted[] = [
            'status' => $result['status'],
            'count' => $result['count']
        ];
    }

    return $formatted;
}
    /**
     * Retourne les produits disponibles
     */
    public function findAvailable(): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.status = :status')
            ->andWhere('p.stock > 0')
            ->setParameter('status', ProductStatus::AVAILABLE)
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}

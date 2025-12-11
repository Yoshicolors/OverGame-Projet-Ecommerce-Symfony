<?php

namespace App\Repository;

use App\Entity\Order;
use App\Enum\OrderStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Order>
 */
class OrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

    /**
     * Retourne les dernières commandes
     */
    public function findLatest(int $limit = 5): array
    {
        return $this->createQueryBuilder('o')
            ->orderBy('o.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Calcule le montant total des ventes par mois pour les commandes livrées
     */
    public function getTotalSalesByMonth(): array
    {
        $qb = $this->createQueryBuilder('o')
            ->select("DATE_FORMAT(o.createdAt, '%Y-%m') as month")
            ->addSelect('SUM(oi.productPrice * oi.quantity) as total')
            ->join('o.orderItems', 'oi')
            ->where('o.status = :status')
            ->setParameter('status', OrderStatus::DELIVERED)
            ->groupBy('month')
            ->orderBy('month', 'DESC');

        return $qb->getQuery()->getResult();
    }

    /**
     * Calcule le montant total des ventes
     */
    public function getTotalSales(): float
    {
        $result = $this->createQueryBuilder('o')
            ->select('SUM(oi.productPrice * oi.quantity) as total')
            ->join('o.orderItems', 'oi')
            ->where('o.status = :status')
            ->setParameter('status', OrderStatus::DELIVERED)
            ->getQuery()
            ->getSingleScalarResult();

        return (float) ($result ?? 0);
    }
}

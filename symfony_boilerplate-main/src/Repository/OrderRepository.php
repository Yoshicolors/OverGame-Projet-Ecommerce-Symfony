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
    public function findLatestOrders(int $limit = 5): array
{
    return $this->createQueryBuilder('o')
        ->orderBy('o.createdAt', 'DESC')
        ->setMaxResults($limit)
        ->getQuery()
        ->getResult();
}

public function getSalesStatistics(): array
{
    $conn = $this->getEntityManager()->getConnection();
    
    // Total des ventes
    $totalSql = "
        SELECT COALESCE(SUM(oi.product_price * oi.quantity), 0) as total
        FROM `order` o
        INNER JOIN order_item oi ON o.id = oi.order_id
        WHERE o.status = 'livree'
    ";
    
    $total = $conn->executeQuery($totalSql)->fetchOne();
    
    // Ventes par mois
    $monthlySql = "
        SELECT 
            DATE_FORMAT(o.created_at, '%Y-%m') as month,
            SUM(oi.product_price * oi.quantity) as total
        FROM `order` o
        INNER JOIN order_item oi ON o.id = oi.order_id
        WHERE o.status = 'livree'
        GROUP BY month
        ORDER BY month DESC
        LIMIT 12
    ";
    
    $monthly = $conn->executeQuery($monthlySql)->fetchAllAssociative();
    
    return [
        'total' => (float) $total,
        'monthly' => $monthly
    ];
}
}

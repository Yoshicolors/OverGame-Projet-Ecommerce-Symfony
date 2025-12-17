<?php

namespace App\DataFixtures;

use App\Entity\Order;
use App\Enum\OrderStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OrderFixtures extends Fixture implements DependentFixtureInterface
{
    public const ORDER_1 = 'order-1';
    public const ORDER_2 = 'order-2';
    public const ORDER_3 = 'order-3';
    public const ORDER_4 = 'order-4';
    public const ORDER_5 = 'order-5';
    public const ORDER_6 = 'order-6';

    public function load(ObjectManager $manager): void
    {
        $orders = [
            [
                'user' => UserFixtures::USER_CLIENT_1,
                'status' => OrderStatus::DELIVERED,
                'createdAt' => new \DateTime('-30 days'),
                'reference' => self::ORDER_1,
            ],
            [
                'user' => UserFixtures::USER_CLIENT_1,
                'status' => OrderStatus::DELIVERED,
                'createdAt' => new \DateTime('-15 days'),
                'reference' => self::ORDER_2,
            ],
            [
                'user' => UserFixtures::USER_CLIENT_2,
                'status' => OrderStatus::SHIPPED,
                'createdAt' => new \DateTime('-5 days'),
                'reference' => self::ORDER_3,
            ],
            [
                'user' => UserFixtures::USER_CLIENT_3,
                'status' => OrderStatus::PREPARING,
                'createdAt' => new \DateTime('-2 days'),
                'reference' => self::ORDER_4,
            ],
            [
                'user' => UserFixtures::USER_CLIENT_4,
                'status' => OrderStatus::DELIVERED,
                'createdAt' => new \DateTime('-20 days'),
                'reference' => self::ORDER_5,
            ],
            [
                'user' => UserFixtures::USER_CLIENT_2,
                'status' => OrderStatus::CANCELLED,
                'createdAt' => new \DateTime('-10 days'),
                'reference' => self::ORDER_6,
            ],
        ];

        foreach ($orders as $orderData) {
            $order = new Order();
            $order->setUser($this->getReference($orderData['user'], \App\Entity\User::class));
            $order->setStatus($orderData['status']);
            $order->setCreatedAt($orderData['createdAt']);
            
            $manager->persist($order);
            $this->addReference($orderData['reference'], $order);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
        ];
    }
}

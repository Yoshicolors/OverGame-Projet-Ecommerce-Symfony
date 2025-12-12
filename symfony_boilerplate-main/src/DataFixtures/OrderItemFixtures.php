<?php

namespace App\DataFixtures;

use App\Entity\OrderItem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OrderItemFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Commande 1 : 2 jeux
        $orderItem1 = new OrderItem();
        $orderItem1->setOrder($this->getReference(OrderFixtures::ORDER_1));
        $orderItem1->setProduct($this->getReference('product-0')); // The Last of Us Part II
        $orderItem1->setQuantity(1);
        $orderItem1->setProductPrice('59.99');
        $manager->persist($orderItem1);

        $orderItem2 = new OrderItem();
        $orderItem2->setOrder($this->getReference(OrderFixtures::ORDER_1));
        $orderItem2->setProduct($this->getReference('product-3')); // Elden Ring
        $orderItem2->setQuantity(1);
        $orderItem2->setProductPrice('59.99');
        $manager->persist($orderItem2);

        // Commande 2 : 1 jeu
        $orderItem3 = new OrderItem();
        $orderItem3->setOrder($this->getReference(OrderFixtures::ORDER_2));
        $orderItem3->setProduct($this->getReference('product-1')); // God of War Ragnarök
        $orderItem3->setQuantity(1);
        $orderItem3->setProductPrice('69.99');
        $manager->persist($orderItem3);

        // Commande 3 : 3 jeux
        $orderItem4 = new OrderItem();
        $orderItem4->setOrder($this->getReference(OrderFixtures::ORDER_3));
        $orderItem4->setProduct($this->getReference('product-7')); // EA Sports FC 24
        $orderItem4->setQuantity(2);
        $orderItem4->setProductPrice('69.99');
        $manager->persist($orderItem4);

        $orderItem5 = new OrderItem();
        $orderItem5->setOrder($this->getReference(OrderFixtures::ORDER_3));
        $orderItem5->setProduct($this->getReference('product-9')); // Zelda
        $orderItem5->setQuantity(1);
        $orderItem5->setProductPrice('59.99');
        $manager->persist($orderItem5);

        // Commande 4 : 1 jeu
        $orderItem6 = new OrderItem();
        $orderItem6->setOrder($this->getReference(OrderFixtures::ORDER_4));
        $orderItem6->setProduct($this->getReference('product-4')); // Final Fantasy XVI
        $orderItem6->setQuantity(1);
        $orderItem6->setProductPrice('69.99');
        $manager->persist($orderItem6);

        // Commande 5 : 4 jeux (grosse commande)
        $orderItem7 = new OrderItem();
        $orderItem7->setOrder($this->getReference(OrderFixtures::ORDER_5));
        $orderItem7->setProduct($this->getReference('product-5')); // Baldur's Gate 3
        $orderItem7->setQuantity(1);
        $orderItem7->setProductPrice('59.99');
        $manager->persist($orderItem7);

        $orderItem8 = new OrderItem();
        $orderItem8->setOrder($this->getReference(OrderFixtures::ORDER_5));
        $orderItem8->setProduct($this->getReference('product-0')); // The Last of Us Part II
        $orderItem8->setQuantity(1);
        $orderItem8->setProductPrice('59.99');
        $manager->persist($orderItem8);

        $orderItem9 = new OrderItem();
        $orderItem9->setOrder($this->getReference(OrderFixtures::ORDER_5));
        $orderItem9->setProduct($this->getReference('product-8')); // NBA 2K24
        $orderItem9->setQuantity(1);
        $orderItem9->setProductPrice('69.99');
        $manager->persist($orderItem9);

        $orderItem10 = new OrderItem();
        $orderItem10->setOrder($this->getReference(OrderFixtures::ORDER_5));
        $orderItem10->setProduct($this->getReference('product-3')); // Elden Ring
        $orderItem10->setQuantity(2);
        $orderItem10->setProductPrice('59.99');
        $manager->persist($orderItem10);

        // Commande 6 (annulée) : 1 jeu
        $orderItem11 = new OrderItem();
        $orderItem11->setOrder($this->getReference(OrderFixtures::ORDER_6));
        $orderItem11->setProduct($this->getReference('product-2')); // Spider-Man 2
        $orderItem11->setQuantity(1);
        $orderItem11->setProductPrice('79.99');
        $manager->persist($orderItem11);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            OrderFixtures::class,
            ProductFixtures::class,
        ];
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\CreditCard;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CreditCardFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $creditCards = [
            // Cartes pour client 1
            [
                'number' => '4532123456789012',
                'expirationDate' => new \DateTime('+2 years'),
                'cvv' => '123',
                'user' => UserFixtures::USER_CLIENT_1,
            ],
            // Cartes pour client 2
            [
                'number' => '5425233430109903',
                'expirationDate' => new \DateTime('+1 year'),
                'cvv' => '456',
                'user' => UserFixtures::USER_CLIENT_2,
            ],
            [
                'number' => '4916338506082832',
                'expirationDate' => new \DateTime('+3 years'),
                'cvv' => '789',
                'user' => UserFixtures::USER_CLIENT_2,
            ],
            // Cartes pour client 3
            [
                'number' => '4024007134564842',
                'expirationDate' => new \DateTime('+1 year 6 months'),
                'cvv' => '321',
                'user' => UserFixtures::USER_CLIENT_3,
            ],
            // Cartes pour client 4
            [
                'number' => '5555555555554444',
                'expirationDate' => new \DateTime('+2 years 3 months'),
                'cvv' => '654',
                'user' => UserFixtures::USER_CLIENT_4,
            ],
            [
                'number' => '4111111111111111',
                'expirationDate' => new \DateTime('+4 years'),
                'cvv' => '987',
                'user' => UserFixtures::USER_CLIENT_4,
            ],
        ];

        foreach ($creditCards as $cardData) {
            $card = new CreditCard();
            $card->setNumber($cardData['number']);
            $card->setExpirationDate($cardData['expirationDate']);
            $card->setCvv($cardData['cvv']);
            $card->setUser($this->getReference($cardData['user'], \App\Entity\User::class));
            
            $manager->persist($card);
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

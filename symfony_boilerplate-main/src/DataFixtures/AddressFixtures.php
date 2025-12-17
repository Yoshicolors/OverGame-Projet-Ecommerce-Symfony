<?php

namespace App\DataFixtures;

use App\Entity\Address;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AddressFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $addresses = [
            // Adresses pour client 1
            [
                'street' => '15 rue de la République',
                'postalCode' => '75001',
                'city' => 'Paris',
                'country' => 'France',
                'user' => UserFixtures::USER_CLIENT_1,
            ],
            // Adresses pour client 2
            [
                'street' => '42 avenue des Champs-Élysées',
                'postalCode' => '75008',
                'city' => 'Paris',
                'country' => 'France',
                'user' => UserFixtures::USER_CLIENT_2,
            ],
            [
                'street' => '8 boulevard Haussmann',
                'postalCode' => '75009',
                'city' => 'Paris',
                'country' => 'France',
                'user' => UserFixtures::USER_CLIENT_2,
            ],
            // Adresses pour client 3
            [
                'street' => '23 rue Victor Hugo',
                'postalCode' => '69002',
                'city' => 'Lyon',
                'country' => 'France',
                'user' => UserFixtures::USER_CLIENT_3,
            ],
            // Adresses pour client 4
            [
                'street' => '56 cours Mirabeau',
                'postalCode' => '13100',
                'city' => 'Aix-en-Provence',
                'country' => 'France',
                'user' => UserFixtures::USER_CLIENT_4,
            ],
            [
                'street' => '12 place Bellecour',
                'postalCode' => '69002',
                'city' => 'Lyon',
                'country' => 'France',
                'user' => UserFixtures::USER_CLIENT_4,
            ],
        ];

        foreach ($addresses as $addressData) {
            $address = new Address();
            $address->setStreet($addressData['street']);
            $address->setPostalCode($addressData['postalCode']);
            $address->setCity($addressData['city']);
            $address->setCountry($addressData['country']);
            $address->setUser($this->getReference($addressData['user'], \App\Entity\User::class));
            
            $manager->persist($address);
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

<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public const USER_ADMIN = 'user-admin';
    public const USER_CLIENT_1 = 'user-client-1';
    public const USER_CLIENT_2 = 'user-client-2';
    public const USER_CLIENT_3 = 'user-client-3';
    public const USER_CLIENT_4 = 'user-client-4';

    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        // Créer un administrateur
        $admin = new User();
        $admin->setEmail('admin@overgame.com');
        $admin->setFirstName('Admin');
        $admin->setLastName('OverGame');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword(
            $this->passwordHasher->hashPassword($admin, 'admin123')
        );
        $manager->persist($admin);
        $this->addReference(self::USER_ADMIN, $admin);

        // Créer des clients
        $clients = [
            [
                'email' => 'jean.dupont@example.com',
                'firstName' => 'Jean',
                'lastName' => 'Dupont',
                'password' => 'client123',
                'reference' => self::USER_CLIENT_1,
            ],
            [
                'email' => 'marie.martin@example.com',
                'firstName' => 'Marie',
                'lastName' => 'Martin',
                'password' => 'client123',
                'reference' => self::USER_CLIENT_2,
            ],
            [
                'email' => 'pierre.bernard@example.com',
                'firstName' => 'Pierre',
                'lastName' => 'Bernard',
                'password' => 'client123',
                'reference' => self::USER_CLIENT_3,
            ],
            [
                'email' => 'sophie.dubois@example.com',
                'firstName' => 'Sophie',
                'lastName' => 'Dubois',
                'password' => 'client123',
                'reference' => self::USER_CLIENT_4,
            ],
        ];

        foreach ($clients as $clientData) {
            $client = new User();
            $client->setEmail($clientData['email']);
            $client->setFirstName($clientData['firstName']);
            $client->setLastName($clientData['lastName']);
            $client->setRoles(['ROLE_USER']);
            $client->setPassword(
                $this->passwordHasher->hashPassword($client, $clientData['password'])
            );
            
            $manager->persist($client);
            $this->addReference($clientData['reference'], $client);
        }

        $manager->flush();
    }
}

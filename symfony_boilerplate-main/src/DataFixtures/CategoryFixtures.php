<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORY_ACTION = 'category-action';
    public const CATEGORY_RPG = 'category-rpg';
    public const CATEGORY_SPORT = 'category-sport';
    public const CATEGORY_AVENTURE = 'category-aventure';
    public const CATEGORY_STRATEGIE = 'category-strategie';
    public const CATEGORY_SIMULATION = 'category-simulation';
    public const CATEGORY_COURSE = 'category-course';
    public const CATEGORY_HORREUR = 'category-horreur';

    public function load(ObjectManager $manager): void
    {
        $categories = [
            [
                'name' => 'Action',
                'description' => 'Jeux d\'action et d\'aventure avec des combats intenses',
                'reference' => self::CATEGORY_ACTION,
            ],
            [
                'name' => 'RPG',
                'description' => 'Jeux de rôle avec progression de personnage et histoire immersive',
                'reference' => self::CATEGORY_RPG,
            ],
            [
                'name' => 'Sport',
                'description' => 'Jeux de sport et compétition',
                'reference' => self::CATEGORY_SPORT,
            ],
            [
                'name' => 'Aventure',
                'description' => 'Jeux d\'aventure et exploration',
                'reference' => self::CATEGORY_AVENTURE,
            ],
            [
                'name' => 'Stratégie',
                'description' => 'Jeux de stratégie et tactique',
                'reference' => self::CATEGORY_STRATEGIE,
            ],
            [
                'name' => 'Simulation',
                'description' => 'Jeux de simulation et gestion',
                'reference' => self::CATEGORY_SIMULATION,
            ],
            [
                'name' => 'Course',
                'description' => 'Jeux de course automobile et arcade',
                'reference' => self::CATEGORY_COURSE,
            ],
            [
                'name' => 'Horreur',
                'description' => 'Jeux d\'horreur et survival',
                'reference' => self::CATEGORY_HORREUR,
            ],
        ];

        foreach ($categories as $categoryData) {
            $category = new Category();
            $category->setName($categoryData['name']);
            $category->setDescription($categoryData['description']);
            
            $manager->persist($category);
            
            // Ajouter une référence pour utiliser dans d'autres fixtures
            $this->addReference($categoryData['reference'], $category);
        }

        $manager->flush();
    }
}

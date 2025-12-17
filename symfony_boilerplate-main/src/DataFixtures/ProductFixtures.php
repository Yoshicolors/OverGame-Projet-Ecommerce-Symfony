<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Enum\ProductStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $products = [
            // Action
            [
                'name' => 'The Last of Us Part II',
                'price' => '59.99',
                'description' => 'Une aventure post-apocalyptique intense avec Ellie dans un monde dévasté. Combat, survie et émotions garanties.',
                'stock' => 50,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_ACTION,
            ],
            [
                'name' => 'God of War Ragnarök',
                'price' => '69.99',
                'description' => 'Kratos et Atreus affrontent les dieux nordiques dans cette suite épique de God of War.',
                'stock' => 35,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_ACTION,
            ],
            [
                'name' => 'Spider-Man 2',
                'price' => '79.99',
                'description' => 'Incarnez Peter Parker et Miles Morales dans cette aventure spectaculaire à travers New York.',
                'stock' => 0,
                'status' => ProductStatus::OUT_OF_STOCK,
                'category' => CategoryFixtures::CATEGORY_ACTION,
            ],
            
            // RPG
            [
                'name' => 'Elden Ring',
                'price' => '59.99',
                'description' => 'Un RPG d\'action en monde ouvert créé par FromSoftware et George R.R. Martin. Explorez l\'Entre-Terre.',
                'stock' => 45,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_RPG,
            ],
            [
                'name' => 'Final Fantasy XVI',
                'price' => '69.99',
                'description' => 'Le dernier opus de la saga Final Fantasy avec un système de combat dynamique et une histoire épique.',
                'stock' => 30,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_RPG,
            ],
            [
                'name' => 'Baldur\'s Gate 3',
                'price' => '59.99',
                'description' => 'RPG tactique basé sur D&D. Créez votre personnage et vivez une aventure unique avec vos compagnons.',
                'stock' => 25,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_RPG,
            ],
            [
                'name' => 'Dragon Age: Dreadwolf',
                'price' => '69.99',
                'description' => 'Le prochain chapitre de la saga Dragon Age. Affrontez des forces anciennes et sauvez Thedas.',
                'stock' => 0,
                'status' => ProductStatus::PREORDER,
                'category' => CategoryFixtures::CATEGORY_RPG,
            ],
            
            // Sport
            [
                'name' => 'EA Sports FC 24',
                'price' => '69.99',
                'description' => 'Le jeu de football ultime avec tous les championnats et joueurs sous licence officielle.',
                'stock' => 60,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_SPORT,
            ],
            [
                'name' => 'NBA 2K24',
                'price' => '69.99',
                'description' => 'Simulation de basketball la plus réaliste avec MyCareer, MyTeam et mode en ligne.',
                'stock' => 40,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_SPORT,
            ],
            
            // Aventure
            [
                'name' => 'Zelda: Tears of the Kingdom',
                'price' => '59.99',
                'description' => 'Explorez Hyrule dans cette suite de Breath of the Wild avec de nouvelles mécaniques de gameplay.',
                'stock' => 55,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_AVENTURE,
            ],
            [
                'name' => 'Hogwarts Legacy',
                'price' => '59.99',
                'description' => 'Vivez votre propre aventure dans le monde magique de Harry Potter au 19ème siècle.',
                'stock' => 42,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_AVENTURE,
            ],
            
            // Stratégie
            [
                'name' => 'Civilization VI',
                'price' => '49.99',
                'description' => 'Construisez un empire qui résistera à l\'épreuve du temps dans ce jeu de stratégie au tour par tour.',
                'stock' => 20,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_STRATEGIE,
            ],
            [
                'name' => 'Total War: Warhammer III',
                'price' => '59.99',
                'description' => 'Stratégie épique dans l\'univers de Warhammer avec batailles massives et gestion d\'empire.',
                'stock' => 15,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_STRATEGIE,
            ],
            
            // Simulation
            [
                'name' => 'Microsoft Flight Simulator',
                'price' => '69.99',
                'description' => 'La simulation de vol la plus réaliste avec le monde entier recréé en détail.',
                'stock' => 18,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_SIMULATION,
            ],
            [
                'name' => 'The Sims 4',
                'price' => '39.99',
                'description' => 'Créez et contrôlez des personnes dans un monde virtuel. Construisez des maisons et vivez des histoires.',
                'stock' => 50,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_SIMULATION,
            ],
            
            // Course
            [
                'name' => 'Forza Horizon 5',
                'price' => '59.99',
                'description' => 'Course en monde ouvert au Mexique avec des centaines de voitures et météo dynamique.',
                'stock' => 35,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_COURSE,
            ],
            [
                'name' => 'Gran Turismo 7',
                'price' => '69.99',
                'description' => 'Le simulateur de course automobile de référence sur PlayStation avec graphismes photoréalistes.',
                'stock' => 28,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_COURSE,
            ],
            
            // Horreur
            [
                'name' => 'Resident Evil 4 Remake',
                'price' => '59.99',
                'description' => 'Le remake du classique de l\'horreur avec graphismes modernes et gameplay amélioré.',
                'stock' => 32,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_HORREUR,
            ],
            [
                'name' => 'Dead Space Remake',
                'price' => '59.99',
                'description' => 'Survival horror dans l\'espace. Affrontez les Necromorphes à bord de l\'USG Ishimura.',
                'stock' => 22,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_HORREUR,
            ],
            [
                'name' => 'Silent Hill 2 Remake',
                'price' => '69.99',
                'description' => 'Le remake tant attendu du chef-d\'œuvre de l\'horreur psychologique.',
                'stock' => 0,
                'status' => ProductStatus::PREORDER,
                'category' => CategoryFixtures::CATEGORY_HORREUR,
            ],
            
            // Plus de jeux Action
            [
                'name' => 'Call of Duty: Modern Warfare III',
                'price' => '69.99',
                'description' => 'FPS intense avec campagne solo, multijoueur et mode Zombies. Action explosive garantie.',
                'stock' => 45,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_ACTION,
            ],
            [
                'name' => 'Assassin\'s Creed Mirage',
                'price' => '49.99',
                'description' => 'Retour aux sources de la saga avec Basim à Bagdad. Infiltration et parkour au programme.',
                'stock' => 38,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_ACTION,
            ],
            [
                'name' => 'Star Wars Jedi: Survivor',
                'price' => '59.99',
                'description' => 'Continuez l\'aventure de Cal Kestis dans cette suite épique avec combat au sabre laser.',
                'stock' => 33,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_ACTION,
            ],
            
            // Plus de jeux RPG
            [
                'name' => 'Starfield',
                'price' => '69.99',
                'description' => 'RPG spatial de Bethesda. Explorez plus de 1000 planètes dans cette épopée galactique.',
                'stock' => 42,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_RPG,
            ],
            [
                'name' => 'Cyberpunk 2077',
                'price' => '49.99',
                'description' => 'RPG futuriste à Night City. Incarnez V et plongez dans un monde cyberpunk immersif.',
                'stock' => 55,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_RPG,
            ],
            [
                'name' => 'The Witcher 3: Wild Hunt',
                'price' => '39.99',
                'description' => 'Chef-d\'œuvre du RPG. Incarnez Geralt de Riv dans cette aventure épique et mature.',
                'stock' => 60,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_RPG,
            ],
            
            // Plus de jeux Aventure
            [
                'name' => 'Uncharted: Legacy of Thieves',
                'price' => '49.99',
                'description' => 'Collection remasterisée avec Uncharted 4 et The Lost Legacy. Action et aventure avec Nathan Drake.',
                'stock' => 28,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_AVENTURE,
            ],
            [
                'name' => 'Horizon Forbidden West',
                'price' => '59.99',
                'description' => 'Explorez l\'Ouest Interdit avec Aloy. Combattez des machines dans un monde post-apocalyptique magnifique.',
                'stock' => 40,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_AVENTURE,
            ],
            [
                'name' => 'Ghost of Tsushima',
                'price' => '59.99',
                'description' => 'Samouraï en monde ouvert. Défendez l\'île de Tsushima contre l\'invasion mongole.',
                'stock' => 35,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_AVENTURE,
            ],
            
            // Plus de jeux Sport
            [
                'name' => 'F1 24',
                'price' => '69.99',
                'description' => 'Simulation officielle de Formule 1 avec tous les circuits et pilotes de la saison 2024.',
                'stock' => 25,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_SPORT,
            ],
            [
                'name' => 'WWE 2K24',
                'price' => '69.99',
                'description' => 'Simulation de catch avec tous les superstars de la WWE. Créez votre légende.',
                'stock' => 30,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_SPORT,
            ],
            
            // Plus de jeux Stratégie
            [
                'name' => 'Age of Empires IV',
                'price' => '59.99',
                'description' => 'RTS classique remis au goût du jour. Construisez votre civilisation et dominez vos ennemis.',
                'stock' => 22,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_STRATEGIE,
            ],
            [
                'name' => 'XCOM 2',
                'price' => '49.99',
                'description' => 'Stratégie tactique au tour par tour. Dirigez la résistance contre l\'invasion alien.',
                'stock' => 18,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_STRATEGIE,
            ],
            
            // Plus de jeux Course
            [
                'name' => 'Need for Speed Unbound',
                'price' => '59.99',
                'description' => 'Course arcade urbaine avec style artistique unique. Customisation et courses illégales.',
                'stock' => 32,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_COURSE,
            ],
            [
                'name' => 'Mario Kart 8 Deluxe',
                'price' => '59.99',
                'description' => 'Le jeu de course fun par excellence. Courses déjantées avec tous les personnages Nintendo.',
                'stock' => 65,
                'status' => ProductStatus::AVAILABLE,
                'category' => CategoryFixtures::CATEGORY_COURSE,
            ],
        ];

        foreach ($products as $index => $productData) {
            $product = new Product();
            $product->setName($productData['name']);
            $product->setPrice($productData['price']);
            $product->setDescription($productData['description']);
            $product->setStock($productData['stock']);
            $product->setStatus($productData['status']);
            $product->setCategory($this->getReference($productData['category'], \App\Entity\Category::class));
            
            $manager->persist($product);
            
            if ($index < 20) {
                $this->addReference('product-' . $index, $product);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
        ];
    }
}

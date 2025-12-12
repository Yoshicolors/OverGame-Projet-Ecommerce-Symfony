<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Images pour les 20 premiers produits
        $imageUrls = [
            // The Last of Us Part II
            ['https://image.api.playstation.com/vulcan/ap/rnd/202010/0114/ERNPc4gFqeRDG1tYQIfOKQtM.png'],
            // God of War Ragnarök
            ['https://image.api.playstation.com/vulcan/ap/rnd/202207/1210/4xJ8XB3bi888QTLZYdl7Oi0s.png'],
            // Spider-Man 2
            ['https://image.api.playstation.com/vulcan/ap/rnd/202306/1219/1c7b75d8ed9271516546560d219ad0b22ee0a263b4537bd8.png'],
            // Elden Ring
            ['https://image.api.playstation.com/vulcan/ap/rnd/202110/2000/aGhopp3MHppi7kooGE2Dtt8C.png'],
            // Final Fantasy XVI
            ['https://image.api.playstation.com/vulcan/ap/rnd/202212/0612/B9UAPM0YRQHQi1pMdMgvqCDO.png'],
            // Baldur's Gate 3
            ['https://image.api.playstation.com/vulcan/ap/rnd/202302/2321/3098481c9164bb5f33069b37e49fba1a572ea3b89971ee0e.jpg'],
            // Dragon Age: Dreadwolf
            ['https://cdn.cloudflare.steamstatic.com/steam/apps/1845910/header.jpg'],
            // EA Sports FC 24
            ['https://image.api.playstation.com/vulcan/ap/rnd/202305/1123/u0vL1M2lmEWFjJvRbRLVqLLe.png'],
            // NBA 2K24
            ['https://cdn.2k.com/2k/NBA-2K24/nba-2k24-cover.jpg'],
            // Zelda: Tears of the Kingdom
            ['https://assets.nintendo.com/image/upload/ar_16:9,c_lpad,w_1240/b_white/f_auto/q_auto/ncom/software/switch/70010000063714/5e5e784e0e2e3a6e2b5e5e5e5e5e5e5e'],
            // Hogwarts Legacy
            ['https://image.api.playstation.com/vulcan/ap/rnd/202208/1222/4JYRRbRNvQFGIL7ac2WKJJQJ.png'],
            // Civilization VI
            ['https://cdn.cloudflare.steamstatic.com/steam/apps/289070/header.jpg'],
            // Total War: Warhammer III
            ['https://cdn.cloudflare.steamstatic.com/steam/apps/1142710/header.jpg'],
            // Microsoft Flight Simulator
            ['https://cdn.cloudflare.steamstatic.com/steam/apps/1250410/header.jpg'],
            // The Sims 4
            ['https://cdn.cloudflare.steamstatic.com/steam/apps/1222670/header.jpg'],
            // Forza Horizon 5
            ['https://cdn.cloudflare.steamstatic.com/steam/apps/1551360/header.jpg'],
            // Gran Turismo 7
            ['https://image.api.playstation.com/vulcan/ap/rnd/202110/2618/4kYHmBCVFmNMRYUxLPQqJVQR.png'],
            // Resident Evil 4 Remake
            ['https://image.api.playstation.com/vulcan/ap/rnd/202210/0706/EVWyZlKNtQhkJXVdHJKVJqT5.png'],
            // Dead Space Remake
            ['https://image.api.playstation.com/vulcan/ap/rnd/202209/2816/dEqhKvBfuaLHBfJLDKoLKLrr.png'],
            // Silent Hill 2 Remake
            ['https://cdn.cloudflare.steamstatic.com/steam/apps/2124490/header.jpg'],
        ];

        for ($i = 0; $i < 20; $i++) {
            $image = new Image();
            $image->setUrl($imageUrls[$i][0]);
            $image->setAlt('Image de ' . $this->getReference('product-' . $i)->getName());
            $image->setProduct($this->getReference('product-' . $i));
            
            $manager->persist($image);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ProductFixtures::class,
        ];
    }
}

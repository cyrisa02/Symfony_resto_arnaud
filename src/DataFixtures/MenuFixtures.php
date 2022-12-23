<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MenuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $menu = new Menu();
        $menu->setTitle('Menu des chasseurs');
        $manager->persist($menu);

        $menu = new Menu();
        $menu->setTitle('Menu végétarien');
        $manager->persist($menu);

        $menu = new Menu();
        $menu->setTitle('Menu poisson');
        $manager->persist($menu);

        $manager->flush();
    }
}
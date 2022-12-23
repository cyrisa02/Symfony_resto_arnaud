<?php

namespace App\DataFixtures;

use App\Entity\Option;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OptionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $option = new Option();
        $option->setTitle('Formule Diner');
        $option->setPrice('20€');
        $option->setDescription('Entrée + Plat Dessert');
        $manager->persist($option);

        $option = new Option();
        $option->setTitle('Formule Déjeuner');
        $option->setPrice('25€');
        $option->setDescription('Entrée + Plat du jour + Dessert');
        $manager->persist($option);

        $option = new Option();
        $option->setTitle('Formule Déjeuner');
        $option->setPrice('35€');
        $option->setDescription('Entrée + Plat du jour + Fromage + Dessert');
        $manager->persist($option);

        $manager->flush();
    }
}
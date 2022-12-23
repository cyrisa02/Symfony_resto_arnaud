<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setTitle('Entrée');
        $manager->persist($category);

        $category = new Category();
        $category->setTitle('Viande');
        $manager->persist($category);

        $category = new Category();
        $category->setTitle('Poisson');
        $manager->persist($category);

        $category = new Category();
        $category->setTitle('Fromage');
        $manager->persist($category);
        
        $category = new Category();
        $category->setTitle('Dessert');
        $manager->persist($category);

        $manager->flush();
    }
}
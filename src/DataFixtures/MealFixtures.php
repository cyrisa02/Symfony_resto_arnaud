<?php

namespace App\DataFixtures;

use App\Entity\Meal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MealFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $meal = new Meal();
         $meal->setTitle('Salade du Périgord');
         $meal->setDescription('salade, foix gras');
         $meal->setPrice('12');
         $meal->setPicture('photo');
         $manager->persist($meal);

         $meal = new Meal();
         $meal->setTitle('Rôti');
         $meal->setDescription('viande d\'origine française');
         $meal->setPrice('11');
         $meal->setPicture('photo');
         $manager->persist($meal);


         $meal = new Meal();
         $meal->setTitle('Pavé de saumon');
         $meal->setDescription('Saumon d\'Ecosse');
         $meal->setPrice('12');
         $meal->setPicture('photo');
         $manager->persist($meal);

         $meal = new Meal();
         $meal->setTitle('Münster');
         $meal->setDescription('fromage d\'Alsace');
         $meal->setPrice('12');
         $meal->setPicture('photo');
         $manager->persist($meal);

         $meal = new Meal();
         $meal->setTitle('Galette des Rois');
         $meal->setDescription('Frangipane');
         $meal->setPrice('12');
         $meal->setPicture('photo');
         $manager->persist($meal);

        $manager->flush();
    }
}
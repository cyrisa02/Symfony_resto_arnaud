<?php

namespace App\DataFixtures;

use App\Entity\Scheduleevening;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ScheduleeveningFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $schedule = new Scheduleevening();
         $schedule->setTime('19:00 - 22:00');
         $manager->persist($schedule);

         $schedule = new Scheduleevening();
         $schedule->setTime('19:00 - 22:00');
         $manager->persist($schedule);

         $schedule = new Scheduleevening();
         $schedule->setTime('fermé');
         $manager->persist($schedule);

         $schedule = new Scheduleevening();
         $schedule->setTime('19:00 - 22:00');
         $manager->persist($schedule);

         $schedule = new Scheduleevening();
         $schedule->setTime('19:00 - 22:00');
         $manager->persist($schedule);

         $schedule = new Scheduleevening();
         $schedule->setTime('19:00 - 23:00');
         $manager->persist($schedule);

         $schedule = new Scheduleevening();
         $schedule->setTime('');
         $manager->persist($schedule);

        $manager->flush();
    }
}
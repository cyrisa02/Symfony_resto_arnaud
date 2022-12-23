<?php

namespace App\DataFixtures;

use App\Entity\Schedule;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ScheduleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $schedule = new Schedule();
         $schedule->setTime('12:00 - 14:00');
         $manager->persist($schedule);

         $schedule = new Schedule();
         $schedule->setTime('12:00 - 14:00');
         $manager->persist($schedule);

         $schedule = new Schedule();
         $schedule->setTime('fermé');
         $manager->persist($schedule);

         $schedule = new Schedule();
         $schedule->setTime('12:00 - 14:00');
         $manager->persist($schedule);

         $schedule = new Schedule();
         $schedule->setTime('12:00 - 14:00');
         $manager->persist($schedule);

         $schedule = new Schedule();
         $schedule->setTime('12:00 - 14:00');
         $manager->persist($schedule);

         $schedule = new Schedule();
         $schedule->setTime('12:00 - 14:00');
         $manager->persist($schedule);

        $manager->flush();
    }
}
<?php

namespace App\DataFixtures;

use App\Entity\Reservation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ReservationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $reservation = new Reservation();
        $reservation->setDate(new \DateTime('04/06/2022'));
        $reservation->setClientNumber('4');
        $reservation->setTime('12h45');
        $manager->persist($reservation);

        $reservation = new Reservation();
        $reservation->setDate(new \DateTime('04/06/2022'));
        $reservation->setClientNumber('3');
        $reservation->setTime('13h45');
        $manager->persist($reservation);

        $reservation = new Reservation();
        $reservation->setDate(new \DateTime('04/06/2022'));
        $reservation->setClientNumber('2');
        $reservation->setTime('12h15');
        $manager->persist($reservation);

        $manager->flush();
    }
}
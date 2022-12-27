<?php

namespace App\Entity;

use App\Repository\ScheduleeveningRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScheduleeveningRepository::class)]
class Scheduleevening
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $monday = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $tuesday = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $wednesday = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $thursday = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $friday = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $saturday = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $sunday = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    
    public function getMonday(): ?string
    {
        return $this->monday;
    }

    public function setMonday(?string $monday): self
    {
        $this->monday = $monday;

        return $this;
    }

    public function getTuesday(): ?string
    {
        return $this->tuesday;
    }

    public function setTuesday(?string $tuesday): self
    {
        $this->tuesday = $tuesday;

        return $this;
    }

    public function getWednesday(): ?string
    {
        return $this->wednesday;
    }

    public function setWednesday(?string $wednesday): self
    {
        $this->wednesday = $wednesday;

        return $this;
    }

    public function getThursday(): ?string
    {
        return $this->thursday;
    }

    public function setThursday(?string $thursday): self
    {
        $this->thursday = $thursday;

        return $this;
    }

    public function getFriday(): ?string
    {
        return $this->friday;
    }

    public function setFriday(?string $friday): self
    {
        $this->friday = $friday;

        return $this;
    }

    public function getSaturday(): ?string
    {
        return $this->saturday;
    }

    public function setSaturday(?string $saturday): self
    {
        $this->saturday = $saturday;

        return $this;
    }

    public function getSunday(): ?string
    {
        return $this->sunday;
    }

    public function setSunday(?string $sunday): self
    {
        $this->sunday = $sunday;

        return $this;
    }
}
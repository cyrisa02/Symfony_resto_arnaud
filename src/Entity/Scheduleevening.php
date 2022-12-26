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

    #[ORM\Column(nullable: true)]
    private ?bool $isMonday = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isTuesday = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isWednesday = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isThursday = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isFriday = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isSaturday = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isSunday = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $time = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isIsMonday(): ?bool
    {
        return $this->isMonday;
    }

    public function setIsMonday(?bool $isMonday): self
    {
        $this->isMonday = $isMonday;

        return $this;
    }

    public function isIsTuesday(): ?bool
    {
        return $this->isTuesday;
    }

    public function setIsTuesday(?bool $isTuesday): self
    {
        $this->isTuesday = $isTuesday;

        return $this;
    }

    public function isIsWednesday(): ?bool
    {
        return $this->isWednesday;
    }

    public function setIsWednesday(?bool $isWednesday): self
    {
        $this->isWednesday = $isWednesday;

        return $this;
    }

    public function isIsThursday(): ?bool
    {
        return $this->isThursday;
    }

    public function setIsThursday(?bool $isThursday): self
    {
        $this->isThursday = $isThursday;

        return $this;
    }

    public function isIsFriday(): ?bool
    {
        return $this->isFriday;
    }

    public function setIsFriday(?bool $isFriday): self
    {
        $this->isFriday = $isFriday;

        return $this;
    }

    public function isIsSaturday(): ?bool
    {
        return $this->isSaturday;
    }

    public function setIsSaturday(?bool $isSaturday): self
    {
        $this->isSaturday = $isSaturday;

        return $this;
    }

    public function isIsSunday(): ?bool
    {
        return $this->isSunday;
    }

    public function setIsSunday(?bool $isSunday): self
    {
        $this->isSunday = $isSunday;

        return $this;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(?string $time): self
    {
        $this->time = $time;

        return $this;
    }
}

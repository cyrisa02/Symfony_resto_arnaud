<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(nullable: true)]
    private ?int $clientNumber = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $time = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isAllergy = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getClientNumber(): ?int
    {
        return $this->clientNumber;
    }

    public function setClientNumber(?int $clientNumber): self
    {
        $this->clientNumber = $clientNumber;

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

    public function isIsAllergy(): ?bool
    {
        return $this->isAllergy;
    }

    public function setIsAllergy(?bool $isAllergy): self
    {
        $this->isAllergy = $isAllergy;

        return $this;
    }
}

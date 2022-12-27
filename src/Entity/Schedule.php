<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScheduleRepository::class)]
class Schedule
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

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $evmonday = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $evtuesday = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $evwednesday = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $evthursday = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $evfriday = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $evsaturday = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $evsunday = null;

    
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

    public function getEvmonday(): ?string
    {
        return $this->evmonday;
    }

    public function setEvmonday(?string $evmonday): self
    {
        $this->evmonday = $evmonday;

        return $this;
    }

    public function getEvtuesday(): ?string
    {
        return $this->evtuesday;
    }

    public function setEvtuesday(?string $evtuesday): self
    {
        $this->evtuesday = $evtuesday;

        return $this;
    }

    public function getEvwednesday(): ?string
    {
        return $this->evwednesday;
    }

    public function setEvwednesday(?string $evwednesday): self
    {
        $this->evwednesday = $evwednesday;

        return $this;
    }

    public function getEvthursday(): ?string
    {
        return $this->evthursday;
    }

    public function setEvthursday(string $evthursday): self
    {
        $this->evthursday = $evthursday;

        return $this;
    }

    public function getEvfriday(): ?string
    {
        return $this->evfriday;
    }

    public function setEvfriday(?string $evfriday): self
    {
        $this->evfriday = $evfriday;

        return $this;
    }

    public function getEvsaturday(): ?string
    {
        return $this->evsaturday;
    }

    public function setEvsaturday(?string $evsaturday): self
    {
        $this->evsaturday = $evsaturday;

        return $this;
    }

    public function getEvsunday(): ?string
    {
        return $this->evsunday;
    }

    public function setEvsunday(?string $evsunday): self
    {
        $this->evsunday = $evsunday;

        return $this;
    }

    
}
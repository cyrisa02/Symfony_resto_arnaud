<?php

namespace App\Entity;

use App\Entity\Option;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\MenuRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 190)]
    private ?string $title = null;

    #[ORM\ManyToMany(targetEntity: Option::class, inversedBy: 'menus')]
    private Collection $option1;

    public function __construct()
    {
        $this->option1 = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<int, Option>
     */
    public function getOption1(): Collection
    {
        return $this->option1;
    }

    public function addOption1(Option $option1): self
    {
        if (!$this->option1->contains($option1)) {
            $this->option1->add($option1);
        }

        return $this;
    }

    public function removeOption1(Option $option1): self
    {
        $this->option1->removeElement($option1);

        return $this;
    }

    
}
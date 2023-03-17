<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $merk = null;

    #[ORM\Column(length: 255)]
    private ?string $color = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prijs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMerk(): ?string
    {
        return $this->merk;
    }

    public function setMerk(string $merk): self
    {
        $this->merk = $merk;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getPrijs(): ?string
    {
        return $this->prijs;
    }

    public function setPrijs(string $prijs): self
    {
        $this->prijs = $prijs;

        return $this;
    }
}

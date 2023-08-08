<?php

namespace App\Entity;

use App\Repository\AdvertisingPageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdvertisingPageRepository::class)]
class AdvertisingPage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'advertisingPages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Advertising $advertising = null;

    #[ORM\ManyToOne(inversedBy: 'advertisingPages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Page $page = null;

    #[ORM\Column]
    private ?int $position = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdvertising(): ?Advertising
    {
        return $this->advertising;
    }

    public function setAdvertising(?Advertising $advertising): static
    {
        $this->advertising = $advertising;

        return $this;
    }

    public function getPage(): ?Page
    {
        return $this->page;
    }

    public function setPage(?Page $page): static
    {
        $this->page = $page;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

        return $this;
    }
}

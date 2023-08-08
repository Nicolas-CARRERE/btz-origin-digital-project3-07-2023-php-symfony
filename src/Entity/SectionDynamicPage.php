<?php

namespace App\Entity;

use App\Repository\SectionDynamicPageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionDynamicPageRepository::class)]
class SectionDynamicPage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'sectionDynamicPages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SectionDynamic $sectionDynamic = null;

    #[ORM\ManyToOne(inversedBy: 'sectionDynamicPages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Page $page = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSectionDynamic(): ?SectionDynamic
    {
        return $this->sectionDynamic;
    }

    public function setSectionDynamic(?SectionDynamic $sectionDynamic): static
    {
        $this->sectionDynamic = $sectionDynamic;

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
}

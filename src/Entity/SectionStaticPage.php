<?php

namespace App\Entity;

use App\Repository\SectionStaticPageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionStaticPageRepository::class)]
class SectionStaticPage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'sectionStaticPages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SectionStatic $sectionStatic = null;

    #[ORM\ManyToOne(inversedBy: 'sectionStaticPages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Page $page = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSectionStatic(): ?SectionStatic
    {
        return $this->sectionStatic;
    }

    public function setSectionStatic(?SectionStatic $sectionStatic): static
    {
        $this->sectionStatic = $sectionStatic;

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

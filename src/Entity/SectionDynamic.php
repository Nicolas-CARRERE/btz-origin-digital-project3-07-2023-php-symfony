<?php

namespace App\Entity;

use App\Repository\SectionDynamicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionDynamicRepository::class)]
class SectionDynamic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $max = null;

    #[ORM\Column]
    private ?bool $isGrid = null;

    #[ORM\ManyToOne(inversedBy: 'sectionDynamics')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    #[ORM\OneToMany(mappedBy: 'sectionDynamic', targetEntity: SectionDynamicPage::class, orphanRemoval: true)]
    private Collection $sectionDynamicPages;

    public function __construct()
    {
        $this->sectionDynamicPages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMax(): ?int
    {
        return $this->max;
    }

    public function setMax(int $max): static
    {
        $this->max = $max;

        return $this;
    }

    public function isIsGrid(): ?bool
    {
        return $this->isGrid;
    }

    public function setIsGrid(bool $isGrid): static
    {
        $this->isGrid = $isGrid;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, SectionDynamicPage>
     */
    public function getSectionDynamicPages(): Collection
    {
        return $this->sectionDynamicPages;
    }

    public function addSectionDynamicPage(SectionDynamicPage $sectionDynamicPage): static
    {
        if (!$this->sectionDynamicPages->contains($sectionDynamicPage)) {
            $this->sectionDynamicPages->add($sectionDynamicPage);
            $sectionDynamicPage->setSectionDynamic($this);
        }

        return $this;
    }

    public function removeSectionDynamicPage(SectionDynamicPage $sectionDynamicPage): static
    {
        if ($this->sectionDynamicPages->removeElement($sectionDynamicPage)) {
            // set the owning side to null (unless already changed)
            if ($sectionDynamicPage->getSectionDynamic() === $this) {
                $sectionDynamicPage->setSectionDynamic(null);
            }
        }

        return $this;
    }
}

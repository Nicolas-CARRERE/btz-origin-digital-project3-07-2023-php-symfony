<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;


#[ApiResource]
#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Video::class, orphanRemoval: true)]
    private Collection $videos;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: SectionDynamic::class)]
    private Collection $sectionDynamics;

    public function __construct()
    {
        $this->videos = new ArrayCollection();
        $this->sectionDynamics = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Video>
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Video $video): static
    {
        if (!$this->videos->contains($video)) {
            $this->videos->add($video);
            $video->setCategory($this);
        }

        return $this;
    }

    public function removeVideo(Video $video): static
    {
        if ($this->videos->removeElement($video)) {
            // set the owning side to null (unless already changed)
            if ($video->getCategory() === $this) {
                $video->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SectionDynamic>
     */
    public function getSectionDynamics(): Collection
    {
        return $this->sectionDynamics;
    }

    public function addSectionDynamic(SectionDynamic $sectionDynamic): static
    {
        if (!$this->sectionDynamics->contains($sectionDynamic)) {
            $this->sectionDynamics->add($sectionDynamic);
            $sectionDynamic->setCategory($this);
        }

        return $this;
    }

    public function removeSectionDynamic(SectionDynamic $sectionDynamic): static
    {
        if ($this->sectionDynamics->removeElement($sectionDynamic)) {
            // set the owning side to null (unless already changed)
            if ($sectionDynamic->getCategory() === $this) {
                $sectionDynamic->setCategory(null);
            }
        }

        return $this;
    }
}

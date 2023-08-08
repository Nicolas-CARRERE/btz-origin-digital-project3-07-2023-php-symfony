<?php

namespace App\Entity;

use App\Repository\SectionStaticRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionStaticRepository::class)]
class SectionStatic
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
    private ?bool $isHero = null;

    #[ORM\OneToMany(mappedBy: 'sectionStatic', targetEntity: VideoSectionStatic::class, orphanRemoval: true)]
    private Collection $videos;

    public function __construct()
    {
        $this->videos = new ArrayCollection();
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

    public function isIsHero(): ?bool
    {
        return $this->isHero;
    }

    public function setIsHero(bool $isHero): static
    {
        $this->isHero = $isHero;

        return $this;
    }

    /**
     * @return Collection<int, VideoSectionStatic>
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(VideoSectionStatic $video): static
    {
        if (!$this->videos->contains($video)) {
            $this->videos->add($video);
            $video->setSectionStatic($this);
        }

        return $this;
    }

    public function removeVideo(VideoSectionStatic $video): static
    {
        if ($this->videos->removeElement($video)) {
            // set the owning side to null (unless already changed)
            if ($video->getSectionStatic() === $this) {
                $video->setSectionStatic(null);
            }
        }

        return $this;
    }
}

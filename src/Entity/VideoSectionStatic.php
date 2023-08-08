<?php

namespace App\Entity;

use App\Repository\VideoSectionStaticRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VideoSectionStaticRepository::class)]
class VideoSectionStatic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'sectionStatics')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Video $video = null;

    #[ORM\ManyToOne(inversedBy: 'videos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SectionStatic $sectionStatic = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVideo(): ?Video
    {
        return $this->video;
    }

    public function setVideo(?Video $video): static
    {
        $this->video = $video;

        return $this;
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
}

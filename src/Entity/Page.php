<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PageRepository::class)]
#[ApiResource]
class Page
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\OneToMany(mappedBy: 'page', targetEntity: AdvertisingPage::class, orphanRemoval: true)]
    private Collection $advertisingPages;

    #[ORM\OneToMany(mappedBy: 'page', targetEntity: SectionStaticPage::class, orphanRemoval: true)]
    private Collection $sectionStaticPages;

    #[ORM\OneToMany(mappedBy: 'page', targetEntity: SectionDynamicPage::class, orphanRemoval: true)]
    private Collection $sectionDynamicPages;

    public function __construct()
    {
        $this->advertisingPages = new ArrayCollection();
        $this->sectionStaticPages = new ArrayCollection();
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

    /**
     * @return Collection<int, AdvertisingPage>
     */
    public function getAdvertisingPages(): Collection
    {
        return $this->advertisingPages;
    }

    public function addAdvertisingPage(AdvertisingPage $advertisingPage): static
    {
        if (!$this->advertisingPages->contains($advertisingPage)) {
            $this->advertisingPages->add($advertisingPage);
            $advertisingPage->setPage($this);
        }

        return $this;
    }

    public function removeAdvertisingPage(AdvertisingPage $advertisingPage): static
    {
        if ($this->advertisingPages->removeElement($advertisingPage)) {
            // set the owning side to null (unless already changed)
            if ($advertisingPage->getPage() === $this) {
                $advertisingPage->setPage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SectionStaticPage>
     */
    public function getSectionStaticPages(): Collection
    {
        return $this->sectionStaticPages;
    }

    public function addSectionStaticPage(SectionStaticPage $sectionStaticPage): static
    {
        if (!$this->sectionStaticPages->contains($sectionStaticPage)) {
            $this->sectionStaticPages->add($sectionStaticPage);
            $sectionStaticPage->setPage($this);
        }

        return $this;
    }

    public function removeSectionStaticPage(SectionStaticPage $sectionStaticPage): static
    {
        if ($this->sectionStaticPages->removeElement($sectionStaticPage)) {
            // set the owning side to null (unless already changed)
            if ($sectionStaticPage->getPage() === $this) {
                $sectionStaticPage->setPage(null);
            }
        }

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
            $sectionDynamicPage->setPage($this);
        }

        return $this;
    }

    public function removeSectionDynamicPage(SectionDynamicPage $sectionDynamicPage): static
    {
        if ($this->sectionDynamicPages->removeElement($sectionDynamicPage)) {
            // set the owning side to null (unless already changed)
            if ($sectionDynamicPage->getPage() === $this) {
                $sectionDynamicPage->setPage(null);
            }
        }

        return $this;
    }
}

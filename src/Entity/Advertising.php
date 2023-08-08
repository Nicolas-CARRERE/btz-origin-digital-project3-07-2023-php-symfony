<?php

namespace App\Entity;

use App\Repository\AdvertisingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdvertisingRepository::class)]
class Advertising
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $imageUrl = null;

    #[ORM\Column(length: 255)]
    private ?string $linkTo = null;

    #[ORM\OneToMany(mappedBy: 'advertising', targetEntity: AdvertisingPage::class, orphanRemoval: true)]
    private Collection $advertisingPages;

    public function __construct()
    {
        $this->advertisingPages = new ArrayCollection();
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

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): static
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getLinkTo(): ?string
    {
        return $this->linkTo;
    }

    public function setLinkTo(string $linkTo): static
    {
        $this->linkTo = $linkTo;

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
            $advertisingPage->setAdvertising($this);
        }

        return $this;
    }

    public function removeAdvertisingPage(AdvertisingPage $advertisingPage): static
    {
        if ($this->advertisingPages->removeElement($advertisingPage)) {
            // set the owning side to null (unless already changed)
            if ($advertisingPage->getAdvertising() === $this) {
                $advertisingPage->setAdvertising(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'userRoleId', targetEntity: User::class)]
    private Collection $roleUsers;

    public function __construct()
    {
        $this->roleUsers = new ArrayCollection();
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
     * @return Collection<int, User>
     */
    public function getRoleUsers(): Collection
    {
        return $this->roleUsers;
    }

    public function addRoleUser(User $roleUser): static
    {
        if (!$this->roleUsers->contains($roleUser)) {
            $this->roleUsers->add($roleUser);
            $roleUser->setUserRoleId($this);
        }

        return $this;
    }

    public function removeRoleUser(User $roleUser): static
    {
        if ($this->roleUsers->removeElement($roleUser)) {
            // set the owning side to null (unless already changed)
            if ($roleUser->getUserRoleId() === $this) {
                $roleUser->setUserRoleId(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\ProBackgroundRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProBackgroundRepository::class)]
class ProBackground
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'proBackgrounds')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ProExperience $idProExperience = null;

    #[ORM\OneToOne(inversedBy: 'proBackground', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $idUser = null;

    #[ORM\OneToMany(mappedBy: 'idProBackground', targetEntity: LastExperience::class, orphanRemoval: true)]
    private Collection $lastExperiences;

    public function __construct()
    {
        $this->lastExperiences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProExperience(): ?ProExperience
    {
        return $this->idProExperience;
    }

    public function setIdProExperience(?ProExperience $idProExperience): static
    {
        $this->idProExperience = $idProExperience;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(User $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * @return Collection<int, LastExperience>
     */
    public function getLastExperiences(): Collection
    {
        return $this->lastExperiences;
    }

    public function addLastExperience(LastExperience $lastExperience): static
    {
        if (!$this->lastExperiences->contains($lastExperience)) {
            $this->lastExperiences->add($lastExperience);
            $lastExperience->setIdProBackground($this);
        }

        return $this;
    }

    public function removeLastExperience(LastExperience $lastExperience): static
    {
        if ($this->lastExperiences->removeElement($lastExperience)) {
            // set the owning side to null (unless already changed)
            if ($lastExperience->getIdProBackground() === $this) {
                $lastExperience->setIdProBackground(null);
            }
        }

        return $this;
    }
}

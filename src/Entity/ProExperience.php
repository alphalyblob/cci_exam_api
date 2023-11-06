<?php

namespace App\Entity;

use App\Repository\ProExperienceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProExperienceRepository::class)]
class ProExperience
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $label = null;

    #[ORM\OneToMany(mappedBy: 'idProExperience', targetEntity: ProBackground::class, orphanRemoval: true)]
    private Collection $proBackgrounds;

    public function __construct()
    {
        $this->proBackgrounds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection<int, ProBackground>
     */
    public function getProBackgrounds(): Collection
    {
        return $this->proBackgrounds;
    }

    public function addProBackground(ProBackground $proBackground): static
    {
        if (!$this->proBackgrounds->contains($proBackground)) {
            $this->proBackgrounds->add($proBackground);
            $proBackground->setIdProExperience($this);
        }

        return $this;
    }

    public function removeProBackground(ProBackground $proBackground): static
    {
        if ($this->proBackgrounds->removeElement($proBackground)) {
            // set the owning side to null (unless already changed)
            if ($proBackground->getIdProExperience() === $this) {
                $proBackground->setIdProExperience(null);
            }
        }

        return $this;
    }
}

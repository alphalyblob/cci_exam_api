<?php

namespace App\Entity;

use App\Repository\DiplomeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiplomeRepository::class)]
class Diplome
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $label = null;

    #[ORM\OneToMany(mappedBy: 'idDiploma', targetEntity: EducationalBackground::class, orphanRemoval: true)]
    private Collection $educationalBackgrounds;

    public function __construct()
    {
        $this->educationalBackgrounds = new ArrayCollection();
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
     * @return Collection<int, EducationalBackground>
     */
    public function getEducationalBackgrounds(): Collection
    {
        return $this->educationalBackgrounds;
    }

    public function addEducationalBackground(EducationalBackground $educationalBackground): static
    {
        if (!$this->educationalBackgrounds->contains($educationalBackground)) {
            $this->educationalBackgrounds->add($educationalBackground);
            $educationalBackground->setIdDiploma($this);
        }

        return $this;
    }

    public function removeEducationalBackground(EducationalBackground $educationalBackground): static
    {
        if ($this->educationalBackgrounds->removeElement($educationalBackground)) {
            // set the owning side to null (unless already changed)
            if ($educationalBackground->getIdDiploma() === $this) {
                $educationalBackground->setIdDiploma(null);
            }
        }

        return $this;
    }
}

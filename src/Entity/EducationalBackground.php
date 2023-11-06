<?php

namespace App\Entity;

use App\Repository\EducationalBackgroundRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducationalBackgroundRepository::class)]
class EducationalBackground
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'educationalBackgrounds')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Diploma $idDiploma = null;

    #[ORM\OneToOne(inversedBy: 'educationalBackground', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $idUser = null;

    #[ORM\OneToMany(mappedBy: 'idEducationalBackground', targetEntity: LastStudies::class, orphanRemoval: true)]
    private Collection $lastStudies;

    public function __construct()
    {
        $this->lastStudies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDiploma(): ?Diploma
    {
        return $this->idDiploma;
    }

    public function setIdDiploma(?Diploma $idDiploma): static
    {
        $this->idDiploma = $idDiploma;

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
     * @return Collection<int, LastStudies>
     */
    public function getLastStudies(): Collection
    {
        return $this->lastStudies;
    }

    public function addLastStudy(LastStudies $lastStudy): static
    {
        if (!$this->lastStudies->contains($lastStudy)) {
            $this->lastStudies->add($lastStudy);
            $lastStudy->setIdEducationalBackground($this);
        }

        return $this;
    }

    public function removeLastStudy(LastStudies $lastStudy): static
    {
        if ($this->lastStudies->removeElement($lastStudy)) {
            // set the owning side to null (unless already changed)
            if ($lastStudy->getIdEducationalBackground() === $this) {
                $lastStudy->setIdEducationalBackground(null);
            }
        }

        return $this;
    }
}

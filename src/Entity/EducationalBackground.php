<?php

namespace App\Entity;

use App\Repository\EducationalBackgroundRepository;
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
    private ?Diplome $idDiploma = null;

    #[ORM\OneToOne(inversedBy: 'educationalBackground', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $idUser = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDiploma(): ?Diplome
    {
        return $this->idDiploma;
    }

    public function setIdDiploma(?Diplome $idDiploma): static
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
}

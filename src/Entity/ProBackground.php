<?php

namespace App\Entity;

use App\Repository\ProBackgroundRepository;
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
}

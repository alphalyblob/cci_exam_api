<?php

namespace App\Entity;

use App\Repository\OpenQuestRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpenQuestRepository::class)]
class OpenQuest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'openQuests')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Question $idQuestion = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $correctionHint = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdQuestion(): ?Question
    {
        return $this->idQuestion;
    }

    public function setIdQuestion(?Question $idQuestion): static
    {
        $this->idQuestion = $idQuestion;

        return $this;
    }

    public function getCorrectionHint(): ?string
    {
        return $this->correctionHint;
    }

    public function setCorrectionHint(?string $correctionHint): static
    {
        $this->correctionHint = $correctionHint;

        return $this;
    }


}

<?php

namespace App\Entity;

use App\Repository\FillBlankQuestRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FillBlankQuestRepository::class)]
class FillBlankQuest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'fillBlankQuests')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Question $idQuestion = null;

    #[ORM\Column(length: 255)]
    private ?string $expectedValue = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $blankIdx = null;

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

    public function getExpectedValue(): ?string
    {
        return $this->expectedValue;
    }

    public function setExpectedValue(string $expectedValue): static
    {
        $this->expectedValue = $expectedValue;

        return $this;
    }

    public function getBlankIdx(): ?int
    {
        return $this->blankIdx;
    }

    public function setBlankIdx(int $blankIdx): static
    {
        $this->blankIdx = $blankIdx;

        return $this;
    }
}

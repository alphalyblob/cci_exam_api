<?php

namespace App\Entity;

use App\Repository\ExamRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamRepository::class)]
class Exam
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 80)]
    private ?string $label = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\ManyToOne(inversedBy: 'exams')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Session $idSession = null;

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

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getIdSession(): ?Session
    {
        return $this->idSession;
    }

    public function setIdSession(?Session $idSession): static
    {
        $this->idSession = $idSession;

        return $this;
    }
}

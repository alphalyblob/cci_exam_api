<?php

namespace App\Entity;

use App\Repository\ResultRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResultRepository::class)]
class Result
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'result', targetEntity: Answer::class, orphanRemoval: true)]
    private Collection $idAnswer;

    #[ORM\OneToOne(inversedBy: 'result', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Question $idQuestion = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isCorrect = null;

    public function __construct()
    {
        $this->idAnswer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Answer>
     */
    public function getIdAnswer(): Collection
    {
        return $this->idAnswer;
    }

    public function addIdAnswer(Answer $idAnswer): static
    {
        if (!$this->idAnswer->contains($idAnswer)) {
            $this->idAnswer->add($idAnswer);
            $idAnswer->setResult($this);
        }

        return $this;
    }

    public function removeIdAnswer(Answer $idAnswer): static
    {
        if ($this->idAnswer->removeElement($idAnswer)) {
            // set the owning side to null (unless already changed)
            if ($idAnswer->getResult() === $this) {
                $idAnswer->setResult(null);
            }
        }

        return $this;
    }

    public function getIdQuestion(): ?Question
    {
        return $this->idQuestion;
    }

    public function setIdQuestion(Question $idQuestion): static
    {
        $this->idQuestion = $idQuestion;

        return $this;
    }

    public function isIsCorrect(): ?bool
    {
        return $this->isCorrect;
    }

    public function setIsCorrect(?bool $isCorrect): static
    {
        $this->isCorrect = $isCorrect;

        return $this;
    }
}

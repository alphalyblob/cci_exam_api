<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'questions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Test $idTest = null;

    #[ORM\ManyToOne(inversedBy: 'questions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?QuestionType $idQuestionType = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $label = null;

    #[ORM\OneToMany(mappedBy: 'idQuestion', targetEntity: MultiChoiceQuest::class, orphanRemoval: true)]
    private Collection $multiChoiceQuests;

    #[ORM\OneToMany(mappedBy: 'idQuestion', targetEntity: FillBlankQuest::class, orphanRemoval: true)]
    private Collection $fillBlankQuests;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;



    public function __construct()
    {
        $this->multiChoiceQuests = new ArrayCollection();
        $this->fillBlankQuests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTest(): ?Test
    {
        return $this->idTest;
    }

    public function setIdTest(?Test $idTest): static
    {
        $this->idTest = $idTest;

        return $this;
    }

    public function getIdQuestionType(): ?QuestionType
    {
        return $this->idQuestionType;
    }

    public function setIdQuestionType(?QuestionType $idQuestionType): static
    {
        $this->idQuestionType = $idQuestionType;

        return $this;
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
     * @return Collection<int, MultiChoiceQuest>
     */
    public function getMultiChoiceQuests(): Collection
    {
        return $this->multiChoiceQuests;
    }

    public function addMultiChoiceQuest(MultiChoiceQuest $multiChoiceQuest): static
    {
        if (!$this->multiChoiceQuests->contains($multiChoiceQuest)) {
            $this->multiChoiceQuests->add($multiChoiceQuest);
            $multiChoiceQuest->setIdQuestion($this);
        }

        return $this;
    }

    public function removeMultiChoiceQuest(MultiChoiceQuest $multiChoiceQuest): static
    {
        if ($this->multiChoiceQuests->removeElement($multiChoiceQuest)) {
            // set the owning side to null (unless already changed)
            if ($multiChoiceQuest->getIdQuestion() === $this) {
                $multiChoiceQuest->setIdQuestion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FillBlankQuest>
     */
    public function getFillBlankQuests(): Collection
    {
        return $this->fillBlankQuests;
    }

    public function addFillBlankQuest(FillBlankQuest $fillBlankQuest): static
    {
        if (!$this->fillBlankQuests->contains($fillBlankQuest)) {
            $this->fillBlankQuests->add($fillBlankQuest);
            $fillBlankQuest->setIdQuestion($this);
        }

        return $this;
    }

    public function removeFillBlankQuest(FillBlankQuest $fillBlankQuest): static
    {
        if ($this->fillBlankQuests->removeElement($fillBlankQuest)) {
            // set the owning side to null (unless already changed)
            if ($fillBlankQuest->getIdQuestion() === $this) {
                $fillBlankQuest->setIdQuestion(null);
            }
        }

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }


}

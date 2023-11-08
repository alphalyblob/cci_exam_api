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

    #[ORM\OneToMany(mappedBy: 'idQuestion', targetEntity: MultiChoiceQuest::class, orphanRemoval: true, cascade:['persist'])]
    private Collection $multiChoiceQuests;

    #[ORM\OneToMany(mappedBy: 'idQuestion', targetEntity: FillBlankQuest::class, orphanRemoval: true)]
    private Collection $fillBlankQuests;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;

    #[ORM\OneToMany(mappedBy: 'idQuestion', targetEntity: OpenQuest::class)]
    private Collection $openQuests;

    #[ORM\OneToMany(mappedBy: 'idQuestion', targetEntity: Answer::class, orphanRemoval: true)]
    private Collection $answers;

    #[ORM\OneToOne(mappedBy: 'idQuestion', cascade: ['persist', 'remove'])]
    private ?Result $result = null;





    public function __construct()
    {
        $this->multiChoiceQuests = new ArrayCollection();
        $this->fillBlankQuests = new ArrayCollection();
        $this->openQuests = new ArrayCollection();
        $this->answers = new ArrayCollection();
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

    /**
     * @return Collection<int, OpenQuest>
     */
    public function getOpenQuests(): Collection
    {
        return $this->openQuests;
    }

    public function addOpenQuest(OpenQuest $openQuest): static
    {
        if (!$this->openQuests->contains($openQuest)) {
            $this->openQuests->add($openQuest);
            $openQuest->setIdQuestion($this);
        }

        return $this;
    }

    public function removeOpenQuest(OpenQuest $openQuest): static
    {
        if ($this->openQuests->removeElement($openQuest)) {
            // set the owning side to null (unless already changed)
            if ($openQuest->getIdQuestion() === $this) {
                $openQuest->setIdQuestion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Answer>
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function addAnswer(Answer $answer): static
    {
        if (!$this->answers->contains($answer)) {
            $this->answers->add($answer);
            $answer->setIdQuestion($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): static
    {
        if ($this->answers->removeElement($answer)) {
            // set the owning side to null (unless already changed)
            if ($answer->getIdQuestion() === $this) {
                $answer->setIdQuestion(null);
            }
        }

        return $this;
    }

    public function getResult(): ?Result
    {
        return $this->result;
    }

    public function setResult(Result $result): static
    {
        // set the owning side of the relation if necessary
        if ($result->getIdQuestion() !== $this) {
            $result->setIdQuestion($this);
        }

        $this->result = $result;

        return $this;
    }
    
    public function __toString()
    {
        return $this->label.' '.$this->content;
    }

}

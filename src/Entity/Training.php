<?php

namespace App\Entity;

use App\Repository\TrainingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrainingRepository::class)]
class Training
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 80)]
    private ?string $label = null;

    #[ORM\ManyToMany(targetEntity: TrainingCenter::class, inversedBy: 'trainings')]
    private Collection $idTrainingCenter;

    #[ORM\OneToMany(mappedBy: 'idTraining', targetEntity: Session::class, orphanRemoval: true)]
    private Collection $sessions;

    public function __construct()
    {
        $this->idTrainingCenter = new ArrayCollection();
        $this->sessions = new ArrayCollection();
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
     * @return Collection<int, TrainingCenter>
     */
    public function getIdTrainingCenter(): Collection
    {
        return $this->idTrainingCenter;
    }

    public function addIdTrainingCenter(TrainingCenter $idTrainingCenter): static
    {
        if (!$this->idTrainingCenter->contains($idTrainingCenter)) {
            $this->idTrainingCenter->add($idTrainingCenter);
        }

        return $this;
    }

    public function removeIdTrainingCenter(TrainingCenter $idTrainingCenter): static
    {
        $this->idTrainingCenter->removeElement($idTrainingCenter);

        return $this;
    }

    /**
     * @return Collection<int, Session>
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): static
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions->add($session);
            $session->setIdTraining($this);
        }

        return $this;
    }

    public function removeSession(Session $session): static
    {
        if ($this->sessions->removeElement($session)) {
            // set the owning side to null (unless already changed)
            if ($session->getIdTraining() === $this) {
                $session->setIdTraining(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->label;
    }
}

<?php

namespace App\Entity;

use ORM\Entity;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TeacherRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[Entity(repositoryClass: TeacherRepository::class)]
class Teacher
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\OneToMany(mappedBy: 'teacher', targetEntity: Classe::class)]
    private Collection $classe;

    public function __construct()
    {
        $this->classe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return Collection<int, Classe>
     */
    public function getClasse(): Collection
    {
        return $this->classe;
    }

    public function addClasse(Classe $classe): static
    {
        if (!$this->classe->contains($classe)) {
            $this->classe->add($classe);
            $classe->setTeacher($this);
        }

        return $this;
    }

    public function removeClasse(Classe $classe): static
    {
        if ($this->classe->removeElement($classe)) {
            // set the owning side to null (unless already changed)
            if ($classe->getTeacher() === $this) {
                $classe->setTeacher(null);
            }
        }

        return $this;
    }
}

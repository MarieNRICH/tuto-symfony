<?php

namespace App\Entity;

use ORM\Entity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ClasseRepository;

#[Entity(repositoryClass: ClasseRepository::class)]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameClasse = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\OneToOne(mappedBy: 'classe', cascade: ['persist', 'remove'])]
    private ?Student $students = null;

    #[ORM\ManyToOne(inversedBy: 'classe')]
    private ?Teacher $teacher = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameClasse(): ?string
    {
        return $this->nameClasse;
    }

    public function setNameClasse(string $nameClasse): static
    {
        $this->nameClasse = $nameClasse;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getStudents(): ?Student
    {
        return $this->students;
    }

    public function setStudents(?Student $students): static
    {
        // unset the owning side of the relation if necessary
        if ($students === null && $this->students !== null) {
            $this->students->setClasse(null);
        }

        // set the owning side of the relation if necessary
        if ($students !== null && $students->getClasse() !== $this) {
            $students->setClasse($this);
        }

        $this->students = $students;

        return $this;
    }

    public function getTeacher(): ?Teacher
    {
        return $this->teacher;
    }

    public function setTeacher(?Teacher $teacher): static
    {
        $this->teacher = $teacher;

        return $this;
    }
}

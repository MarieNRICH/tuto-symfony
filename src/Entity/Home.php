<?php

namespace App\Entity;

use ORM\Entity;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\HomeRepository;

#[Entity(repositoryClass: HomeRepository::class)]
class Home
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}

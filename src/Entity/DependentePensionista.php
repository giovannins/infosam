<?php

namespace App\Entity;

use App\Repository\DependentePensionistaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DependentePensionistaRepository::class)]
class DependentePensionista
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pessoa $pessoa = null;

    #[ORM\ManyToOne(inversedBy: 'dependentePensionistas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Policial $polical = null;

    #[ORM\Column(length: 20)]
    private ?string $status = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $matricula = null;

    #[ORM\Column(length: 20)]
    private ?string $parentesco = null;

    #[ORM\Column]
    private ?bool $pensionista = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPessoa(): ?Pessoa
    {
        return $this->pessoa;
    }

    public function setPessoa(Pessoa $pessoa): static
    {
        $this->pessoa = $pessoa;

        return $this;
    }

    public function getPolical(): ?Policial
    {
        return $this->polical;
    }

    public function setPolical(?Policial $polical): static
    {
        $this->polical = $polical;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getMatricula(): ?string
    {
        return $this->matricula;
    }

    public function setMatricula(?string $matricula): static
    {
        $this->matricula = $matricula;

        return $this;
    }

    public function getParentesco(): ?string
    {
        return $this->parentesco;
    }

    public function setParentesco(string $parentesco): static
    {
        $this->parentesco = $parentesco;

        return $this;
    }

    public function isPensionista(): ?bool
    {
        return $this->pensionista;
    }

    public function setPensionista(bool $pensionista): static
    {
        $this->pensionista = $pensionista;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\ContatoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContatoRepository::class)]
class Contato
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $telefone_residencial = null;

    #[ORM\Column(length: 20)]
    private ?string $telefone_celular = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $telefone_outro = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTelefoneResidencial(): ?string
    {
        return $this->telefone_residencial;
    }

    public function setTelefoneResidencial(?string $telefone_residencial): static
    {
        $this->telefone_residencial = $telefone_residencial;

        return $this;
    }

    public function getTelefoneCelular(): ?string
    {
        return $this->telefone_celular;
    }

    public function setTelefoneCelular(string $telefone_celular): static
    {
        $this->telefone_celular = $telefone_celular;

        return $this;
    }

    public function getTelefoneOutro(): ?string
    {
        return $this->telefone_outro;
    }

    public function setTelefoneOutro(?string $telefone_outro): static
    {
        $this->telefone_outro = $telefone_outro;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }
}

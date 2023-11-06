<?php

namespace App\Entity;

use App\Repository\ObservacoesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObservacoesRepository::class)]
class Observacoes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Pessoa::class, inversedBy: 'observacoes')]
    private Collection $pessoa;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $data = null;

    #[ORM\Column(length: 255)]
    private ?string $motivo = null;

    #[ORM\Column(length: 255)]
    private ?string $descricao = null;

    public function __construct()
    {
        $this->pessoa = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Pessoa>
     */
    public function getPessoa(): Collection
    {
        return $this->pessoa;
    }

    public function addPessoa(Pessoa $pessoa): static
    {
        if (!$this->pessoa->contains($pessoa)) {
            $this->pessoa->add($pessoa);
        }

        return $this;
    }

    public function removePessoa(Pessoa $pessoa): static
    {
        $this->pessoa->removeElement($pessoa);

        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): static
    {
        $this->data = $data;

        return $this;
    }

    public function getMotivo(): ?string
    {
        return $this->motivo;
    }

    public function setMotivo(string $motivo): static
    {
        $this->motivo = $motivo;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): static
    {
        $this->descricao = $descricao;

        return $this;
    }
}

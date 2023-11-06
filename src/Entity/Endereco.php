<?php

namespace App\Entity;

use App\Repository\EnderecoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnderecoRepository::class)]
class Endereco
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 8)]
    private ?string $cep = null;

    #[ORM\Column(length: 255)]
    private ?string $bairro = null;

    #[ORM\Column(length: 255)]
    private ?string $logradouro = null;

    #[ORM\Column(length: 255)]
    private ?string $municipio = null;

    #[ORM\OneToMany(mappedBy: 'endereco', targetEntity: Pessoa::class)]
    private Collection $pessoas;

    #[ORM\Column(length: 2)]
    private ?string $uf = null;

    public function __construct()
    {
        $this->pessoas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCep(): ?string
    {
        return $this->cep;
    }

    public function setCep(string $cep): static
    {
        $this->cep = $cep;

        return $this;
    }

    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    public function setBairro(string $bairro): static
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getLogradouro(): ?string
    {
        return $this->logradouro;
    }

    public function setLogradouro(string $logradouro): static
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    public function getMunicipio(): ?string
    {
        return $this->municipio;
    }

    public function setMunicipio(string $municipio): static
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * @return Collection<int, Pessoa>
     */
    public function getPessoas(): Collection
    {
        return $this->pessoas;
    }

    public function addPessoa(Pessoa $pessoa): static
    {
        if (!$this->pessoas->contains($pessoa)) {
            $this->pessoas->add($pessoa);
            $pessoa->setEndereco($this);
        }

        return $this;
    }

    public function removePessoa(Pessoa $pessoa): static
    {
        if ($this->pessoas->removeElement($pessoa)) {
            // set the owning side to null (unless already changed)
            if ($pessoa->getEndereco() === $this) {
                $pessoa->setEndereco(null);
            }
        }

        return $this;
    }

    public function getUf(): ?string
    {
        return $this->uf;
    }

    public function setUf(string $uf): static
    {
        $this->uf = $uf;

        return $this;
    }
}

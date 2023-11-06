<?php

namespace App\Entity;

use App\Repository\PessoaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoaRepository::class)]
class Pessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $data_nascimento = null;

    #[ORM\Column(length: 14)]
    private ?string $cpf = null;

    #[ORM\Column(length: 12, nullable: true)]
    private ?string $rg = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $rg_orgao_emissor = null;

    #[ORM\Column(length: 2, nullable: true)]
    private ?string $rg_uf = null;

    #[ORM\Column]
    private ?bool $sexo = null;

    #[ORM\ManyToOne(inversedBy: 'pessoas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Endereco $endereco = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $complemento = null;

    #[ORM\Column]
    private ?int $numero = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Contato $contato = null;

    #[ORM\Column(length: 255)]
    private ?string $estado_civil = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    public function getDataNascimento(): ?\DateTimeInterface
    {
        return $this->data_nascimento;
    }

    public function setDataNascimento(\DateTimeInterface $data_nascimento): static
    {
        $this->data_nascimento = $data_nascimento;

        return $this;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): static
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getRg(): ?string
    {
        return $this->rg;
    }

    public function setRg(?string $rg): static
    {
        $this->rg = $rg;

        return $this;
    }

    public function getRgOrgaoEmissor(): ?string
    {
        return $this->rg_orgao_emissor;
    }

    public function setRgOrgaoEmissor(?string $rg_orgao_emissor): static
    {
        $this->rg_orgao_emissor = $rg_orgao_emissor;

        return $this;
    }

    public function getRgUf(): ?string
    {
        return $this->rg_uf;
    }

    public function setRgUf(?string $rg_uf): static
    {
        $this->rg_uf = $rg_uf;

        return $this;
    }

    public function isSexo(): ?bool
    {
        return $this->sexo;
    }

    public function setSexo(bool $sexo): static
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getEndereco(): ?Endereco
    {
        return $this->endereco;
    }

    public function setEndereco(?Endereco $endereco): static
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    public function setComplemento(?string $complemento): static
    {
        $this->complemento = $complemento;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): static
    {
        $this->numero = $numero;

        return $this;
    }

    public function getContato(): ?Contato
    {
        return $this->contato;
    }

    public function setContato(Contato $contato): static
    {
        $this->contato = $contato;

        return $this;
    }

    public function getEstadoCivil(): ?string
    {
        return $this->estado_civil;
    }

    public function setEstadoCivil(string $estado_civil): static
    {
        $this->estado_civil = $estado_civil;

        return $this;
    }
}

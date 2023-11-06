<?php

namespace App\Entity;

use App\Repository\PolicialRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PolicialRepository::class)]
class Policial
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pessoa $pessoa = null;

    #[ORM\Column(length: 10)]
    private ?string $re = null;

    #[ORM\Column(length: 20)]
    private ?string $posto = null;

    #[ORM\Column(length: 20)]
    private ?string $status = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numero_spprev = null;

    #[ORM\OneToMany(mappedBy: 'polical', targetEntity: DependentePensionista::class)]
    private Collection $dependentePensionistas;

    public function __construct()
    {
        $this->dependentePensionistas = new ArrayCollection();
    }

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

    public function getRe(): ?string
    {
        return $this->re;
    }

    public function setRe(string $re): static
    {
        $this->re = $re;

        return $this;
    }

    public function getPosto(): ?string
    {
        return $this->posto;
    }

    public function setPosto(string $posto): static
    {
        $this->posto = $posto;

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

    public function getNumeroSpprev(): ?string
    {
        return $this->numero_spprev;
    }

    public function setNumeroSpprev(?string $numero_spprev): static
    {
        $this->numero_spprev = $numero_spprev;

        return $this;
    }

    /**
     * @return Collection<int, DependentePensionista>
     */
    public function getDependentePensionistas(): Collection
    {
        return $this->dependentePensionistas;
    }

    public function addDependentePensionista(DependentePensionista $dependentePensionista): static
    {
        if (!$this->dependentePensionistas->contains($dependentePensionista)) {
            $this->dependentePensionistas->add($dependentePensionista);
            $dependentePensionista->setPolical($this);
        }

        return $this;
    }

    public function removeDependentePensionista(DependentePensionista $dependentePensionista): static
    {
        if ($this->dependentePensionistas->removeElement($dependentePensionista)) {
            // set the owning side to null (unless already changed)
            if ($dependentePensionista->getPolical() === $this) {
                $dependentePensionista->setPolical(null);
            }
        }

        return $this;
    }
}

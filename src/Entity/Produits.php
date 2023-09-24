<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProduitsRepository;

#[ORM\Entity(repositoryClass: ProduitsRepository::class)]
#[ApiResource]
class Produits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $codeBarre = null;

    #[ORM\Column(length: 255, nullable: false)]
    private ?string $nom = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $typeA = null;

    #[ORM\Column(length: 50)]
    private ?string $ligne = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $sousFamille = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $COND = null;

    #[ORM\Column]
    private ?float $prixAchat = null;

    #[ORM\Column]
    private ?float $prixVente = null;

    #[ORM\Column]
    private ?int $stock = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getCodeBarre(): ?string
    {
        return $this->codeBarre;
    }

    public function setCodeBarre(?string $codeBarre): static
    {
        $this->codeBarre = $codeBarre;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTypeA(): ?string
    {
        return $this->typeA;
    }

    public function setTypeA(?string $typeA): static
    {
        $this->typeA = $typeA;

        return $this;
    }

    public function getLigne(): ?string
    {
        return $this->ligne;
    }

    public function setLigne(string $ligne): static
    {
        $this->ligne = $ligne;

        return $this;
    }

    public function getSousFamille(): ?string
    {
        return $this->sousFamille;
    }

    public function setSousFamille(?string $sousFamille): static
    {
        $this->sousFamille = $sousFamille;

        return $this;
    }

    public function getCOND(): ?string
    {
        return $this->COND;
    }

    public function setCOND(?string $COND): static
    {
        $this->COND = $COND;

        return $this;
    }

    public function getPrixAchat(): ?float
    {
        return $this->prixAchat;
    }

    public function setPrixAchat(float $prixAchat): static
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    public function getPrixVente(): ?float
    {
        return $this->prixVente;
    }

    public function setPrixVente(float $prixVente): static
    {
        $this->prixVente = $prixVente;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }
}

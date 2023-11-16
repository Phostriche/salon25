<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\ProduitsRepository;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProduitsRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'produits:item']),
        new GetCollection(normalizationContext: ['groups' => 'produits:list'])
    ],
   
    paginationEnabled: false,
)]
class Produits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
   
    private ?int $id = null;
    #[Groups(['produits:list', 'produits:item'])]

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $codeBarre = null;
    #[Groups(['produits:list', 'produits:item'])]

    #[ORM\Column(length: 255, nullable: false)]
    private ?string $nom = null;
    #[Groups(['produits:list', 'produits:item'])]

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $typeA = null;
    #[Groups(['produits:list', 'produits:item'])]
    #[ORM\Column(length: 50)]
    private ?string $ligne = null;
    #[Groups(['produits:list', 'produits:item'])]
    #[ORM\Column(length: 50, nullable: true)]
    private ?string $sousFamille = null;
    #[Groups(['produits:list', 'produits:item'])]
    #[ORM\Column(length: 32, nullable: true)]
    private ?string $COND = null;
    #[Groups(['produits:list', 'produits:item'])]
    #[ORM\Column]
    private ?float $prixAchat = null;
    #[Groups(['produits:list', 'produits:item'])]
    #[ORM\Column]
    private ?float $prixVente = null;
    #[Groups(['produits:list', 'produits:item'])]
    #[ORM\Column]
    private ?int $stock = null;
    #[Groups(['produits:list', 'produits:item'])]
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

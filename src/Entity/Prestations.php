<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\PrestationsRepository;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PrestationsRepository::class)]

#[ApiResource(
        operations: [
            new Get(normalizationContext: ['groups' => 'prestations:item']),
            new GetCollection(normalizationContext: ['groups' => 'prestations:list'])
        ],
       
        paginationEnabled: false,
    )]
class Prestations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[Groups(['prestations:list', 'prestations:item'])]

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $typeA = null;
    #[Groups(['prestations:list', 'prestations:item'])]

    #[ORM\Column(length: 255)]
    private ?string $nom = null;
    #[Groups(['prestations:list', 'prestations:item'])]

    #[ORM\Column]
    private ?float $prix = null;
    #[Groups(['prestations:list', 'prestations:item'])]

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }
}

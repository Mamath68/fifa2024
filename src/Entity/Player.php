<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $poste = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $biographie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pied = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $born_at = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lieu_de_naissance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pays_de_naissance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $taille = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    /**
     * @var Collection<int, Club>
     */
    #[ORM\ManyToMany(targetEntity: Club::class, inversedBy: 'players')]
    private Collection $club;

    public function __construct()
    {
        $this->club = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): static
    {
        $this->poste = $poste;

        return $this;
    }

    public function getBiographie(): ?string
    {
        return $this->biographie;
    }

    public function setBiographie(?string $biographie): static
    {
        $this->biographie = $biographie;

        return $this;
    }

    public function getPied(): ?string
    {
        return $this->pied;
    }

    public function setPied(?string $pied): static
    {
        $this->pied = $pied;

        return $this;
    }

    public function getBornAt(): ?\DateTimeImmutable
    {
        return $this->born_at;
    }

    public function setBornAt(?\DateTimeImmutable $born_at): static
    {
        $this->born_at = $born_at;

        return $this;
    }

    public function getLieuDeNaissance(): ?string
    {
        return $this->lieu_de_naissance;
    }

    public function setLieuDeNaissance(?string $lieu_de_naissance): static
    {
        $this->lieu_de_naissance = $lieu_de_naissance;

        return $this;
    }

    public function getPaysDeNaissance(): ?string
    {
        return $this->pays_de_naissance;
    }

    public function setPaysDeNaissance(?string $pays_de_naissance): static
    {
        $this->pays_de_naissance = $pays_de_naissance;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(?string $taille): static
    {
        $this->taille = $taille;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Club>
     */
    public function getClub(): Collection
    {
        return $this->club;
    }

    public function addClub(Club $club): static
    {
        if (!$this->club->contains($club)) {
            $this->club->add($club);
        }

        return $this;
    }

    public function removeClub(Club $club): static
    {
        $this->club->removeElement($club);

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $ref_bd;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $heros;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $titre;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $prix_public;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $prix_editeur;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $resume;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $ref_fournisseur;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $ref_editeur;

    /**
     * @ORM\ManyToOne(targetEntity=Auteur::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $auteur;

    /**
     * @ORM\ManyToOne(targetEntity=Genre::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $genre;

    /**
     * @ORM\ManyToOne(targetEntity=Fournisseur::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $fournisseur;

    /**
     * @ORM\ManyToOne(targetEntity=Editeur::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $editeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefBd(): ?string
    {
        return $this->ref_bd;
    }

    public function setRefBd(string $ref_bd): self
    {
        $this->ref_bd = $ref_bd;

        return $this;
    }

    public function getHeros(): ?string
    {
        return $this->heros;
    }

    public function setHeros(?string $heros): self
    {
        $this->heros = $heros;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPrixPublic(): ?string
    {
        return $this->prix_public;
    }

    public function setPrixPublic(string $prix_public): self
    {
        $this->prix_public = $prix_public;

        return $this;
    }

    public function getPrixEditeur(): ?string
    {
        return $this->prix_editeur;
    }

    public function setPrixEditeur(string $prix_editeur): self
    {
        $this->prix_editeur = $prix_editeur;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(?string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getRefFournisseur(): ?string
    {
        return $this->ref_fournisseur;
    }

    public function setRefFournisseur(?string $ref_fournisseur): self
    {
        $this->ref_fournisseur = $ref_fournisseur;

        return $this;
    }

    public function getRefEditeur(): ?string
    {
        return $this->ref_editeur;
    }

    public function setRefEditeur(?string $ref_editeur): self
    {
        $this->ref_editeur = $ref_editeur;

        return $this;
    }

    public function getAuteur(): ?Auteur
    {
        return $this->auteur;
    }

    public function setAuteur(?Auteur $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getEditeur(): ?Editeur
    {
        return $this->editeur;
    }

    public function setEditeur(?Editeur $editeur): self
    {
        $this->editeur = $editeur;

        return $this;
    }
}

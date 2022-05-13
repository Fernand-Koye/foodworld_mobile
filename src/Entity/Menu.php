<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Menu
 *
 * @ORM\Table(name="menu")
 * @ORM\Entity
 */
class Menu
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("post:read")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=256, nullable=false)
     * @Groups("post:read")
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     * @Groups("post:read")
     */
    private $quantite;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     * @Groups("post:read")
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="imgSrc", type="string", length=256, nullable=true)
     * @Groups("post:read")
     */
    private $imgsrc;

    /**
     * @var string
     *
     * @ORM\Column(name="saison", type="string", length=256, nullable=true)
     */
    private $saison;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_mise_en_rayon", type="date", nullable=false)
     */
    private $dateMiseEnRayon;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_peremption", type="date", nullable=false)
     */
    private $datePeremption;

    /**
     * @var int
     *
     * @ORM\Column(name="id_restaurant", type="integer", nullable=false)
     * @Groups("post:read")
     */
    private $idRestaurant;

    /**
     * @var int|null
     *
     * @ORM\Column(name="like_menu", type="integer", nullable=true)
     */
    private $likeMenu;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dislike_menu", type="integer", nullable=true)
     */
    private $dislikeMenu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getImgsrc(): ?string
    {
        return $this->imgsrc;
    }

    public function setImgsrc(string $imgsrc): self
    {
        $this->imgsrc = $imgsrc;

        return $this;
    }

    public function getSaison(): ?string
    {
        return $this->saison;
    }

    public function setSaison(string $saison): self
    {
        $this->saison = $saison;

        return $this;
    }

    public function getDateMiseEnRayon(): ?\DateTimeInterface
    {
        return $this->dateMiseEnRayon;
    }

    public function setDateMiseEnRayon(\DateTimeInterface $dateMiseEnRayon): self
    {
        $this->dateMiseEnRayon = $dateMiseEnRayon;

        return $this;
    }

    public function getDatePeremption(): ?\DateTimeInterface
    {
        return $this->datePeremption;
    }

    public function setDatePeremption(\DateTimeInterface $datePeremption): self
    {
        $this->datePeremption = $datePeremption;

        return $this;
    }

    public function getIdRestaurant(): ?int
    {
        return $this->idRestaurant;
    }

    public function setIdRestaurant(int $idRestaurant): self
    {
        $this->idRestaurant = $idRestaurant;

        return $this;
    }

    public function getLikeMenu(): ?int
    {
        return $this->likeMenu;
    }

    public function setLikeMenu(?int $likeMenu): self
    {
        $this->likeMenu = $likeMenu;

        return $this;
    }

    public function getDislikeMenu(): ?int
    {
        return $this->dislikeMenu;
    }

    public function setDislikeMenu(?int $dislikeMenu): self
    {
        $this->dislikeMenu = $dislikeMenu;

        return $this;
    }


}

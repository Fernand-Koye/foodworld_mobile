<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Restaurant
 *
 * @ORM\Table(name="restaurant")
 * @ORM\Entity
 */
class Restaurant
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
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=256, nullable=false)
     * @Groups("post:read")
     */
    private $position;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_entrer", type="date", nullable=true)
     * @Groups("post:read")
     */
    private $dateEntrer;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=256, nullable=false)
     * @Groups("post:read")
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="gerant_restaurant", type="string", length=256, nullable=false)
     * @Groups("post:read")
     */
    private $gerantRestaurant;

    /**
     * @var int|null
     *
     * @ORM\Column(name="like_restaurant", type="integer", nullable=true)
     * @Groups("post:read")
     */
    private $likeRestaurant;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dislike_restaurant", type="integer", nullable=true)
     * @Groups("post:read")
     */
    private $dislikeRestaurant;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_Client", type="integer", nullable=true)
     * @Groups("post:read")
     */
    private $idClient;

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

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getDateEntrer(): ?\DateTimeInterface
    {
        return $this->dateEntrer;
    }

    public function setDateEntrer(\DateTimeInterface $dateEntrer): self
    {
        $this->dateEntrer = $dateEntrer;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getGerantRestaurant(): ?string
    {
        return $this->gerantRestaurant;
    }

    public function setGerantRestaurant(string $gerantRestaurant): self
    {
        $this->gerantRestaurant = $gerantRestaurant;

        return $this;
    }

    public function getLikeRestaurant(): ?int
    {
        return $this->likeRestaurant;
    }

    public function setLikeRestaurant(?int $likeRestaurant): self
    {
        $this->likeRestaurant = $likeRestaurant;

        return $this;
    }

    public function getDislikeRestaurant(): ?int
    {
        return $this->dislikeRestaurant;
    }

    public function setDislikeRestaurant(?int $dislikeRestaurant): self
    {
        $this->dislikeRestaurant = $dislikeRestaurant;

        return $this;
    }

    public function getIdClient(): ?int
    {
        return $this->idClient;
    }

    public function setIdClient(?int $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }


}

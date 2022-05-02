<?php

namespace App\Core\Entity;

use App\Adverts\Entity\Advert;
use App\Users\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdvRatings
 *
 * @ORM\Table(name="adv_ratings", indexes={@ORM\Index(name="hash_advert", columns={"hash_advert"}), @ORM\Index(name="hash_author", columns={"hash_author"}), @ORM\Index(name="date_added", columns={"date_added"}), @ORM\Index(name="id_lang", columns={"id_lang"}), @ORM\Index(name="hash_user", columns={"hash_user"})})
 * @ORM\Entity
 */
class AdvRatings
{
    /**
     * @var int
     *
     * @ORM\Column(name="mark", type="smallint", nullable=false)
     */
    private $mark;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=500, nullable=false)
     */
    private $comment;

    /**
     * @var int
     *
     * @ORM\Column(name="date_added", type="integer", nullable=false)
     */
    private $dateAdded;

    /**
     * @var User
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Users\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hash_user", referencedColumnName="hash")
     * })
     */
    private $hashUser;

    /**
     * @var Advert
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Adverts\Entity\Advert")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hash_advert", referencedColumnName="hash")
     * })
     */
    private $hashAdvert;

    /**
     * @var User
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Users\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hash_author", referencedColumnName="hash")
     * })
     */
    private $hashAuthor;

    /**
     * @var Lang
     *
     * @ORM\ManyToOne(targetEntity="Lang")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_lang", referencedColumnName="id")
     * })
     */
    private $idLang;

    public function getMark(): ?int
    {
        return $this->mark;
    }

    public function setMark(int $mark): self
    {
        $this->mark = $mark;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getDateAdded(): ?int
    {
        return $this->dateAdded;
    }

    public function setDateAdded(int $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    public function getHashUser(): ?User
    {
        return $this->hashUser;
    }

    public function setHashUser(?User $hashUser): self
    {
        $this->hashUser = $hashUser;

        return $this;
    }

    public function getHashAdvert(): ?Advert
    {
        return $this->hashAdvert;
    }

    public function setHashAdvert(?Advert $hashAdvert): self
    {
        $this->hashAdvert = $hashAdvert;

        return $this;
    }

    public function getHashAuthor(): ?User
    {
        return $this->hashAuthor;
    }

    public function setHashAuthor(?User $hashAuthor): self
    {
        $this->hashAuthor = $hashAuthor;

        return $this;
    }

    public function getIdLang(): ?Lang
    {
        return $this->idLang;
    }

    public function setIdLang(?Lang $idLang): self
    {
        $this->idLang = $idLang;

        return $this;
    }


}

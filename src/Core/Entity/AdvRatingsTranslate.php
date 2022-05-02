<?php

namespace App\Core\Entity;

use App\Adverts\Entity\Advert;
use App\Users\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdvRatingsTranslate
 *
 * @ORM\Table(name="adv_ratings_translate", indexes={@ORM\Index(name="hash_user", columns={"hash_user"}), @ORM\Index(name="hash_advert", columns={"hash_advert"}), @ORM\Index(name="id_lang", columns={"id_lang"}), @ORM\Index(name="IDX_F94E57CEAC650DF4", columns={"hash_author"})})
 * @ORM\Entity
 */
class AdvRatingsTranslate
{
    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=1000, nullable=false)
     */
    private $comment = '';

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
     * @var Lang
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Lang")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_lang", referencedColumnName="id")
     * })
     */
    private $idLang;

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

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

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

    public function getIdLang(): ?Lang
    {
        return $this->idLang;
    }

    public function setIdLang(?Lang $idLang): self
    {
        $this->idLang = $idLang;

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

    public function getHashAdvert(): ?Advert
    {
        return $this->hashAdvert;
    }

    public function setHashAdvert(?Advert $hashAdvert): self
    {
        $this->hashAdvert = $hashAdvert;

        return $this;
    }


}

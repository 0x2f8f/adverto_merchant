<?php

namespace App\Core\Entity;

use App\Users\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdvPartnersCompShedule
 *
 * @ORM\Table(name="adv_partners_comp_shedule", indexes={@ORM\Index(name="currency", columns={"currency"}), @ORM\Index(name="user_hash", columns={"user_hash"}), @ORM\Index(name="id_lang", columns={"id_lang"}), @ORM\Index(name="id_lang_additional", columns={"id_lang_additional"})})
 * @ORM\Entity
 */
class AdvPartnersCompShedule
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="namespace", type="string", length=50, nullable=false, options={"comment"="Имя класса для вызова"})
     */
    private $namespace;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=500, nullable=false, options={"comment"="Полный URL к API"})
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="parce_hours", type="string", length=0, nullable=false, options={"comment"="Количество раз запуска парсера в сутки"})
     */
    private $parceHours;

    /**
     * @var string
     *
     * @ORM\Column(name="site", type="string", length=255, nullable=false)
     */
    private $site;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var Lang
     *
     * @ORM\ManyToOne(targetEntity="Lang")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_lang", referencedColumnName="id")
     * })
     */
    private $idLang;

    /**
     * @var Currency
     *
     * @ORM\ManyToOne(targetEntity="Currency")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="currency", referencedColumnName="id")
     * })
     */
    private $currency;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Users\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_hash", referencedColumnName="hash")
     * })
     */
    private $userHash;

    /**
     * @var Lang
     *
     * @ORM\ManyToOne(targetEntity="Lang")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_lang_additional", referencedColumnName="id")
     * })
     */
    private $idLangAdditional;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamespace(): ?string
    {
        return $this->namespace;
    }

    public function setNamespace(string $namespace): self
    {
        $this->namespace = $namespace;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getParceHours(): ?string
    {
        return $this->parceHours;
    }

    public function setParceHours(string $parceHours): self
    {
        $this->parceHours = $parceHours;

        return $this;
    }

    public function getSite(): ?string
    {
        return $this->site;
    }

    public function setSite(string $site): self
    {
        $this->site = $site;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function setCurrency(?Currency $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getUserHash(): ?User
    {
        return $this->userHash;
    }

    public function setUserHash(?User $userHash): self
    {
        $this->userHash = $userHash;

        return $this;
    }

    public function getIdLangAdditional(): ?Lang
    {
        return $this->idLangAdditional;
    }

    public function setIdLangAdditional(?Lang $idLangAdditional): self
    {
        $this->idLangAdditional = $idLangAdditional;

        return $this;
    }


}

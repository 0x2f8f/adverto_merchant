<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvAdvertisersBanners
 *
 * @ORM\Table(name="adv_advertisers_banners", uniqueConstraints={@ORM\UniqueConstraint(name="id_advertiser", columns={"id_advertiser", "id_lang"})}, indexes={@ORM\Index(name="id_lang", columns={"id_lang"}), @ORM\Index(name="IDX_FE978E9736BBA7A5", columns={"id_advertiser"})})
 * @ORM\Entity
 */
class AdvAdvertisersBanners
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
     * @var string|null
     *
     * @ORM\Column(name="alt", type="string", length=255, nullable=true)
     */
    private $alt;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled;

    /**
     * @var int
     *
     * @ORM\Column(name="count_views", type="integer", nullable=false)
     */
    private $countViews = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="count_redirect", type="integer", nullable=false)
     */
    private $countRedirect = '0';

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
     * @var AdvAdvertisers
     *
     * @ORM\ManyToOne(targetEntity="AdvAdvertisers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_advertiser", referencedColumnName="id")
     * })
     */
    private $idAdvertiser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(?string $alt): self
    {
        $this->alt = $alt;

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

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getCountViews(): ?int
    {
        return $this->countViews;
    }

    public function setCountViews(int $countViews): self
    {
        $this->countViews = $countViews;

        return $this;
    }

    public function getCountRedirect(): ?int
    {
        return $this->countRedirect;
    }

    public function setCountRedirect(int $countRedirect): self
    {
        $this->countRedirect = $countRedirect;

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

    public function getIdAdvertiser(): ?AdvAdvertisers
    {
        return $this->idAdvertiser;
    }

    public function setIdAdvertiser(?AdvAdvertisers $idAdvertiser): self
    {
        $this->idAdvertiser = $idAdvertiser;

        return $this;
    }


}

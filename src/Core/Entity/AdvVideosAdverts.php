<?php

namespace App\Core\Entity;

use App\Adverts\Entity\Advert;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdvVideosAdverts
 *
 * @ORM\Table(name="adv_videos_adverts", indexes={@ORM\Index(name="adv_videos_adverts_id_adv_fk1", columns={"id_adv"})})
 * @ORM\Entity
 */
class AdvVideosAdverts
{
    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=24, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $hash;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=100, nullable=false)
     */
    private $url;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sort", type="smallint", nullable=true)
     */
    private $sort = '0';

    /**
     * @var Advert
     *
     * @ORM\ManyToOne(targetEntity="App\Adverts\Entity\Advert")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_adv", referencedColumnName="id")
     * })
     */
    private $idAdv;

    public function getHash(): ?string
    {
        return $this->hash;
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

    public function getSort(): ?int
    {
        return $this->sort;
    }

    public function setSort(?int $sort): self
    {
        $this->sort = $sort;

        return $this;
    }

    public function getIdAdv(): ?Advert
    {
        return $this->idAdv;
    }

    public function setIdAdv(?Advert $idAdv): self
    {
        $this->idAdv = $idAdv;

        return $this;
    }


}

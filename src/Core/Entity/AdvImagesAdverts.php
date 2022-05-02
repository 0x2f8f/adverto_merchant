<?php

namespace App\Core\Entity;

use App\Adverts\Entity\Advert;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdvImagesAdverts
 *
 * @ORM\Table(name="adv_images_adverts", indexes={@ORM\Index(name="id_adv", columns={"id_adv"})})
 * @ORM\Entity
 */
class AdvImagesAdverts
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
     * @var int
     *
     * @ORM\Column(name="sort", type="smallint", nullable=false)
     */
    private $sort = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="width", type="smallint", nullable=false)
     */
    private $width = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="height", type="smallint", nullable=false)
     */
    private $height = '0';

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

    public function setSort(int $sort): self
    {
        $this->sort = $sort;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

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

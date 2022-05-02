<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvMetroLines
 *
 * @ORM\Table(name="adv_metro_lines", indexes={@ORM\Index(name="id_metro", columns={"id_metro"})})
 * @ORM\Entity
 */
class AdvMetroLines
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
     * @ORM\Column(name="name_local", type="string", length=200, nullable=false)
     */
    private $nameLocal;

    /**
     * @var string
     *
     * @ORM\Column(name="name_translit", type="string", length=255, nullable=false)
     */
    private $nameTranslit;

    /**
     * @var string
     *
     * @ORM\Column(name="hex_color", type="string", length=6, nullable=false)
     */
    private $hexColor;

    /**
     * @var \AdvMetro
     *
     * @ORM\ManyToOne(targetEntity="AdvMetro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_metro", referencedColumnName="id")
     * })
     */
    private $idMetro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameLocal(): ?string
    {
        return $this->nameLocal;
    }

    public function setNameLocal(string $nameLocal): self
    {
        $this->nameLocal = $nameLocal;

        return $this;
    }

    public function getNameTranslit(): ?string
    {
        return $this->nameTranslit;
    }

    public function setNameTranslit(string $nameTranslit): self
    {
        $this->nameTranslit = $nameTranslit;

        return $this;
    }

    public function getHexColor(): ?string
    {
        return $this->hexColor;
    }

    public function setHexColor(string $hexColor): self
    {
        $this->hexColor = $hexColor;

        return $this;
    }

    public function getIdMetro(): ?AdvMetro
    {
        return $this->idMetro;
    }

    public function setIdMetro(?AdvMetro $idMetro): self
    {
        $this->idMetro = $idMetro;

        return $this;
    }


}

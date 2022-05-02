<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvMetroStations
 *
 * @ORM\Table(name="adv_metro_stations", indexes={@ORM\Index(name="id_line", columns={"id_line"})})
 * @ORM\Entity
 */
class AdvMetroStations
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
     * @var int
     *
     * @ORM\Column(name="line_order", type="integer", nullable=false)
     */
    private $lineOrder;

    /**
     * @var string
     *
     * @ORM\Column(name="name_local", type="string", length=100, nullable=false)
     */
    private $nameLocal;

    /**
     * @var string
     *
     * @ORM\Column(name="name_translit", type="string", length=255, nullable=false)
     */
    private $nameTranslit;

    /**
     * @var point
     *
     * @ORM\Column(name="gps", type="point", nullable=false)
     */
    private $gps;

    /**
     * @var \AdvMetroLines
     *
     * @ORM\ManyToOne(targetEntity="AdvMetroLines")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_line", referencedColumnName="id")
     * })
     */
    private $idLine;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLineOrder(): ?int
    {
        return $this->lineOrder;
    }

    public function setLineOrder(int $lineOrder): self
    {
        $this->lineOrder = $lineOrder;

        return $this;
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

    public function getGps()
    {
        return $this->gps;
    }

    public function setGps($gps): self
    {
        $this->gps = $gps;

        return $this;
    }

    public function getIdLine(): ?AdvMetroLines
    {
        return $this->idLine;
    }

    public function setIdLine(?AdvMetroLines $idLine): self
    {
        $this->idLine = $idLine;

        return $this;
    }


}

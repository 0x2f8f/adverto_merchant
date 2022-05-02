<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Currency
 *
 * @ORM\Table(name="adv_currencies", uniqueConstraints={@ORM\UniqueConstraint(name="code_3", columns={"code"})})
 * @ORM\Entity
 */
class Currency
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=3, nullable=false, options={"fixed"=true})
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="symbol", type="string", length=3, nullable=false, options={"fixed"=true})
     */
    private $symbol;

    /**
     * @var string|null
     *
     * @ORM\Column(name="symbol_html", type="string", length=10, nullable=true)
     */
    private $symbolHtml;

    /**
     * @var int|null
     *
     * @ORM\Column(name="symbol_place", type="integer", nullable=true, options={"default"="2","comment"="Место, где должен стоять знак валюты (1 - до цены, 2 - после цены)"})
     */
    private $symbolPlace = 2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    public function setSymbol(string $symbol): self
    {
        $this->symbol = $symbol;

        return $this;
    }

    public function getSymbolHtml(): ?string
    {
        return $this->symbolHtml;
    }

    public function setSymbolHtml(?string $symbolHtml): self
    {
        $this->symbolHtml = $symbolHtml;

        return $this;
    }

    public function getSymbolPlace(): ?int
    {
        return $this->symbolPlace;
    }

    public function setSymbolPlace(?int $symbolPlace): self
    {
        $this->symbolPlace = $symbolPlace;

        return $this;
    }


}

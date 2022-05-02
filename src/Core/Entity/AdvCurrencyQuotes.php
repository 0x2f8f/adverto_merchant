<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvCurrencyQuotes
 *
 * @ORM\Table(name="adv_currency_quotes")
 * @ORM\Entity
 */
class AdvCurrencyQuotes
{
    /**
     * @var float
     *
     * @ORM\Column(name="quote", type="float", precision=10, scale=0, nullable=false)
     */
    private $quote;

    /**
     * @var Currency
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Currency")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_currency", referencedColumnName="id")
     * })
     */
    private $idCurrency;

    public function getQuote(): ?float
    {
        return $this->quote;
    }

    public function setQuote(float $quote): self
    {
        $this->quote = $quote;

        return $this;
    }

    public function getIdCurrency(): ?Currency
    {
        return $this->idCurrency;
    }

    public function setIdCurrency(?Currency $idCurrency): self
    {
        $this->idCurrency = $idCurrency;

        return $this;
    }


}

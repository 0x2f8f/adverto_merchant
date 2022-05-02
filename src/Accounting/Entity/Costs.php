<?php

namespace App\Accounting\Entity;

use App\Core\Entity\AdvServices;
use App\Core\Entity\Country;
use Doctrine\ORM\Mapping as ORM;

/**
 * Costs
 *
 * @ORM\Table(name="adv_costs", indexes={@ORM\Index(name="id_service", columns={"id_service"}), @ORM\Index(name="id_country", columns={"id_country"})})
 * @ORM\Entity
 */
class Costs
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
     * @var float
     *
     * @ORM\Column(name="cost_money", type="float", precision=10, scale=0, nullable=false)
     */
    private $costMoney = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="cost_bonus", type="integer", nullable=false)
     */
    private $costBonus;

    /**
     * @var bool
     *
     * @ORM\Column(name="period", type="boolean", nullable=false)
     */
    private $period = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="comment", type="string", length=512, nullable=true, options={"comment"="Коммент"})
     */
    private $comment;

    /**
     * @var Country
     *
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_country", referencedColumnName="iso")
     * })
     */
    private $idCountry;

    /**
     * @var AdvServices
     *
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\AdvServices")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_service", referencedColumnName="id")
     * })
     */
    private $idService;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCostMoney(): ?float
    {
        return $this->costMoney;
    }

    public function setCostMoney(float $costMoney): self
    {
        $this->costMoney = $costMoney;

        return $this;
    }

    public function getCostBonus(): ?int
    {
        return $this->costBonus;
    }

    public function setCostBonus(int $costBonus): self
    {
        $this->costBonus = $costBonus;

        return $this;
    }

    public function getPeriod(): ?bool
    {
        return $this->period;
    }

    public function setPeriod(bool $period): self
    {
        $this->period = $period;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getIdCountry(): ?Country
    {
        return $this->idCountry;
    }

    public function setIdCountry(?Country $idCountry): self
    {
        $this->idCountry = $idCountry;

        return $this;
    }

    public function getIdService(): ?AdvServices
    {
        return $this->idService;
    }

    public function setIdService(?AdvServices $idService): self
    {
        $this->idService = $idService;

        return $this;
    }


}

<?php

namespace App\Users\Entity;

use App\Core\Entity\AdvServicesDelivery;
use Doctrine\ORM\Mapping as ORM;

/**
 * UserServicesDelivery
 *
 * @ORM\Table(name="adv_user_services_delivery", indexes={@ORM\Index(name="index_delivery_id", columns={"delivery_id"}), @ORM\Index(name="index_user_hash", columns={"user_hash"})})
 * @ORM\Entity
 */
class UserServicesDelivery
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="add_weight", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $addWeight = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="add_days", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $addDays = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="add_fix_value", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $addFixValue = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="add_tariff_value_percent", type="boolean", nullable=false)
     */
    private $addTariffValuePercent = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="add_payment_value_percent", type="boolean", nullable=false)
     */
    private $addPaymentValuePercent = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="add_declared_value_percent", type="boolean", nullable=false)
     */
    private $addDeclaredValuePercent = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="round", type="boolean", nullable=false, options={"comment"="0 - Wo rounding, 1 - To the whole-number, 2 - To the tenths, 3 - To the hundredths"})
     */
    private $round = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="round_type", type="boolean", nullable=false, options={"comment"="0 - ceiling, 1 - round half up"})
     */
    private $roundType = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="min_value", type="integer", nullable=false)
     */
    private $minValue = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="max_value", type="integer", nullable=false)
     */
    private $maxValue = '0';

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_hash", referencedColumnName="hash")
     * })
     */
    private $userHash;

    /**
     * @var AdvServicesDelivery
     *
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\AdvServicesDelivery")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="delivery_id", referencedColumnName="id")
     * })
     */
    private $delivery;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddWeight(): ?int
    {
        return $this->addWeight;
    }

    public function setAddWeight(int $addWeight): self
    {
        $this->addWeight = $addWeight;

        return $this;
    }

    public function getAddDays(): ?int
    {
        return $this->addDays;
    }

    public function setAddDays(int $addDays): self
    {
        $this->addDays = $addDays;

        return $this;
    }

    public function getAddFixValue(): ?int
    {
        return $this->addFixValue;
    }

    public function setAddFixValue(int $addFixValue): self
    {
        $this->addFixValue = $addFixValue;

        return $this;
    }

    public function getAddTariffValuePercent(): ?bool
    {
        return $this->addTariffValuePercent;
    }

    public function setAddTariffValuePercent(bool $addTariffValuePercent): self
    {
        $this->addTariffValuePercent = $addTariffValuePercent;

        return $this;
    }

    public function getAddPaymentValuePercent(): ?bool
    {
        return $this->addPaymentValuePercent;
    }

    public function setAddPaymentValuePercent(bool $addPaymentValuePercent): self
    {
        $this->addPaymentValuePercent = $addPaymentValuePercent;

        return $this;
    }

    public function getAddDeclaredValuePercent(): ?bool
    {
        return $this->addDeclaredValuePercent;
    }

    public function setAddDeclaredValuePercent(bool $addDeclaredValuePercent): self
    {
        $this->addDeclaredValuePercent = $addDeclaredValuePercent;

        return $this;
    }

    public function getRound(): ?bool
    {
        return $this->round;
    }

    public function setRound(bool $round): self
    {
        $this->round = $round;

        return $this;
    }

    public function getRoundType(): ?bool
    {
        return $this->roundType;
    }

    public function setRoundType(bool $roundType): self
    {
        $this->roundType = $roundType;

        return $this;
    }

    public function getMinValue(): ?int
    {
        return $this->minValue;
    }

    public function setMinValue(int $minValue): self
    {
        $this->minValue = $minValue;

        return $this;
    }

    public function getMaxValue(): ?int
    {
        return $this->maxValue;
    }

    public function setMaxValue(int $maxValue): self
    {
        $this->maxValue = $maxValue;

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

    public function getDelivery(): ?AdvServicesDelivery
    {
        return $this->delivery;
    }

    public function setDelivery(?AdvServicesDelivery $delivery): self
    {
        $this->delivery = $delivery;

        return $this;
    }


}

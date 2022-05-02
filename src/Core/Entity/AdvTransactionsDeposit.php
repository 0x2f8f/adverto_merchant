<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvTransactionsDeposit
 *
 * @ORM\Table(name="adv_transactions_deposit")
 * @ORM\Entity
 */
class AdvTransactionsDeposit
{
    /**
     * @var string
     *
     * @ORM\Column(name="transaction_id", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $transactionId;

    /**
     * @var string
     *
     * @ORM\Column(name="gateway", type="string", length=50, nullable=false)
     */
    private $gateway;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remote_id", type="string", length=50, nullable=true)
     */
    private $remoteId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="error", type="text", length=0, nullable=true)
     */
    private $error;

    /**
     * @var int|null
     *
     * @ORM\Column(name="error_code", type="integer", nullable=true)
     */
    private $errorCode;

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function getGateway(): ?string
    {
        return $this->gateway;
    }

    public function setGateway(string $gateway): self
    {
        $this->gateway = $gateway;

        return $this;
    }

    public function getRemoteId(): ?string
    {
        return $this->remoteId;
    }

    public function setRemoteId(?string $remoteId): self
    {
        $this->remoteId = $remoteId;

        return $this;
    }

    public function getError(): ?string
    {
        return $this->error;
    }

    public function setError(?string $error): self
    {
        $this->error = $error;

        return $this;
    }

    public function getErrorCode(): ?int
    {
        return $this->errorCode;
    }

    public function setErrorCode(?int $errorCode): self
    {
        $this->errorCode = $errorCode;

        return $this;
    }


}

<?php

namespace App\Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserDeleteQueue
 *
 * @ORM\Table(name="adv_user_delete_queue")
 * @ORM\Entity
 */
class UserDeleteQueue
{
    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=8, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $hash;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reason", type="text", length=65535, nullable=true)
     */
    private $reason = '';

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(?string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }


}

<?php

namespace App\Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsersBonusesEverydayNotifications
 *
 * @ORM\Table(name="adv_users_bonuses_everyday_notifications")
 * @ORM\Entity
 */
class UsersBonusesEverydayNotifications
{
    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=8, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $hash = '';

    /**
     * @var int
     *
     * @ORM\Column(name="date_sent", type="integer", nullable=false)
     */
    private $dateSent;

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function getDateSent(): ?int
    {
        return $this->dateSent;
    }

    public function setDateSent(int $dateSent): self
    {
        $this->dateSent = $dateSent;

        return $this;
    }


}

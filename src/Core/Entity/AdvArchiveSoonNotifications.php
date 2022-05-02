<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvArchiveSoonNotifications
 *
 * @ORM\Table(name="adv_archive_soon_notifications")
 * @ORM\Entity
 */
class AdvArchiveSoonNotifications
{
    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=7, nullable=false)
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

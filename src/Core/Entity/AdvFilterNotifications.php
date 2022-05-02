<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvFilterNotifications
 *
 * @ORM\Table(name="adv_filter_notifications")
 * @ORM\Entity
 */
class AdvFilterNotifications
{
    /**
     * @var string
     *
     * @ORM\Column(name="filter_id", type="string", length=8, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $filterId = '';

    /**
     * @var int
     *
     * @ORM\Column(name="date_sent", type="integer", nullable=false)
     */
    private $dateSent;

    public function getFilterId(): ?string
    {
        return $this->filterId;
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

<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvServerStatus
 *
 * @ORM\Table(name="adv_server_status")
 * @ORM\Entity
 */
class AdvServerStatus
{
    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $enabled;

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }


}

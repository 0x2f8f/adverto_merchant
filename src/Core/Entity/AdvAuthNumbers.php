<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvAuthNumbers
 *
 * @ORM\Table(name="adv_auth_numbers")
 * @ORM\Entity
 */
class AdvAuthNumbers
{
    /**
     * @var string
     *
     * @ORM\Column(name="num_phone", type="string", length=21, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numPhone;

    /**
     * @var int
     *
     * @ORM\Column(name="created_at", type="integer", nullable=false)
     */
    private $createdAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false, options={"default"="1"})
     */
    private $active = true;

    public function getNumPhone(): ?string
    {
        return $this->numPhone;
    }

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }


}

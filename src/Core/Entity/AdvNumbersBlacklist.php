<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvNumbersBlacklist
 *
 * @ORM\Table(name="adv_numbers_blacklist", uniqueConstraints={@ORM\UniqueConstraint(name="num", columns={"num"})})
 * @ORM\Entity
 */
class AdvNumbersBlacklist
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
     * @var string|null
     *
     * @ORM\Column(name="num", type="string", length=20, nullable=true)
     */
    private $num;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNum(): ?string
    {
        return $this->num;
    }

    public function setNum(?string $num): self
    {
        $this->num = $num;

        return $this;
    }


}

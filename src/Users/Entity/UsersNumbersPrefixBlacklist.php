<?php

namespace App\Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsersNumbersPrefixBlacklist
 *
 * @ORM\Table(name="adv_users_numbers_prefix_blacklist", uniqueConstraints={@ORM\UniqueConstraint(name="prefix", columns={"prefix"})})
 * @ORM\Entity
 */
class UsersNumbersPrefixBlacklist
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
     * @var int
     *
     * @ORM\Column(name="prefix", type="integer", nullable=false)
     */
    private $prefix;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrefix(): ?int
    {
        return $this->prefix;
    }

    public function setPrefix(int $prefix): self
    {
        $this->prefix = $prefix;

        return $this;
    }


}

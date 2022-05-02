<?php

namespace App\Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserCommunicationType
 *
 * @ORM\Table(name="adv_user_communication_type", uniqueConstraints={@ORM\UniqueConstraint(name="adv_user_communication_type_UN", columns={"id", "name", "sort"})})
 * @ORM\Entity
 */
class UserCommunicationType
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="logo", type="text", length=65535, nullable=true)
     */
    private $logo;

    /**
     * @var int
     *
     * @ORM\Column(name="sort", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $sort;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getSort(): ?int
    {
        return $this->sort;
    }

    public function setSort(int $sort): self
    {
        $this->sort = $sort;

        return $this;
    }


}

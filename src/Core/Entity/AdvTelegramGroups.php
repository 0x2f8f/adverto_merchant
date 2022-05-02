<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvTelegramGroups
 *
 * @ORM\Table(name="adv_telegram_groups")
 * @ORM\Entity
 */
class AdvTelegramGroups
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="access_hash", type="bigint", nullable=false)
     */
    private $accessHash;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     */
    private $title = '';

    /**
     * @var string
     *
     * @ORM\Column(name="group_name", type="string", length=50, nullable=false)
     */
    private $groupName = '';

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getAccessHash(): ?string
    {
        return $this->accessHash;
    }

    public function setAccessHash(string $accessHash): self
    {
        $this->accessHash = $accessHash;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getGroupName(): ?string
    {
        return $this->groupName;
    }

    public function setGroupName(string $groupName): self
    {
        $this->groupName = $groupName;

        return $this;
    }


}

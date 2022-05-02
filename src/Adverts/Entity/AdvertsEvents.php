<?php

namespace App\Adverts\Entity;

use App\Users\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdvertsEvents
 *
 * @ORM\Table(name="adv_adverts_events", indexes={@ORM\Index(name="user_hash", columns={"user_hash"}), @ORM\Index(name="adv_adverts_events_ibfk_3", columns={"block_reason_id"}), @ORM\Index(name="advert_hash", columns={"advert_hash"}), @ORM\Index(name="moderator_id", columns={"moderator_id"})})
 * @ORM\Entity
 */
class AdvertsEvents
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
     * @var string
     *
     * @ORM\Column(name="advert_hash", type="string", length=7, nullable=false)
     */
    private $advertHash;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_robot", type="boolean", nullable=false, options={"comment"="Если событие сделано роботом - true"})
     */
    private $isRobot = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="event_type", type="string", length=0, nullable=false, options={"default"="create"})
     */
    private $eventType = 'create';

    /**
     * @var bool
     *
     * @ORM\Column(name="block_forever", type="boolean", nullable=false, options={"comment"="0 - блокировка с возможностью восстановления, 1 - без возможности восстановления"})
     */
    private $blockForever = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="moderator_comment", type="text", length=65535, nullable=true, options={"comment"="Модератор может оставить комментарий в момент модерации объявления"})
     */
    private $moderatorComment;

    /**
     * @var int
     *
     * @ORM\Column(name="created_at", type="integer", nullable=false)
     */
    private $createdAt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="kpi_seconds", type="integer", nullable=true, options={"comment"="Если необходимо и применимо, пишется количество секунд с момента постановки в очередь до момента записи факта этого события"})
     */
    private $kpiSeconds;


    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Users\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_hash", referencedColumnName="hash")
     * })
     */
    private $userHash;

    /**
     * @var AdvertsComplainReasons
     *
     * @ORM\ManyToOne(targetEntity="AdvertsComplainReasons")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="block_reason_id", referencedColumnName="id")
     * })
     */
    private $blockReason;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getAdvertHash(): ?string
    {
        return $this->advertHash;
    }

    public function setAdvertHash(string $advertHash): self
    {
        $this->advertHash = $advertHash;

        return $this;
    }

    public function getIsRobot(): ?bool
    {
        return $this->isRobot;
    }

    public function setIsRobot(bool $isRobot): self
    {
        $this->isRobot = $isRobot;

        return $this;
    }

    public function getEventType(): ?string
    {
        return $this->eventType;
    }

    public function setEventType(string $eventType): self
    {
        $this->eventType = $eventType;

        return $this;
    }

    public function getBlockForever(): ?bool
    {
        return $this->blockForever;
    }

    public function setBlockForever(bool $blockForever): self
    {
        $this->blockForever = $blockForever;

        return $this;
    }

    public function getModeratorComment(): ?string
    {
        return $this->moderatorComment;
    }

    public function setModeratorComment(?string $moderatorComment): self
    {
        $this->moderatorComment = $moderatorComment;

        return $this;
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

    public function getKpiSeconds(): ?int
    {
        return $this->kpiSeconds;
    }

    public function setKpiSeconds(?int $kpiSeconds): self
    {
        $this->kpiSeconds = $kpiSeconds;

        return $this;
    }

    public function getUserHash(): ?User
    {
        return $this->userHash;
    }

    public function setUserHash(?User $userHash): self
    {
        $this->userHash = $userHash;

        return $this;
    }

    public function getBlockReason(): ?AdvertsComplainReasons
    {
        return $this->blockReason;
    }

    public function setBlockReason(?AdvertsComplainReasons $blockReason): self
    {
        $this->blockReason = $blockReason;

        return $this;
    }


}

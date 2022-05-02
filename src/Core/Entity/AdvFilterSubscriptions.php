<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvFilterSubscriptions
 *
 * @ORM\Table(name="adv_filter_subscriptions")
 * @ORM\Entity
 */
class AdvFilterSubscriptions
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=8, nullable=false)
     */
    private $hash = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_subscription", type="boolean", nullable=false)
     */
    private $isSubscription = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="notification_time", type="boolean", nullable=false)
     */
    private $notificationTime = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title = '';

    /**
     * @var string
     *
     * @ORM\Column(name="cat_id", type="string", length=255, nullable=false)
     */
    private $catId = '';

    /**
     * @var float
     *
     * @ORM\Column(name="from", type="float", precision=51, scale=2, nullable=false)
     */
    private $from;

    /**
     * @var float
     *
     * @ORM\Column(name="to", type="float", precision=51, scale=2, nullable=false)
     */
    private $to;

    /**
     * @var int
     *
     * @ORM\Column(name="distance_min", type="smallint", nullable=false)
     */
    private $distanceMin;

    /**
     * @var int
     *
     * @ORM\Column(name="distance_max", type="smallint", nullable=false)
     */
    private $distanceMax;

    /**
     * @var geometry
     *
     * @ORM\Column(name="gps", type="geometry", nullable=false)
     */
    private $gps;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_new", type="boolean", nullable=false)
     */
    private $isNew;

    /**
     * @var bool
     *
     * @ORM\Column(name="with_photo", type="boolean", nullable=false)
     */
    private $withPhoto;

    /**
     * @var bool
     *
     * @ORM\Column(name="show_only_favorite", type="boolean", nullable=false)
     */
    private $showOnlyFavorite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sort_field", type="string", length=100, nullable=true)
     */
    private $sortField;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sort_direction", type="string", length=4, nullable=true)
     */
    private $sortDirection;

    /**
     * @var int
     *
     * @ORM\Column(name="date_created", type="integer", nullable=false)
     */
    private $dateCreated;

    /**
     * @var string
     *
     * @ORM\Column(name="notification_part_of_day", type="string", length=0, nullable=false, options={"default"="3","comment"="1 - утром, 2 - днём, 3 - вечером"})
     */
    private $notificationPartOfDay = '3';

    /**
     * @var bool
     *
     * @ORM\Column(name="push_notification_enabled", type="boolean", nullable=false, options={"default"="1","comment"="Уведомлять через пуши"})
     */
    private $pushNotificationEnabled = true;

    /**
     * @var bool
     *
     * @ORM\Column(name="email_notification_enabled", type="boolean", nullable=false, options={"default"="1","comment"="Уведомлять через по электронной почте"})
     */
    private $emailNotificationEnabled = true;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getIsSubscription(): ?bool
    {
        return $this->isSubscription;
    }

    public function setIsSubscription(bool $isSubscription): self
    {
        $this->isSubscription = $isSubscription;

        return $this;
    }

    public function getNotificationTime(): ?bool
    {
        return $this->notificationTime;
    }

    public function setNotificationTime(bool $notificationTime): self
    {
        $this->notificationTime = $notificationTime;

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

    public function getCatId(): ?string
    {
        return $this->catId;
    }

    public function setCatId(string $catId): self
    {
        $this->catId = $catId;

        return $this;
    }

    public function getFrom(): ?float
    {
        return $this->from;
    }

    public function setFrom(float $from): self
    {
        $this->from = $from;

        return $this;
    }

    public function getTo(): ?float
    {
        return $this->to;
    }

    public function setTo(float $to): self
    {
        $this->to = $to;

        return $this;
    }

    public function getDistanceMin(): ?int
    {
        return $this->distanceMin;
    }

    public function setDistanceMin(int $distanceMin): self
    {
        $this->distanceMin = $distanceMin;

        return $this;
    }

    public function getDistanceMax(): ?int
    {
        return $this->distanceMax;
    }

    public function setDistanceMax(int $distanceMax): self
    {
        $this->distanceMax = $distanceMax;

        return $this;
    }

    public function getGps()
    {
        return $this->gps;
    }

    public function setGps($gps): self
    {
        $this->gps = $gps;

        return $this;
    }

    public function getIsNew(): ?bool
    {
        return $this->isNew;
    }

    public function setIsNew(bool $isNew): self
    {
        $this->isNew = $isNew;

        return $this;
    }

    public function getWithPhoto(): ?bool
    {
        return $this->withPhoto;
    }

    public function setWithPhoto(bool $withPhoto): self
    {
        $this->withPhoto = $withPhoto;

        return $this;
    }

    public function getShowOnlyFavorite(): ?bool
    {
        return $this->showOnlyFavorite;
    }

    public function setShowOnlyFavorite(bool $showOnlyFavorite): self
    {
        $this->showOnlyFavorite = $showOnlyFavorite;

        return $this;
    }

    public function getSortField(): ?string
    {
        return $this->sortField;
    }

    public function setSortField(?string $sortField): self
    {
        $this->sortField = $sortField;

        return $this;
    }

    public function getSortDirection(): ?string
    {
        return $this->sortDirection;
    }

    public function setSortDirection(?string $sortDirection): self
    {
        $this->sortDirection = $sortDirection;

        return $this;
    }

    public function getDateCreated(): ?int
    {
        return $this->dateCreated;
    }

    public function setDateCreated(int $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getNotificationPartOfDay(): ?string
    {
        return $this->notificationPartOfDay;
    }

    public function setNotificationPartOfDay(string $notificationPartOfDay): self
    {
        $this->notificationPartOfDay = $notificationPartOfDay;

        return $this;
    }

    public function getPushNotificationEnabled(): ?bool
    {
        return $this->pushNotificationEnabled;
    }

    public function setPushNotificationEnabled(bool $pushNotificationEnabled): self
    {
        $this->pushNotificationEnabled = $pushNotificationEnabled;

        return $this;
    }

    public function getEmailNotificationEnabled(): ?bool
    {
        return $this->emailNotificationEnabled;
    }

    public function setEmailNotificationEnabled(bool $emailNotificationEnabled): self
    {
        $this->emailNotificationEnabled = $emailNotificationEnabled;

        return $this;
    }


}

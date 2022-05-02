<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvShopSchedules
 *
 * @ORM\Table(name="adv_shop_schedules", indexes={@ORM\Index(name="IDX_288C52054D16C4DD", columns={"shop_id"})})
 * @ORM\Entity
 */
class AdvShopSchedules
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=24, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id = '';

    /**
     * @var int
     *
     * @ORM\Column(name="shop_id", type="integer", nullable=false)
     */
    private $shopId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title = '';

    /**
     * @var int
     *
     * @ORM\Column(name="from_time_day", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $fromTimeDay;

    /**
     * @var int
     *
     * @ORM\Column(name="from_time_month", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $fromTimeMonth;

    /**
     * @var int
     *
     * @ORM\Column(name="to_time_day", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $toTimeDay;

    /**
     * @var int
     *
     * @ORM\Column(name="to_time_month", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $toTimeMonth;

    /**
     * @var string
     *
     * @ORM\Column(name="schedule_days", type="text", length=65535, nullable=false)
     */
    private $scheduleDays;

    /**
     * @var int
     *
     * @ORM\Column(name="sort", type="integer", nullable=false)
     */
    private $sort = '0';

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getShopId(): ?int
    {
        return $this->shopId;
    }

    public function setShopId(int $shopId): self
    {
        $this->shopId = $shopId;

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

    public function getFromTimeDay(): ?int
    {
        return $this->fromTimeDay;
    }

    public function setFromTimeDay(int $fromTimeDay): self
    {
        $this->fromTimeDay = $fromTimeDay;

        return $this;
    }

    public function getFromTimeMonth(): ?int
    {
        return $this->fromTimeMonth;
    }

    public function setFromTimeMonth(int $fromTimeMonth): self
    {
        $this->fromTimeMonth = $fromTimeMonth;

        return $this;
    }

    public function getToTimeDay(): ?int
    {
        return $this->toTimeDay;
    }

    public function setToTimeDay(int $toTimeDay): self
    {
        $this->toTimeDay = $toTimeDay;

        return $this;
    }

    public function getToTimeMonth(): ?int
    {
        return $this->toTimeMonth;
    }

    public function setToTimeMonth(int $toTimeMonth): self
    {
        $this->toTimeMonth = $toTimeMonth;

        return $this;
    }

    public function getScheduleDays(): ?string
    {
        return $this->scheduleDays;
    }

    public function setScheduleDays(string $scheduleDays): self
    {
        $this->scheduleDays = $scheduleDays;

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

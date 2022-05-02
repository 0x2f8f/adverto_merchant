<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvVersion
 *
 * @ORM\Table(name="adv_version")
 * @ORM\Entity
 */
class AdvVersion
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
     * @ORM\Column(name="app_version_android", type="integer", nullable=false, options={"comment"="Версия приложения андроид"})
     */
    private $appVersionAndroid;

    /**
     * @var int
     *
     * @ORM\Column(name="app_version_ios", type="integer", nullable=false, options={"comment"="Версия приложения iOS"})
     */
    private $appVersionIos;

    /**
     * @var int
     *
     * @ORM\Column(name="words_version", type="integer", nullable=false, options={"comment"="Версия слов на сервере на любом языке"})
     */
    private $wordsVersion;

    /**
     * @var int
     *
     * @ORM\Column(name="categories_version", type="integer", nullable=false)
     */
    private $categoriesVersion;

    /**
     * @var bool
     *
     * @ORM\Column(name="oblige_update_android", type="boolean", nullable=false, options={"default"="1","comment"="1 - требовать обновление, 0 - только информировать"})
     */
    private $obligeUpdateAndroid = true;

    /**
     * @var bool
     *
     * @ORM\Column(name="oblige_update_ios", type="boolean", nullable=false, options={"default"="1","comment"="1 - требовать обновление, 0 - только информировать"})
     */
    private $obligeUpdateIos = true;

    /**
     * @var string
     *
     * @ORM\Column(name="app_version", type="string", length=50, nullable=false)
     */
    private $appVersion = '';

    /**
     * @var int
     *
     * @ORM\Column(name="app_version_min", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $appVersionMin;

    /**
     * @var int
     *
     * @ORM\Column(name="app_version_recommend", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $appVersionRecommend;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAppVersionAndroid(): ?int
    {
        return $this->appVersionAndroid;
    }

    public function setAppVersionAndroid(int $appVersionAndroid): self
    {
        $this->appVersionAndroid = $appVersionAndroid;

        return $this;
    }

    public function getAppVersionIos(): ?int
    {
        return $this->appVersionIos;
    }

    public function setAppVersionIos(int $appVersionIos): self
    {
        $this->appVersionIos = $appVersionIos;

        return $this;
    }

    public function getWordsVersion(): ?int
    {
        return $this->wordsVersion;
    }

    public function setWordsVersion(int $wordsVersion): self
    {
        $this->wordsVersion = $wordsVersion;

        return $this;
    }

    public function getCategoriesVersion(): ?int
    {
        return $this->categoriesVersion;
    }

    public function setCategoriesVersion(int $categoriesVersion): self
    {
        $this->categoriesVersion = $categoriesVersion;

        return $this;
    }

    public function getObligeUpdateAndroid(): ?bool
    {
        return $this->obligeUpdateAndroid;
    }

    public function setObligeUpdateAndroid(bool $obligeUpdateAndroid): self
    {
        $this->obligeUpdateAndroid = $obligeUpdateAndroid;

        return $this;
    }

    public function getObligeUpdateIos(): ?bool
    {
        return $this->obligeUpdateIos;
    }

    public function setObligeUpdateIos(bool $obligeUpdateIos): self
    {
        $this->obligeUpdateIos = $obligeUpdateIos;

        return $this;
    }

    public function getAppVersion(): ?string
    {
        return $this->appVersion;
    }

    public function setAppVersion(string $appVersion): self
    {
        $this->appVersion = $appVersion;

        return $this;
    }

    public function getAppVersionMin(): ?int
    {
        return $this->appVersionMin;
    }

    public function setAppVersionMin(int $appVersionMin): self
    {
        $this->appVersionMin = $appVersionMin;

        return $this;
    }

    public function getAppVersionRecommend(): ?int
    {
        return $this->appVersionRecommend;
    }

    public function setAppVersionRecommend(int $appVersionRecommend): self
    {
        $this->appVersionRecommend = $appVersionRecommend;

        return $this;
    }


}

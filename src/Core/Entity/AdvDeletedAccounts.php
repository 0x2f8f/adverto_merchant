<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvDeletedAccounts
 *
 * @ORM\Table(name="adv_deleted_accounts", uniqueConstraints={@ORM\UniqueConstraint(name="promo", columns={"promo"}), @ORM\UniqueConstraint(name="hash", columns={"hash"}), @ORM\UniqueConstraint(name="url", columns={"url"})}, indexes={@ORM\Index(name="country", columns={"country"}), @ORM\Index(name="lang", columns={"lang"}), @ORM\Index(name="online_lasttime", columns={"online_lasttime"})})
 * @ORM\Entity
 */
class AdvDeletedAccounts
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
     * @ORM\Column(name="hash", type="string", length=8, nullable=false)
     */
    private $hash;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=6, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="promo", type="string", length=6, nullable=false)
     */
    private $promo;

    /**
     * @var string
     *
     * @ORM\Column(name="num", type="string", length=20, nullable=false)
     */
    private $num = '';

    /**
     * @var int
     *
     * @ORM\Column(name="lang", type="smallint", nullable=false)
     */
    private $lang;

    /**
     * @var int
     *
     * @ORM\Column(name="country", type="smallint", nullable=false)
     */
    private $country;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email_pass", type="string", length=20, nullable=true)
     */
    private $emailPass;

    /**
     * @var string|null
     *
     * @ORM\Column(name="id_facebook", type="string", length=20, nullable=true)
     */
    private $idFacebook;

    /**
     * @var string|null
     *
     * @ORM\Column(name="id_gplus", type="string", length=20, nullable=true)
     */
    private $idGplus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="id_twitter", type="string", length=20, nullable=true)
     */
    private $idTwitter;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255, nullable=false)
     */
    private $surname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sex", type="string", length=0, nullable=true)
     */
    private $sex;

    /**
     * @var int
     *
     * @ORM\Column(name="reg_date", type="integer", nullable=false)
     */
    private $regDate;

    /**
     * @var float
     *
     * @ORM\Column(name="rating_mark", type="float", precision=10, scale=0, nullable=false)
     */
    private $ratingMark = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="rating_mark_cnt", type="smallint", nullable=false)
     */
    private $ratingMarkCnt = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="online_lasttime", type="integer", nullable=false)
     */
    private $onlineLasttime = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="app_id", type="string", length=20, nullable=true)
     */
    private $appId;

    /**
     * @var bool
     *
     * @ORM\Column(name="deny_call", type="boolean", nullable=false)
     */
    private $denyCall;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_blocked", type="boolean", nullable=false)
     */
    private $isBlocked;

    /**
     * @var bool
     *
     * @ORM\Column(name="can_make_adverts", type="boolean", nullable=false, options={"default"="1"})
     */
    private $canMakeAdverts = true;

    /**
     * @var bool
     *
     * @ORM\Column(name="can_write_messages", type="boolean", nullable=false, options={"default"="1"})
     */
    private $canWriteMessages = true;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_shop", type="boolean", nullable=false)
     */
    private $isShop = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="city_id", type="integer", nullable=false)
     */
    private $cityId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="blacklist_status", type="smallint", nullable=false)
     */
    private $blacklistStatus = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="timestamp", type="integer", nullable=false)
     */
    private $timestamp = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="ts_delete", type="integer", nullable=false)
     */
    private $tsDelete = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="reason", type="text", length=65535, nullable=true)
     */
    private $reason = '';

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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getPromo(): ?string
    {
        return $this->promo;
    }

    public function setPromo(string $promo): self
    {
        $this->promo = $promo;

        return $this;
    }

    public function getNum(): ?string
    {
        return $this->num;
    }

    public function setNum(string $num): self
    {
        $this->num = $num;

        return $this;
    }

    public function getLang(): ?int
    {
        return $this->lang;
    }

    public function setLang(int $lang): self
    {
        $this->lang = $lang;

        return $this;
    }

    public function getCountry(): ?int
    {
        return $this->country;
    }

    public function setCountry(int $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmailPass(): ?string
    {
        return $this->emailPass;
    }

    public function setEmailPass(?string $emailPass): self
    {
        $this->emailPass = $emailPass;

        return $this;
    }

    public function getIdFacebook(): ?string
    {
        return $this->idFacebook;
    }

    public function setIdFacebook(?string $idFacebook): self
    {
        $this->idFacebook = $idFacebook;

        return $this;
    }

    public function getIdGplus(): ?string
    {
        return $this->idGplus;
    }

    public function setIdGplus(?string $idGplus): self
    {
        $this->idGplus = $idGplus;

        return $this;
    }

    public function getIdTwitter(): ?string
    {
        return $this->idTwitter;
    }

    public function setIdTwitter(?string $idTwitter): self
    {
        $this->idTwitter = $idTwitter;

        return $this;
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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(?string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getRegDate(): ?int
    {
        return $this->regDate;
    }

    public function setRegDate(int $regDate): self
    {
        $this->regDate = $regDate;

        return $this;
    }

    public function getRatingMark(): ?float
    {
        return $this->ratingMark;
    }

    public function setRatingMark(float $ratingMark): self
    {
        $this->ratingMark = $ratingMark;

        return $this;
    }

    public function getRatingMarkCnt(): ?int
    {
        return $this->ratingMarkCnt;
    }

    public function setRatingMarkCnt(int $ratingMarkCnt): self
    {
        $this->ratingMarkCnt = $ratingMarkCnt;

        return $this;
    }

    public function getOnlineLasttime(): ?int
    {
        return $this->onlineLasttime;
    }

    public function setOnlineLasttime(int $onlineLasttime): self
    {
        $this->onlineLasttime = $onlineLasttime;

        return $this;
    }

    public function getAppId(): ?string
    {
        return $this->appId;
    }

    public function setAppId(?string $appId): self
    {
        $this->appId = $appId;

        return $this;
    }

    public function getDenyCall(): ?bool
    {
        return $this->denyCall;
    }

    public function setDenyCall(bool $denyCall): self
    {
        $this->denyCall = $denyCall;

        return $this;
    }

    public function getIsBlocked(): ?bool
    {
        return $this->isBlocked;
    }

    public function setIsBlocked(bool $isBlocked): self
    {
        $this->isBlocked = $isBlocked;

        return $this;
    }

    public function getCanMakeAdverts(): ?bool
    {
        return $this->canMakeAdverts;
    }

    public function setCanMakeAdverts(bool $canMakeAdverts): self
    {
        $this->canMakeAdverts = $canMakeAdverts;

        return $this;
    }

    public function getCanWriteMessages(): ?bool
    {
        return $this->canWriteMessages;
    }

    public function setCanWriteMessages(bool $canWriteMessages): self
    {
        $this->canWriteMessages = $canWriteMessages;

        return $this;
    }

    public function getIsShop(): ?bool
    {
        return $this->isShop;
    }

    public function setIsShop(bool $isShop): self
    {
        $this->isShop = $isShop;

        return $this;
    }

    public function getCityId(): ?int
    {
        return $this->cityId;
    }

    public function setCityId(int $cityId): self
    {
        $this->cityId = $cityId;

        return $this;
    }

    public function getBlacklistStatus(): ?int
    {
        return $this->blacklistStatus;
    }

    public function setBlacklistStatus(int $blacklistStatus): self
    {
        $this->blacklistStatus = $blacklistStatus;

        return $this;
    }

    public function getTimestamp(): ?int
    {
        return $this->timestamp;
    }

    public function setTimestamp(int $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getTsDelete(): ?int
    {
        return $this->tsDelete;
    }

    public function setTsDelete(int $tsDelete): self
    {
        $this->tsDelete = $tsDelete;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(?string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }


}

<?php

namespace App\Users\Entity;

use App\Core\Entity\Country;
use App\Core\Entity\Lang;
use App\Core\Traits\Incremental32IdTrait;
use App\Core\Traits\MethodTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="adv_users", uniqueConstraints={@ORM\UniqueConstraint(name="id_gplus", columns={"id_gplus"}), @ORM\UniqueConstraint(name="num", columns={"num"}), @ORM\UniqueConstraint(name="promo", columns={"promo"}), @ORM\UniqueConstraint(name="id_twitter", columns={"id_twitter"}), @ORM\UniqueConstraint(name="email", columns={"email"}), @ORM\UniqueConstraint(name="hash", columns={"hash"}), @ORM\UniqueConstraint(name="id_facebook", columns={"id_facebook"}), @ORM\UniqueConstraint(name="url", columns={"url"})}, indexes={@ORM\Index(name="reg_date", columns={"reg_date"}), @ORM\Index(name="lang", columns={"lang"}), @ORM\Index(name="adv_users_FK", columns={"company_logo_hash"}), @ORM\Index(name="online_lasttime", columns={"online_lasttime"}), @ORM\Index(name="adv_users_ibfk_3", columns={"image_id"}), @ORM\Index(name="country", columns={"country"})})
 * @ORM\Entity(repositoryClass="App\Users\Repository\UserRepository")
 *
 * @method getHash(): ?string
 * @method setHash(string $hash): self
 *
 * @method getUrl(): ?string
 * @method setUrl(string $url): self
 *
 * @method getPromo(): ?string
 * @method setPromo(string $promo): self
 *
 * @method getNum(): ?string
 * @method setNum(?string $num): self
 *
 * @method getEmail(): ?string
 * @method setEmail(?string $email): self
 *
 * @method getEmailPass(): ?string
 * @method setEmailPass(?string $emailPass): self
 *
 * @method getIdFacebook(): ?string
 * @method setIdFacebook(?string $idFacebook): self
 *
 * @method getIdGplus(): ?string
 * @method setIdGplus(?string $idGplus): self
 *
 * @method getIdTwitter(): ?string
 * @method setIdTwitter(?string $idTwitter): self
 *
 * @method getName(): ?string
 * @method setName(string $name): self
 *
 * @method getSurname(): ?string
 * @method setSurname(string $surname): self
 *
 * @method getSex(): ?string
 * @method setSex(?string $sex): self
 *
 * @method getRegDate(): ?int
 * @method setRegDate(int $regDate): self
 *
 * @method getRatingMark(): ?float
 * @method setRatingMark(float $ratingMark): self
 *
 * @method getRatingMarkCnt(): ?int
 * @method setRatingMarkCnt(int $ratingMarkCnt): self
 *
 * @method getOnline(): ?bool
 * @method setOnline(bool $online): self
 *
 * @method getOnlineLasttime(): ?int
 * @method setOnlineLasttime(int $onlineLasttime): self
 *
 * @method getAppId(): ?string
 * @method setAppId(?string $appId): self
 *
 * @method getDenyCall(): ?bool
 * @method setDenyCall(bool $denyCall): self
 *
 * @method getTypeOfDegradation(): ?string
 * @method setTypeOfDegradation(string $typeOfDegradation): self
 *
 * @method getIsBlocked(): ?bool
 * @method setIsBlocked(bool $isBlocked): self
 *
 * @method getCanMakeAdverts(): ?bool
 * @method setCanMakeAdverts(bool $canMakeAdverts): self
 *
 * @method getCanWriteMessages(): ?bool
 * @method setCanWriteMessages(bool $canWriteMessages): self
 *
 * @method getCityId(): ?int
 * @method setCityId(int $cityId): self
 *
 * @method getBlacklistStatus(): ?int
 * @method setBlacklistStatus(int $blacklistStatus): self
 *
 * @method getTimestamp(): ?int
 * @method setTimestamp(int $timestamp): self
 *
 * @method getBlockReasonText(): ?string
 * @method setBlockReasonText(?string $blockReasonText): self
 *
 * @method getExclusiveAvailable(): ?bool
 * @method setExclusiveAvailable(bool $exclusiveAvailable): self
 *
 * @method getIsShop(): ?bool
 * @method setIsShop(bool $isShop): self
 *
 * @method getLang(): ?Lang
 * @method setLang(?Lang $lang): self
 *
 * @method getImage(): ?ImageUser
 * @method setImage(?ImageUser $image): self
 *
 * @method getCompanyLogoHash(): ?UsersCompanyLogos
 * @method setCompanyLogoHash(?UsersCompanyLogos $companyLogoHash): self
 *
 * @method getCountry(): ?Country
 * @method setCountry(?Country $country): self
 *
 * @method
 * @method
 */
class User implements UserInterface
{
    use Incremental32IdTrait;
    use MethodTrait;

    /**
     * @ORM\Column(name="hash", type="string", length=8, nullable=false)
     */
    private ?string $hash = null;

    /**
     * @ORM\Column(name="url", type="string", length=6, nullable=false)
     */
    private ?string $url = null;

    /**
     * @ORM\Column(name="promo", type="string", length=6, nullable=false)
     */
    private ?string $promo = null;

    /**
     * @ORM\Column(name="num", type="string", length=20, nullable=true)
     */
    private ?string $num = null;

    /**
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private ?string $email = null;

    /**
     * @ORM\Column(name="email_pass", type="string", length=20, nullable=true)
     */
    private ?string $emailPass = null;

    /**
     * @ORM\Column(name="id_facebook", type="string", length=20, nullable=true)
     */
    private ?string $idFacebook = null;

    /**
     * @ORM\Column(name="id_gplus", type="string", length=20, nullable=true)
     */
    private ?string $idGplus = null;

    /**
     * @ORM\Column(name="id_twitter", type="string", length=20, nullable=true)
     */
    private ?string $idTwitter = null;

    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private ?string $name = null;

    /**
     * @ORM\Column(name="surname", type="string", length=255, nullable=false)
     */
    private ?string $surname = null;

    /**
     * @ORM\Column(name="sex", type="string", length=0, nullable=true)
     */
    private ?string $sex = null;

    /**
     * @ORM\Column(name="reg_date", type="integer", nullable=false)
     */
    private ?int $regDate = null;

    /**
     * @ORM\Column(name="rating_mark", type="float", precision=10, scale=0, nullable=false)
     */
    private float $ratingMark = 0;

    /**
     * @ORM\Column(name="rating_mark_cnt", type="smallint", nullable=false)
     */
    private int $ratingMarkCnt = 0;

    /**
     * @var bool
     *
     * @ORM\Column(name="online", type="boolean", nullable=false)
     */
    private bool $online = false;

    /**
     * @var int
     *
     * @ORM\Column(name="online_lasttime", type="integer", nullable=false)
     */
    private int $onlineLasttime = 0;

    /**
     * @ORM\Column(name="app_id", type="string", length=20, nullable=true)
     */
    private ?string $appId = null;

    /**
     * @var bool
     *
     * @ORM\Column(name="deny_call", type="boolean", nullable=false, options={"comment"="Разрешены ли звонки"})
     */
    private ?bool $denyCall = null;

    /**
     * @ORM\Column(name="type_of_degradation", type="string", length=0, nullable=false, options={"comment"="уровень размытия объявления"})
     */
    private ?string $typeOfDegradation = null;

    /**
     * @ORM\Column(name="is_blocked", type="boolean", nullable=false)
     */
    private ?bool $isBlocked = null;

    /**
     * @ORM\Column(name="can_make_adverts", type="boolean", nullable=false, options={"default"="1"})
     */
    private bool $canMakeAdverts = true;

    /**
     * @ORM\Column(name="can_write_messages", type="boolean", nullable=false, options={"default"="1"})
     */
    private bool $canWriteMessages = true;

    /**
     * @ORM\Column(name="city_id", type="integer", nullable=false)
     */
    private int $cityId = 0;

    /**
     * @ORM\Column(name="blacklist_status", type="smallint", nullable=false)
     */
    private int $blacklistStatus = 0;

    /**
     * @ORM\Column(name="timestamp", type="integer", nullable=false)
     */
    private int $timestamp = 0;

    /**
     * @ORM\Column(name="block_reason_text", type="string", length=500, nullable=true)
     */
    private ?string $blockReasonText = null;

    /**
     * @var bool
     *
     * @ORM\Column(name="exclusive_available", type="boolean", nullable=false, options={"default"="1"})
     */
    private bool $exclusiveAvailable = true;

    /**
     * @ORM\Column(name="is_shop", type="boolean", nullable=false)
     */
    private bool $isShop = false;

    /**
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\Lang")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lang", referencedColumnName="id")
     * })
     */
    private ?Lang $lang = null;

    /**
     * @ORM\ManyToOne(targetEntity="ImageUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="image_id", referencedColumnName="hash")
     * })
     */
    private ?ImageUser $image = null;

    /**
     * @ORM\ManyToOne(targetEntity="UsersCompanyLogos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="company_logo_hash", referencedColumnName="hash")
     * })
     */
    private ?UsersCompanyLogos $companyLogoHash = null;

    /**
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country", referencedColumnName="iso")
     * })
     */
    private ?Country $country = null;
    
    private array $roles = [];
    
    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->hash;
    }
    
    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';
        
        return array_unique($roles);
    }
    
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        
        return $this;
    }
    
    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}

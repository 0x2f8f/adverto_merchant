<?php

namespace App\Adverts\Entity;

use App\Core\Entity\Country;
use App\Core\Entity\Currency;
use App\Core\Entity\Lang;
use App\Users\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Advert
 *
 * @ORM\Table(name="adv_adverts", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"}), @ORM\UniqueConstraint(name="url", columns={"url"})}, indexes={@ORM\Index(name="date_updated", columns={"date_updated"}), @ORM\Index(name="is_published", columns={"is_published"}), @ORM\Index(name="id_cat", columns={"id_cat"}), @ORM\Index(name="id_lang", columns={"id_lang"}), @ORM\Index(name="is_deleted", columns={"is_deleted"}), @ORM\Index(name="is_sold", columns={"is_sold"}), @ORM\Index(name="price", columns={"price"}), @ORM\Index(name="id_country", columns={"id_country"}), @ORM\Index(name="is_blocked", columns={"is_blocked"}), @ORM\Index(name="date_created", columns={"date_created"}), @ORM\Index(name="gps", columns={"gps"}), @ORM\Index(name="id_currency", columns={"id_currency"}), @ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="is_archived", columns={"is_archived"})})
 * @ORM\Entity
 */
class Advert
{
    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=7, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $hash;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=500, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="short_url", type="string", length=100, nullable=false)
     */
    private $shortUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_branch", type="string", length=120, nullable=true)
     */
    private $urlBranch;

    /**
     * @var string
     *
     * @ORM\Column(name="external_url", type="string", length=255, nullable=false)
     */
    private $externalUrl = '';

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="smallint", nullable=false)
     */
    private $status = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="count_photos", type="smallint", nullable=false)
     */
    private $countPhotos = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=150, nullable=true)
     */
    private $title;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=51, scale=2, nullable=false)
     */
    private $price;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var geometry|null
     *
     * @ORM\Column(name="gps", type="geometry", nullable=true)
     */
    private $gps;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_city", type="integer", nullable=true)
     */
    private $idCity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="text", length=65535, nullable=true, options={"comment"="Адрес объявления"})
     */
    private $address = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="facebook_repost", type="boolean", nullable=false)
     */
    private $facebookRepost = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="twitter_repost", type="boolean", nullable=false)
     */
    private $twitterRepost = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="ok_repost", type="boolean", nullable=false)
     */
    private $okRepost = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="vk_repost", type="boolean", nullable=false)
     */
    private $vkRepost = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="instagram_repost", type="boolean", nullable=false)
     */
    private $instagramRepost = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="date_created", type="integer", nullable=false)
     */
    private $dateCreated;

    /**
     * @var int
     *
     * @ORM\Column(name="date_updated", type="integer", nullable=false)
     */
    private $dateUpdated;

    /**
     * @var int
     *
     * @ORM\Column(name="date_published", type="integer", nullable=false)
     */
    private $datePublished;

    /**
     * @var int
     *
     * @ORM\Column(name="date_sold", type="integer", nullable=false)
     */
    private $dateSold;

    /**
     * @var int
     *
     * @ORM\Column(name="date_blocked", type="integer", nullable=false)
     */
    private $dateBlocked;

    /**
     * @var int
     *
     * @ORM\Column(name="date_deleted", type="integer", nullable=false)
     */
    private $dateDeleted;

    /**
     * @var int
     *
     * @ORM\Column(name="date_archivation", type="integer", nullable=false)
     */
    private $dateArchivation;

    /**
     * @var int
     *
     * @ORM\Column(name="date_allocated", type="integer", nullable=false, options={"comment"="Когда нужно снять выделение"})
     */
    private $dateAllocated = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_published", type="boolean", nullable=false, options={"default"="1"})
     */
    private $isPublished = true;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_sold", type="boolean", nullable=false)
     */
    private $isSold = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="sold_mode", type="smallint", nullable=false, options={"comment"="0 - ничего, 1 - на Адверто, 2 - где-то еще, 3 - передумал продавать"})
     */
    private $soldMode = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_deleted", type="boolean", nullable=false)
     */
    private $isDeleted = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_blocked", type="boolean", nullable=false)
     */
    private $isBlocked = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_archived", type="boolean", nullable=false)
     */
    private $isArchived = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="archive_mode", type="smallint", nullable=true, options={"comment"="Как объявление было заархивировано: 1 - роботом, 2 - юзером"})
     */
    private $archiveMode = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_expiring", type="boolean", nullable=false, options={"comment"="истекает"})
     */
    private $isExpiring = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_allocated", type="boolean", nullable=false, options={"comment"="выделено ли объявление"})
     */
    private $isAllocated = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_vip", type="boolean", nullable=false)
     */
    private $isVip = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_exclusive", type="boolean", nullable=false)
     */
    private $isExclusive = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="block_mode", type="smallint", nullable=false, options={"comment"="0 - не забл., 1 - забл. с возможностью отредакт. и восст., 2 - забл. совсем, 3 - восстановлено после блокирования"})
     */
    private $blockMode = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="block_type", type="smallint", nullable=false, options={"comment"="ID причина блокировки"})
     */
    private $blockType = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="block_type_text", type="string", length=255, nullable=false, options={"comment"="0 - не заблокировано, 1 - заблокировано роботом, 2 - заблокировано модератором"})
     */
    private $blockTypeText = '';

    /**
     * @var int
     *
     * @ORM\Column(name="views", type="integer", nullable=false)
     */
    private $views = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="favorite_counter", type="integer", nullable=false)
     */
    private $favoriteCounter = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="is_new", type="string", length=0, nullable=true, options={"comment"="3 для доноров, в которых нужно ""новый-неновый"", но заполнить за юзера нельзя"})
     */
    private $isNew;

    /**
     * @var bool
     *
     * @ORM\Column(name="bargain_possible", type="boolean", nullable=false, options={"default"="1","comment"="возможен ли торг"})
     */
    private $bargainPossible = true;

    /**
     * @var bool
     *
     * @ORM\Column(name="swap_possible", type="boolean", nullable=false, options={"comment"="возможен ли обмен"})
     */
    private $swapPossible = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="secure_deal", type="boolean", nullable=false)
     */
    private $secureDeal = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="has_video", type="boolean", nullable=false)
     */
    private $hasVideo = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="has_360_view", type="boolean", nullable=false)
     */
    private $has360View = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="type_of_degradation", type="string", length=0, nullable=false, options={"default"="absent","comment"="уровень размытия геопозиции объявления"})
     */
    private $typeOfDegradation = 'absent';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_fast_sale", type="boolean", nullable=false)
     */
    private $isFastSale = '0';

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cat", referencedColumnName="id")
     * })
     */
    private $idCat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Core\Entity\Lang", inversedBy="hashAdvert")
     * @ORM\JoinTable(name="adv_adverts_translate",
     *   joinColumns={
     *     @ORM\JoinColumn(name="hash_advert", referencedColumnName="hash")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_lang", referencedColumnName="id")
     *   }
     * )
     */
    private $idLang;

    /**
     * @var Currency
     *
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\Currency")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_currency", referencedColumnName="id")
     * })
     */
    private $idCurrency;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Users\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @var Country
     *
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_country", referencedColumnName="iso")
     * })
     */
    private $idCountry;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idLang = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

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

    public function getShortUrl(): ?string
    {
        return $this->shortUrl;
    }

    public function setShortUrl(string $shortUrl): self
    {
        $this->shortUrl = $shortUrl;

        return $this;
    }

    public function getUrlBranch(): ?string
    {
        return $this->urlBranch;
    }

    public function setUrlBranch(?string $urlBranch): self
    {
        $this->urlBranch = $urlBranch;

        return $this;
    }

    public function getExternalUrl(): ?string
    {
        return $this->externalUrl;
    }

    public function setExternalUrl(string $externalUrl): self
    {
        $this->externalUrl = $externalUrl;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCountPhotos(): ?int
    {
        return $this->countPhotos;
    }

    public function setCountPhotos(int $countPhotos): self
    {
        $this->countPhotos = $countPhotos;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getIdCity(): ?int
    {
        return $this->idCity;
    }

    public function setIdCity(?int $idCity): self
    {
        $this->idCity = $idCity;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getFacebookRepost(): ?bool
    {
        return $this->facebookRepost;
    }

    public function setFacebookRepost(bool $facebookRepost): self
    {
        $this->facebookRepost = $facebookRepost;

        return $this;
    }

    public function getTwitterRepost(): ?bool
    {
        return $this->twitterRepost;
    }

    public function setTwitterRepost(bool $twitterRepost): self
    {
        $this->twitterRepost = $twitterRepost;

        return $this;
    }

    public function getOkRepost(): ?bool
    {
        return $this->okRepost;
    }

    public function setOkRepost(bool $okRepost): self
    {
        $this->okRepost = $okRepost;

        return $this;
    }

    public function getVkRepost(): ?bool
    {
        return $this->vkRepost;
    }

    public function setVkRepost(bool $vkRepost): self
    {
        $this->vkRepost = $vkRepost;

        return $this;
    }

    public function getInstagramRepost(): ?bool
    {
        return $this->instagramRepost;
    }

    public function setInstagramRepost(bool $instagramRepost): self
    {
        $this->instagramRepost = $instagramRepost;

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

    public function getDateUpdated(): ?int
    {
        return $this->dateUpdated;
    }

    public function setDateUpdated(int $dateUpdated): self
    {
        $this->dateUpdated = $dateUpdated;

        return $this;
    }

    public function getDatePublished(): ?int
    {
        return $this->datePublished;
    }

    public function setDatePublished(int $datePublished): self
    {
        $this->datePublished = $datePublished;

        return $this;
    }

    public function getDateSold(): ?int
    {
        return $this->dateSold;
    }

    public function setDateSold(int $dateSold): self
    {
        $this->dateSold = $dateSold;

        return $this;
    }

    public function getDateBlocked(): ?int
    {
        return $this->dateBlocked;
    }

    public function setDateBlocked(int $dateBlocked): self
    {
        $this->dateBlocked = $dateBlocked;

        return $this;
    }

    public function getDateDeleted(): ?int
    {
        return $this->dateDeleted;
    }

    public function setDateDeleted(int $dateDeleted): self
    {
        $this->dateDeleted = $dateDeleted;

        return $this;
    }

    public function getDateArchivation(): ?int
    {
        return $this->dateArchivation;
    }

    public function setDateArchivation(int $dateArchivation): self
    {
        $this->dateArchivation = $dateArchivation;

        return $this;
    }

    public function getDateAllocated(): ?int
    {
        return $this->dateAllocated;
    }

    public function setDateAllocated(int $dateAllocated): self
    {
        $this->dateAllocated = $dateAllocated;

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getIsSold(): ?bool
    {
        return $this->isSold;
    }

    public function setIsSold(bool $isSold): self
    {
        $this->isSold = $isSold;

        return $this;
    }

    public function getSoldMode(): ?int
    {
        return $this->soldMode;
    }

    public function setSoldMode(int $soldMode): self
    {
        $this->soldMode = $soldMode;

        return $this;
    }

    public function getIsDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(bool $isDeleted): self
    {
        $this->isDeleted = $isDeleted;

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

    public function getIsArchived(): ?bool
    {
        return $this->isArchived;
    }

    public function setIsArchived(bool $isArchived): self
    {
        $this->isArchived = $isArchived;

        return $this;
    }

    public function getArchiveMode(): ?int
    {
        return $this->archiveMode;
    }

    public function setArchiveMode(?int $archiveMode): self
    {
        $this->archiveMode = $archiveMode;

        return $this;
    }

    public function getIsExpiring(): ?bool
    {
        return $this->isExpiring;
    }

    public function setIsExpiring(bool $isExpiring): self
    {
        $this->isExpiring = $isExpiring;

        return $this;
    }

    public function getIsAllocated(): ?bool
    {
        return $this->isAllocated;
    }

    public function setIsAllocated(bool $isAllocated): self
    {
        $this->isAllocated = $isAllocated;

        return $this;
    }

    public function getIsVip(): ?bool
    {
        return $this->isVip;
    }

    public function setIsVip(bool $isVip): self
    {
        $this->isVip = $isVip;

        return $this;
    }

    public function getIsExclusive(): ?bool
    {
        return $this->isExclusive;
    }

    public function setIsExclusive(bool $isExclusive): self
    {
        $this->isExclusive = $isExclusive;

        return $this;
    }

    public function getBlockMode(): ?int
    {
        return $this->blockMode;
    }

    public function setBlockMode(int $blockMode): self
    {
        $this->blockMode = $blockMode;

        return $this;
    }

    public function getBlockType(): ?int
    {
        return $this->blockType;
    }

    public function setBlockType(int $blockType): self
    {
        $this->blockType = $blockType;

        return $this;
    }

    public function getBlockTypeText(): ?string
    {
        return $this->blockTypeText;
    }

    public function setBlockTypeText(string $blockTypeText): self
    {
        $this->blockTypeText = $blockTypeText;

        return $this;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(int $views): self
    {
        $this->views = $views;

        return $this;
    }

    public function getFavoriteCounter(): ?int
    {
        return $this->favoriteCounter;
    }

    public function setFavoriteCounter(int $favoriteCounter): self
    {
        $this->favoriteCounter = $favoriteCounter;

        return $this;
    }

    public function getIsNew(): ?string
    {
        return $this->isNew;
    }

    public function setIsNew(?string $isNew): self
    {
        $this->isNew = $isNew;

        return $this;
    }

    public function getBargainPossible(): ?bool
    {
        return $this->bargainPossible;
    }

    public function setBargainPossible(bool $bargainPossible): self
    {
        $this->bargainPossible = $bargainPossible;

        return $this;
    }

    public function getSwapPossible(): ?bool
    {
        return $this->swapPossible;
    }

    public function setSwapPossible(bool $swapPossible): self
    {
        $this->swapPossible = $swapPossible;

        return $this;
    }

    public function getSecureDeal(): ?bool
    {
        return $this->secureDeal;
    }

    public function setSecureDeal(bool $secureDeal): self
    {
        $this->secureDeal = $secureDeal;

        return $this;
    }

    public function getHasVideo(): ?bool
    {
        return $this->hasVideo;
    }

    public function setHasVideo(bool $hasVideo): self
    {
        $this->hasVideo = $hasVideo;

        return $this;
    }

    public function getHas360View(): ?bool
    {
        return $this->has360View;
    }

    public function setHas360View(bool $has360View): self
    {
        $this->has360View = $has360View;

        return $this;
    }

    public function getTypeOfDegradation(): ?string
    {
        return $this->typeOfDegradation;
    }

    public function setTypeOfDegradation(string $typeOfDegradation): self
    {
        $this->typeOfDegradation = $typeOfDegradation;

        return $this;
    }

    public function getIsFastSale(): ?bool
    {
        return $this->isFastSale;
    }

    public function setIsFastSale(bool $isFastSale): self
    {
        $this->isFastSale = $isFastSale;

        return $this;
    }

    public function getIdCat(): ?Category
    {
        return $this->idCat;
    }

    public function setIdCat(?Category $idCat): self
    {
        $this->idCat = $idCat;

        return $this;
    }

    /**
     * @return Collection<int, Lang>
     */
    public function getIdLang(): Collection
    {
        return $this->idLang;
    }

    public function addIdLang(Lang $idLang): self
    {
        if (!$this->idLang->contains($idLang)) {
            $this->idLang[] = $idLang;
        }

        return $this;
    }

    public function removeIdLang(Lang $idLang): self
    {
        $this->idLang->removeElement($idLang);

        return $this;
    }

    public function getIdCurrency(): ?Currency
    {
        return $this->idCurrency;
    }

    public function setIdCurrency(?Currency $idCurrency): self
    {
        $this->idCurrency = $idCurrency;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdCountry(): ?Country
    {
        return $this->idCountry;
    }

    public function setIdCountry(?Country $idCountry): self
    {
        $this->idCountry = $idCountry;

        return $this;
    }

}

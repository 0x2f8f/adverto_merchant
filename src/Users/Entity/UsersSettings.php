<?php

namespace App\Users\Entity;

use App\Core\Entity\Location;
use App\Core\Entity\Country;
use Doctrine\ORM\Mapping as ORM;

/**
 * UsersSettings
 *
 * @ORM\Table(name="adv_users_settings", indexes={@ORM\Index(name="adv_users_settings_FK", columns={"user_type_id"}), @ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="user_country_id", columns={"user_country_id"}), @ORM\Index(name="adv_users_settings_ibfk_3", columns={"user_city_id"})})
 * @ORM\Entity
 */
class UsersSettings
{
    /**
     * @var string
     *
     * @ORM\Column(name="address_text", type="text", length=65535, nullable=false)
     */
    private $addressText;

    /**
     * @var geometry|null
     *
     * @ORM\Column(name="gps", type="geometry", nullable=true)
     */
    private $gps;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="email_confirmed", type="boolean", nullable=true, options={"comment"="Подтверждён ли email"})
     */
    private $emailConfirmed = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="num_confirmed", type="boolean", nullable=true, options={"comment"="Подтвержден ли телефон"})
     */
    private $numConfirmed = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="telegram", type="string", length=20, nullable=true)
     */
    private $telegram;

    /**
     * @var string|null
     *
     * @ORM\Column(name="whatsapp", type="string", length=20, nullable=true)
     */
    private $whatsapp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="viber", type="string", length=20, nullable=true)
     */
    private $viber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="skype", type="string", length=32, nullable=true)
     */
    private $skype;

    /**
     * @var bool
     *
     * @ORM\Column(name="subscribeads_notification", type="boolean", nullable=false, options={"comment"="уведомлять меня при публикации новых объявлений в моих подписках"})
     */
    private $subscribeadsNotification;

    /**
     * @var bool
     *
     * @ORM\Column(name="message_notification", type="boolean", nullable=false, options={"default"="1","comment"="уведомлять меня о получении новых сообщений"})
     */
    private $messageNotification = true;

    /**
     * @var bool
     *
     * @ORM\Column(name="favorite_notification", type="boolean", nullable=false, options={"default"="1","comment"="уведомлять меня о при изменении информации в избранных объявлениях"})
     */
    private $favoriteNotification = true;

    /**
     * @var bool
     *
     * @ORM\Column(name="myadv_notification", type="boolean", nullable=false, options={"default"="1","comment"="уведомлять меня об при изменении статуса публикации моих объявлений"})
     */
    private $myadvNotification = true;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="changeprice_ads_notification", type="boolean", nullable=true, options={"default"="1","comment"="уведомлять меня при изменении цены на объявления, на которые я подписан (inform me when price change)"})
     */
    private $changepriceAdsNotification = true;

    /**
     * @var bool
     *
     * @ORM\Column(name="requests_notification", type="boolean", nullable=false, options={"default"="1","comment"="уведомлять меня при появлении объявлений, подходящих под созданный мною реквест"})
     */
    private $requestsNotification = true;

    /**
     * @var bool
     *
     * @ORM\Column(name="newads_by_filter_notification", type="boolean", nullable=false, options={"default"="1","comment"="уведомлять меня о новых объявлениях по моим фильтрам (настраивается в фильтрах)"})
     */
    private $newadsByFilterNotification = true;

    /**
     * @var bool
     *
     * @ORM\Column(name="info_push_notification", type="boolean", nullable=false, options={"default"="1","comment"="включить уведомление через информационные пуши"})
     */
    private $infoPushNotification = true;

    /**
     * @var int
     *
     * @ORM\Column(name="count_subscribs", type="integer", nullable=false)
     */
    private $countSubscribs = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="count_subscribers", type="integer", nullable=false)
     */
    private $countSubscribers = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="prods_active_cnt", type="smallint", nullable=false)
     */
    private $prodsActiveCnt = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="prods_sold_cnt", type="smallint", nullable=false)
     */
    private $prodsSoldCnt = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="prods_arhive_cnt", type="smallint", nullable=false, options={"comment"="Количество объявлений в архиве"})
     */
    private $prodsArhiveCnt = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="call_schedule_days", type="text", length=65535, nullable=false, options={"comment"="Расписание когда можно звонить. JSON массив"})
     */
    private $callScheduleDays;

    /**
     * @var string|null
     *
     * @ORM\Column(name="additional_langs", type="string", length=255, nullable=true, options={"comment"="Дополнительные языки, на которых говорит юзер, через точку запятую"})
     */
    private $additionalLangs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="langs_not_translate", type="string", length=255, nullable=true, options={"comment"="На каких языках не требуется переводить объявления"})
     */
    private $langsNotTranslate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="link_gplus", type="string", length=255, nullable=true)
     */
    private $linkGplus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type_account", type="string", length=0, nullable=true, options={"comment"="Юридическое или физическое лицо: 1-физическое, 2-юридическое"})
     */
    private $typeAccount;

    /**
     * @var bool
     *
     * @ORM\Column(name="enable_referal", type="boolean", nullable=false, options={"comment"="Разрешена ли работа с реферальной сетью"})
     */
    private $enableReferal = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="agreement_referal", type="boolean", nullable=false, options={"comment"="Согласился ли пользователь с соглашением в участии в партнёрской программе?"})
     */
    private $agreementReferal = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="account_status", type="integer", nullable=true, options={"comment"="0-обычный, 1-PRO, 2-PRO-1, 3-PRO-2, 4-PRO-3"})
     */
    private $accountStatus = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="prods_on_moderation_cnt", type="smallint", nullable=true, options={"unsigned"=true})
     */
    private $prodsOnModerationCnt = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="prods_drafts_cnt", type="smallint", nullable=true, options={"unsigned"=true})
     */
    private $prodsDraftsCnt = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="comp_name", type="string", length=255, nullable=true)
     */
    private $compName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="main_phone", type="string", length=255, nullable=true)
     */
    private $mainPhone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="link_facebook", type="string", length=255, nullable=true)
     */
    private $linkFacebook;

    /**
     * @var string|null
     *
     * @ORM\Column(name="link_twitter", type="string", length=255, nullable=true)
     */
    private $linkTwitter;

    /**
     * @var string|null
     *
     * @ORM\Column(name="link_linkedin", type="string", length=255, nullable=true)
     */
    private $linkLinkedin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="link_instagram", type="string", length=255, nullable=true)
     */
    private $linkInstagram;

    /**
     * @var string|null
     *
     * @ORM\Column(name="link_youtube", type="string", length=255, nullable=true)
     */
    private $linkYoutube;

    /**
     * @var Country
     *
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_country_id", referencedColumnName="iso")
     * })
     */
    private $userCountry;

    /**
     * @var Location
     *
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\Location")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_city_id", referencedColumnName="id")
     * })
     */
    private $userCity;

    /**
     * @var UserTypes
     *
     * @ORM\ManyToOne(targetEntity="UserTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_type_id", referencedColumnName="id")
     * })
     */
    private $userType;

    /**
     * @var User
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    public function getAddressText(): ?string
    {
        return $this->addressText;
    }

    public function setAddressText(string $addressText): self
    {
        $this->addressText = $addressText;

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

    public function getEmailConfirmed(): ?bool
    {
        return $this->emailConfirmed;
    }

    public function setEmailConfirmed(?bool $emailConfirmed): self
    {
        $this->emailConfirmed = $emailConfirmed;

        return $this;
    }

    public function getNumConfirmed(): ?bool
    {
        return $this->numConfirmed;
    }

    public function setNumConfirmed(?bool $numConfirmed): self
    {
        $this->numConfirmed = $numConfirmed;

        return $this;
    }

    public function getTelegram(): ?string
    {
        return $this->telegram;
    }

    public function setTelegram(?string $telegram): self
    {
        $this->telegram = $telegram;

        return $this;
    }

    public function getWhatsapp(): ?string
    {
        return $this->whatsapp;
    }

    public function setWhatsapp(?string $whatsapp): self
    {
        $this->whatsapp = $whatsapp;

        return $this;
    }

    public function getViber(): ?string
    {
        return $this->viber;
    }

    public function setViber(?string $viber): self
    {
        $this->viber = $viber;

        return $this;
    }

    public function getSkype(): ?string
    {
        return $this->skype;
    }

    public function setSkype(?string $skype): self
    {
        $this->skype = $skype;

        return $this;
    }

    public function getSubscribeadsNotification(): ?bool
    {
        return $this->subscribeadsNotification;
    }

    public function setSubscribeadsNotification(bool $subscribeadsNotification): self
    {
        $this->subscribeadsNotification = $subscribeadsNotification;

        return $this;
    }

    public function getMessageNotification(): ?bool
    {
        return $this->messageNotification;
    }

    public function setMessageNotification(bool $messageNotification): self
    {
        $this->messageNotification = $messageNotification;

        return $this;
    }

    public function getFavoriteNotification(): ?bool
    {
        return $this->favoriteNotification;
    }

    public function setFavoriteNotification(bool $favoriteNotification): self
    {
        $this->favoriteNotification = $favoriteNotification;

        return $this;
    }

    public function getMyadvNotification(): ?bool
    {
        return $this->myadvNotification;
    }

    public function setMyadvNotification(bool $myadvNotification): self
    {
        $this->myadvNotification = $myadvNotification;

        return $this;
    }

    public function getChangepriceAdsNotification(): ?bool
    {
        return $this->changepriceAdsNotification;
    }

    public function setChangepriceAdsNotification(?bool $changepriceAdsNotification): self
    {
        $this->changepriceAdsNotification = $changepriceAdsNotification;

        return $this;
    }

    public function getRequestsNotification(): ?bool
    {
        return $this->requestsNotification;
    }

    public function setRequestsNotification(bool $requestsNotification): self
    {
        $this->requestsNotification = $requestsNotification;

        return $this;
    }

    public function getNewadsByFilterNotification(): ?bool
    {
        return $this->newadsByFilterNotification;
    }

    public function setNewadsByFilterNotification(bool $newadsByFilterNotification): self
    {
        $this->newadsByFilterNotification = $newadsByFilterNotification;

        return $this;
    }

    public function getInfoPushNotification(): ?bool
    {
        return $this->infoPushNotification;
    }

    public function setInfoPushNotification(bool $infoPushNotification): self
    {
        $this->infoPushNotification = $infoPushNotification;

        return $this;
    }

    public function getCountSubscribs(): ?int
    {
        return $this->countSubscribs;
    }

    public function setCountSubscribs(int $countSubscribs): self
    {
        $this->countSubscribs = $countSubscribs;

        return $this;
    }

    public function getCountSubscribers(): ?int
    {
        return $this->countSubscribers;
    }

    public function setCountSubscribers(int $countSubscribers): self
    {
        $this->countSubscribers = $countSubscribers;

        return $this;
    }

    public function getProdsActiveCnt(): ?int
    {
        return $this->prodsActiveCnt;
    }

    public function setProdsActiveCnt(int $prodsActiveCnt): self
    {
        $this->prodsActiveCnt = $prodsActiveCnt;

        return $this;
    }

    public function getProdsSoldCnt(): ?int
    {
        return $this->prodsSoldCnt;
    }

    public function setProdsSoldCnt(int $prodsSoldCnt): self
    {
        $this->prodsSoldCnt = $prodsSoldCnt;

        return $this;
    }

    public function getProdsArhiveCnt(): ?int
    {
        return $this->prodsArhiveCnt;
    }

    public function setProdsArhiveCnt(int $prodsArhiveCnt): self
    {
        $this->prodsArhiveCnt = $prodsArhiveCnt;

        return $this;
    }

    public function getCallScheduleDays(): ?string
    {
        return $this->callScheduleDays;
    }

    public function setCallScheduleDays(string $callScheduleDays): self
    {
        $this->callScheduleDays = $callScheduleDays;

        return $this;
    }

    public function getAdditionalLangs(): ?string
    {
        return $this->additionalLangs;
    }

    public function setAdditionalLangs(?string $additionalLangs): self
    {
        $this->additionalLangs = $additionalLangs;

        return $this;
    }

    public function getLangsNotTranslate(): ?string
    {
        return $this->langsNotTranslate;
    }

    public function setLangsNotTranslate(?string $langsNotTranslate): self
    {
        $this->langsNotTranslate = $langsNotTranslate;

        return $this;
    }

    public function getLinkGplus(): ?string
    {
        return $this->linkGplus;
    }

    public function setLinkGplus(?string $linkGplus): self
    {
        $this->linkGplus = $linkGplus;

        return $this;
    }

    public function getTypeAccount(): ?string
    {
        return $this->typeAccount;
    }

    public function setTypeAccount(?string $typeAccount): self
    {
        $this->typeAccount = $typeAccount;

        return $this;
    }

    public function getEnableReferal(): ?bool
    {
        return $this->enableReferal;
    }

    public function setEnableReferal(bool $enableReferal): self
    {
        $this->enableReferal = $enableReferal;

        return $this;
    }

    public function getAgreementReferal(): ?bool
    {
        return $this->agreementReferal;
    }

    public function setAgreementReferal(bool $agreementReferal): self
    {
        $this->agreementReferal = $agreementReferal;

        return $this;
    }

    public function getAccountStatus(): ?int
    {
        return $this->accountStatus;
    }

    public function setAccountStatus(?int $accountStatus): self
    {
        $this->accountStatus = $accountStatus;

        return $this;
    }

    public function getProdsOnModerationCnt(): ?int
    {
        return $this->prodsOnModerationCnt;
    }

    public function setProdsOnModerationCnt(?int $prodsOnModerationCnt): self
    {
        $this->prodsOnModerationCnt = $prodsOnModerationCnt;

        return $this;
    }

    public function getProdsDraftsCnt(): ?int
    {
        return $this->prodsDraftsCnt;
    }

    public function setProdsDraftsCnt(?int $prodsDraftsCnt): self
    {
        $this->prodsDraftsCnt = $prodsDraftsCnt;

        return $this;
    }

    public function getCompName(): ?string
    {
        return $this->compName;
    }

    public function setCompName(?string $compName): self
    {
        $this->compName = $compName;

        return $this;
    }

    public function getMainPhone(): ?string
    {
        return $this->mainPhone;
    }

    public function setMainPhone(?string $mainPhone): self
    {
        $this->mainPhone = $mainPhone;

        return $this;
    }

    public function getLinkFacebook(): ?string
    {
        return $this->linkFacebook;
    }

    public function setLinkFacebook(?string $linkFacebook): self
    {
        $this->linkFacebook = $linkFacebook;

        return $this;
    }

    public function getLinkTwitter(): ?string
    {
        return $this->linkTwitter;
    }

    public function setLinkTwitter(?string $linkTwitter): self
    {
        $this->linkTwitter = $linkTwitter;

        return $this;
    }

    public function getLinkLinkedin(): ?string
    {
        return $this->linkLinkedin;
    }

    public function setLinkLinkedin(?string $linkLinkedin): self
    {
        $this->linkLinkedin = $linkLinkedin;

        return $this;
    }

    public function getLinkInstagram(): ?string
    {
        return $this->linkInstagram;
    }

    public function setLinkInstagram(?string $linkInstagram): self
    {
        $this->linkInstagram = $linkInstagram;

        return $this;
    }

    public function getLinkYoutube(): ?string
    {
        return $this->linkYoutube;
    }

    public function setLinkYoutube(?string $linkYoutube): self
    {
        $this->linkYoutube = $linkYoutube;

        return $this;
    }

    public function getUserCountry(): ?Country
    {
        return $this->userCountry;
    }

    public function setUserCountry(?Country $userCountry): self
    {
        $this->userCountry = $userCountry;

        return $this;
    }

    public function getUserCity(): ?Location
    {
        return $this->userCity;
    }

    public function setUserCity(?Location $userCity): self
    {
        $this->userCity = $userCity;

        return $this;
    }

    public function getUserType(): ?UserTypes
    {
        return $this->userType;
    }

    public function setUserType(?UserTypes $userType): self
    {
        $this->userType = $userType;

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


}

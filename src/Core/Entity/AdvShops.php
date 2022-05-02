<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvShops
 *
 * @ORM\Table(name="adv_shops")
 * @ORM\Entity
 */
class AdvShops
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
     * @var string|null
     *
     * @ORM\Column(name="hash", type="string", length=8, nullable=true)
     */
    private $hash;

    /**
     * @var bool
     *
     * @ORM\Column(name="not_moderated", type="boolean", nullable=false)
     */
    private $notModerated = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @var int|null
     *
     * @ORM\Column(name="main_place_id", type="integer", nullable=true)
     */
    private $mainPlaceId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="word", type="string", length=200, nullable=true)
     */
    private $word;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="company_no", type="string", length=15, nullable=true)
     */
    private $companyNo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vat", type="string", length=15, nullable=true)
     */
    private $vat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contact_person", type="string", length=100, nullable=true)
     */
    private $contactPerson = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_director", type="boolean", nullable=false)
     */
    private $isDirector = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_owner", type="boolean", nullable=false)
     */
    private $isOwner = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="director_name", type="string", length=100, nullable=true)
     */
    private $directorName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postbox", type="string", length=100, nullable=true)
     */
    private $postbox;

    /**
     * @var array|null
     *
     * @ORM\Column(name="phones", type="array", length=0, nullable=true)
     */
    private $phones;

    /**
     * @var array|null
     *
     * @ORM\Column(name="emails", type="array", length=0, nullable=true)
     */
    private $emails;

    /**
     * @var array|null
     *
     * @ORM\Column(name="websites", type="array", length=0, nullable=true)
     */
    private $websites;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fax", type="string", length=100, nullable=true)
     */
    private $fax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @var string|null
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    private $twitter;

    /**
     * @var string|null
     *
     * @ORM\Column(name="skype", type="string", length=50, nullable=true)
     */
    private $skype = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="instagram", type="string", length=255, nullable=true)
     */
    private $instagram = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="linkedin", type="string", length=255, nullable=true)
     */
    private $linkedin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="youtube", type="string", length=255, nullable=true)
     */
    private $youtube;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gplus", type="string", length=255, nullable=true)
     */
    private $gplus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="play_market", type="string", length=255, nullable=true)
     */
    private $playMarket;

    /**
     * @var string|null
     *
     * @ORM\Column(name="app_store", type="string", length=255, nullable=true)
     */
    private $appStore;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(?string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getNotModerated(): ?bool
    {
        return $this->notModerated;
    }

    public function setNotModerated(bool $notModerated): self
    {
        $this->notModerated = $notModerated;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getMainPlaceId(): ?int
    {
        return $this->mainPlaceId;
    }

    public function setMainPlaceId(?int $mainPlaceId): self
    {
        $this->mainPlaceId = $mainPlaceId;

        return $this;
    }

    public function getWord(): ?string
    {
        return $this->word;
    }

    public function setWord(?string $word): self
    {
        $this->word = $word;

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

    public function getCompanyNo(): ?string
    {
        return $this->companyNo;
    }

    public function setCompanyNo(?string $companyNo): self
    {
        $this->companyNo = $companyNo;

        return $this;
    }

    public function getVat(): ?string
    {
        return $this->vat;
    }

    public function setVat(?string $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    public function getContactPerson(): ?string
    {
        return $this->contactPerson;
    }

    public function setContactPerson(?string $contactPerson): self
    {
        $this->contactPerson = $contactPerson;

        return $this;
    }

    public function getIsDirector(): ?bool
    {
        return $this->isDirector;
    }

    public function setIsDirector(bool $isDirector): self
    {
        $this->isDirector = $isDirector;

        return $this;
    }

    public function getIsOwner(): ?bool
    {
        return $this->isOwner;
    }

    public function setIsOwner(bool $isOwner): self
    {
        $this->isOwner = $isOwner;

        return $this;
    }

    public function getDirectorName(): ?string
    {
        return $this->directorName;
    }

    public function setDirectorName(?string $directorName): self
    {
        $this->directorName = $directorName;

        return $this;
    }

    public function getPostbox(): ?string
    {
        return $this->postbox;
    }

    public function setPostbox(?string $postbox): self
    {
        $this->postbox = $postbox;

        return $this;
    }

    public function getPhones(): ?array
    {
        return $this->phones;
    }

    public function setPhones(?array $phones): self
    {
        $this->phones = $phones;

        return $this;
    }

    public function getEmails(): ?array
    {
        return $this->emails;
    }

    public function setEmails(?array $emails): self
    {
        $this->emails = $emails;

        return $this;
    }

    public function getWebsites(): ?array
    {
        return $this->websites;
    }

    public function setWebsites(?array $websites): self
    {
        $this->websites = $websites;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(?string $twitter): self
    {
        $this->twitter = $twitter;

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

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(?string $instagram): self
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getYoutube(): ?string
    {
        return $this->youtube;
    }

    public function setYoutube(?string $youtube): self
    {
        $this->youtube = $youtube;

        return $this;
    }

    public function getGplus(): ?string
    {
        return $this->gplus;
    }

    public function setGplus(?string $gplus): self
    {
        $this->gplus = $gplus;

        return $this;
    }

    public function getPlayMarket(): ?string
    {
        return $this->playMarket;
    }

    public function setPlayMarket(?string $playMarket): self
    {
        $this->playMarket = $playMarket;

        return $this;
    }

    public function getAppStore(): ?string
    {
        return $this->appStore;
    }

    public function setAppStore(?string $appStore): self
    {
        $this->appStore = $appStore;

        return $this;
    }


}

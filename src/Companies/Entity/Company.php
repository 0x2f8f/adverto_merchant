<?php

namespace App\Companies\Entity;

use App\Core\Entity\Country;
use App\Core\Entity\Location;
use App\Core\Traits\Incremental32IdTrait;
use App\Core\Traits\MethodTrait;
use App\Users\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * Companies
 *
 * @ORM\Table(name="adv_user_company", uniqueConstraints={@ORM\UniqueConstraint(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 *
 * @method getTitle(): ?string
 * @method setTitle(?string $value): self
 *
 * @method getDescription(): ?string
 * @method setDescription(?string $value): self
 *
 * @method getLinkFacebook(): ?string
 * @method setLinkFacebook(?string $value): self
 *
 * @method getLinkInstagram(): ?string
 * @method setLinkInstagram(?string $value): self
 *
 * @method getLinkLinkedin(): ?string
 * @method setLinkLinkedin(?string $value): self
 *
 * @method getLinkTwitter(): ?string
 * @method setLinkTwitter(?string $value): self
 *
 * @method getLinkYoutube(): ?string
 * @method setLinkYoutube(?string $value): self
 *
 * @method getLogoHash(): ?string
 * @method setLogoHash(?string $value): self
 *
 * @method getManagerEmail(): ?string
 * @method setManagerEmail(?string $value): self
 *
 * @method getManagerName(): ?string
 * @method setManagerName(?string $value): self
 *
 * @method getManagerSurname(): ?string
 * @method setManagerSurname(?string $value): self
 *
 * @method getManagerPhone(): ?string
 * @method setManagerPhone(?string $value): self
 *
 * @method getPhones(): ?string
 * @method setPhones(?string $value): self
 *
 * @method getSite(): ?string
 * @method setSite(?string $value): self
 *
 * @method getSlogan(): ?string
 * @method setSlogan(?string $value): self
 *
 * @method getUser(): ?User
 * @method setUser(?User $user): self
 *
 * @method getCity(): ?Location
 * @method setCity(Location $city): self
 *
 * @method getCountry(): ?Country
 * @method setCountry(Country $country): self
 *
 * @method getVideoHash(): ?string
 * @method setVideoHash(?string $value): self
 *
 * @method getLicense(): ?string
 * @method setLicense(?string $value): self
 *
 * @method getLegalOrganisationType(): ?LegalOrganisationType
 * @method setLegalOrganisationType(?LegalOrganisationType $legalOrganisationType): self
 */
class Company
{
    use Incremental32IdTrait;
    use MethodTrait;

    /**
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private string $title;

    /**
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="iso")
     * })
     */
    private Country $country;

    /**
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\Location", fetch="LAZY")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     */
    private Location $city;

    /**
     * @ORM\Column(name="site", type="string", length=255, nullable=true)
     */
    private ?string $site;

    /**
     * @ORM\Column(name="phones", type="text", length=0, nullable=true)
     */
    private ?string $phones;

    /**
     * @ORM\Column(name="slogan", type="text", length=65535, nullable=true)
     */
    private ?string $slogan;

    /**
     * @ORM\Column(name="logo_hash", type="string", length=24, nullable=true)
     */
    private ?string $logoHash;

    /**
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private ?string $description;

    /**
     * @ORM\Column(name="license", type="string", length=255, nullable=true)
     */
    private ?string $license;

    /**
     * @ORM\Column(name="video_hash", type="string", length=24, nullable=true)
     */
    private ?string $videoHash;

    /**
     * @ORM\Column(name="manager_name", type="string", length=255, nullable=true)
     */
    private ?string $managerName;

    /**
     * @ORM\Column(name="manager_surname", type="string", length=255, nullable=true)
     */
    private ?string $managerSurname;

    /**
     * @ORM\Column(name="manager_phone", type="string", length=20, nullable=true)
     */
    private ?string $managerPhone;

    /**
     * @ORM\Column(name="manager_email", type="string", length=255, nullable=true)
     */
    private ?string $managerEmail;

    /**
     * @ORM\ManyToOne(targetEntity="App\Companies\Entity\LegalOrganisationType", fetch="LAZY")
     * @ORM\JoinColumn(name="legal_organisation_type_id", referencedColumnName="id")
     */
    private ?LegalOrganisationType $legalOrganisationType;

    /**
     * @ORM\Column(name="link_facebook", type="string", length=255, nullable=true)
     */
    private ?string $linkFacebook;

    /**
     * @ORM\Column(name="link_twitter", type="string", length=255, nullable=true)
     */
    private ?string $linkTwitter;

    /**
     * @ORM\Column(name="link_linkedin", type="string", length=255, nullable=true)
     */
    private ?string $linkLinkedin;

    /**
     * @ORM\Column(name="link_instagram", type="string", length=255, nullable=true)
     */
    private ?string $linkInstagram;

    /**
     * @ORM\Column(name="link_youtube", type="string", length=255, nullable=true)
     */
    private ?string $linkYoutube;

    /**
     * @ORM\ManyToOne(targetEntity="App\Users\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private ?User $user;

    public function __toString(): string
    {
        return $this->getTitle();
    }

    public function getCountryId(): ?int
    {
        return $this->country?->getIso();
    }

    public function getCityId(): ?int
    {
        return $this->city?->getId();
    }

    public function getLegalOrganisationTypeId(): ?int
    {
        return $this->legalOrganisationType?->getId();
    }
}

<?php

namespace App\Core\Entity;

use App\Core\Traits\MethodTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="adv_countries", uniqueConstraints={@ORM\UniqueConstraint(name="alpha2", columns={"alpha2"})}, indexes={@ORM\Index(name="id_currency", columns={"id_currency"}), @ORM\Index(name="additional_currency", columns={"additional_currency"}), @ORM\Index(name="prefix_3", columns={"prefix"}), @ORM\Index(name="id_location", columns={"id_location"}), @ORM\Index(name="id_lang", columns={"id_lang"})})
 * @ORM\Entity
 *
 * @method getIso(): ?int
 *
 * @method getNameRuShort(): ?string
 * @method setNameRuShort(string $nameRuShort): self
 *
 * @method getNameRuFull(): ?string
 * @method setNameRuFull(string $nameRuFull): self
 *
 * @method getNameEn(): ?string
 * @method setNameEn(string $nameEn): self
 *
 * @method getAlpha2(): ?string
 * @method setAlpha2(string $alpha2): self
 *
 * @method getAlpha3(): ?string
 * @method setAlpha3(string $alpha3): self
 *
 * @method getPartOfPlanet(): ?string
 * @method setPartOfPlanet(string $partOfPlanet): self
 *
 * @method getArea(): ?string
 * @method setArea(string $area): self
 *
 * @method getPrefix(): ?int
 * @method setPrefix(int $prefix): self
 *
 * @method getPhoneLength(): ?int
 * @method setPhoneLength(?int $phoneLength): self
 *
 * @method getPhoneMask(): ?string
 * @method setPhoneMask(?string $phoneMask): self
 *
 * @method getRestrictionAge(): ?int
 * @method setRestrictionAge(int $restrictionAge): self
 *
 * @method getSystemOfUnit(): ?string
 * @method setSystemOfUnit(?string $systemOfUnit): self
 *
 * @method getCurrency(): ?Currency
 * @method setCurrency(?Currency $currency): self
 *
 * @method getLocation(): ?Location
 * @method setLocation(?Location $location): self
 *
 * @method getLang(): ?Lang
 * @method setLang(Lang $lang): self
 *
 * @method getAdditionalCurrency(): ?Currency
 * @method setAdditionalCurrency(?Currency $additionalCurrency): self
 */
class Country
{
    use MethodTrait;

    /**
     * @ORM\Column(name="iso", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private ?int $iso = null;

    /**
     * @ORM\Column(name="name_ru_short", type="string", length=80, nullable=false)
     */
    private string $nameRuShort = '';

    /**
     * @ORM\Column(name="name_ru_full", type="string", length=100, nullable=false)
     */
    private string $nameRuFull = '';

    /**
     * @ORM\Column(name="name_en", type="string", length=100, nullable=false)
     */
    private string $nameEn = '';

    /**
     * @ORM\Column(name="alpha2", type="string", length=2, nullable=false, options={"fixed"=true})
     */
    private string $alpha2 = '';

    /**
     * @ORM\Column(name="alpha3", type="string", length=3, nullable=false, options={"fixed"=true})
     */
    private string $alpha3 = '';

    /**
     * @ORM\Column(name="part_of_planet", type="string", length=150, nullable=false)
     */
    private string $partOfPlanet = '';

    /**
     * @ORM\Column(name="area", type="string", length=150, nullable=false)
     */
    private string $area = '';

    /**
     * @ORM\Column(name="prefix", type="smallint", nullable=false)
     */
    private ?int $prefix = null;

    /**
     * @ORM\Column(name="phone_length", type="integer", nullable=true, options={"comment"="количество цифр в телефонном номере, не считая длину префикса"})
     */
    private ?int $phoneLength = null;

    /**
     * @ORM\Column(name="phone_mask", type="string", length=30, nullable=true)
     */
    private ?string $phoneMask = null;

    /**
     * @ORM\Column(name="restriction_age", type="smallint", nullable=false, options={"default"="18","unsigned"=true,"comment"="Возраст взрослости"})
     */
    private int $restrictionAge = 18;

    /**
     * @ORM\Column(name="system_of_unit", type="string", length=0, nullable=true)
     */
    private ?string $systemOfUnit = null;

    /**
     * @ORM\ManyToOne(targetEntity="Currency")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_currency", referencedColumnName="id")
     * })
     */
    private ?Currency $currency = null;

    /**
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_location", referencedColumnName="id")
     * })
     */
    private ?Location $location = null;

    /**
     * @ORM\ManyToOne(targetEntity="Lang")
     * @ORM\JoinColumn(name="id_lang", referencedColumnName="id", nullable=true)
     */
    private ?Lang $lang = null;

    /**
     * @ORM\ManyToOne(targetEntity="Currency")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="additional_currency", referencedColumnName="id")
     * })
     */
    private ?Currency $additionalCurrency = null;

}

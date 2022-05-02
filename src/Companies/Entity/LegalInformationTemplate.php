<?php

namespace App\Companies\Entity;

use App\Core\Entity\Country;
use App\Core\Traits\Incremental32IdTrait;
use App\Core\Traits\MethodTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="adv_legal_information_templates")
 * @ORM\Entity(repositoryClass="App\Companies\Repository\LegalInformationTemplateRepository")
 *
 * @method getNameProperty(): ?string
 * @method setNameProperty(string $nameProperty): self
 *
 * @method getCountry(): ?Country
 * @method setCountry(Country $country): self
 *
 * @method getSort(): ?int
 * @method setSort(int $position): self
 */
class LegalInformationTemplate
{
    use Incremental32IdTrait;
    use MethodTrait;

    /**
     * @ORM\Column(name="name_property", type="string", length=255, nullable=false)
     */
    private string $nameProperty;

    /**
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="iso")
     * })
     */
    private Country $country;

    /**
     * @ORM\Column(name="sort", type="integer")
     */
    private ?int $sort = null;

    public function __toString(): string
    {
        return $this->nameProperty;
    }
}
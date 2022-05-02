<?php

namespace App\Companies\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LegalInformationRelation
 *
 * @ORM\Table(name="adv_legal_information_relations", indexes={@ORM\Index(name="company_id", columns={"company_id"}), @ORM\Index(name="legal_property_id", columns={"legal_property_id"})})
 * @ORM\Entity
 */
class LegalInformationRelation
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
     * @var string
     *
     * @ORM\Column(name="legal_content", type="text", length=65535, nullable=false)
     */
    private $legalContent;

    /**
     * @var LegalInformationTemplate
     *
     * @ORM\ManyToOne(targetEntity="LegalInformationTemplate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="legal_property_id", referencedColumnName="id")
     * })
     */
    private $legalProperty;

    /**
     * @var Company
     *
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     * })
     */
    private $company;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLegalContent(): ?string
    {
        return $this->legalContent;
    }

    public function setLegalContent(string $legalContent): self
    {
        $this->legalContent = $legalContent;

        return $this;
    }

    public function getLegalProperty(): ?LegalInformationTemplate
    {
        return $this->legalProperty;
    }

    public function setLegalProperty(?LegalInformationTemplate $legalProperty): self
    {
        $this->legalProperty = $legalProperty;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }


}

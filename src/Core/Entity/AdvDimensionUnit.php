<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvDimensionUnit
 *
 * @ORM\Table(name="adv_dimension_unit", indexes={@ORM\Index(name="adv_dimension_unit_fk_1", columns={"dimension_id"})})
 * @ORM\Entity
 */
class AdvDimensionUnit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="smallint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=20, nullable=false)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="system_of_unit", type="string", length=0, nullable=true)
     */
    private $systemOfUnit;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=50, nullable=false)
     */
    private $code;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_extra", type="string", length=50, nullable=true)
     */
    private $codeExtra;

    /**
     * @var AdvDimension
     *
     * @ORM\ManyToOne(targetEntity="AdvDimension")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dimension_id", referencedColumnName="id")
     * })
     */
    private $dimension;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSystemOfUnit(): ?string
    {
        return $this->systemOfUnit;
    }

    public function setSystemOfUnit(?string $systemOfUnit): self
    {
        $this->systemOfUnit = $systemOfUnit;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getCodeExtra(): ?string
    {
        return $this->codeExtra;
    }

    public function setCodeExtra(?string $codeExtra): self
    {
        $this->codeExtra = $codeExtra;

        return $this;
    }

    public function getDimension(): ?AdvDimension
    {
        return $this->dimension;
    }

    public function setDimension(?AdvDimension $dimension): self
    {
        $this->dimension = $dimension;

        return $this;
    }


}

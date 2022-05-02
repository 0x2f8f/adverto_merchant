<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvFieldsMultiselectName
 *
 * @ORM\Table(name="adv_fields_multiselect_name", uniqueConstraints={@ORM\UniqueConstraint(name="uniq_adv_fields_multiselect_name", columns={"id_multiselect", "id_lang"})}, indexes={@ORM\Index(name="id_lang", columns={"id_lang"}), @ORM\Index(name="IDX_416770998EE64677", columns={"id_multiselect"})})
 * @ORM\Entity
 */
class AdvFieldsMultiselectName
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=50, nullable=false)
     */
    private $value;

    /**
     * @var int
     *
     * @ORM\Column(name="sort", type="integer", nullable=false)
     */
    private $sort;

    /**
     * @var string|null
     *
     * @ORM\Column(name="extra_value", type="text", length=65535, nullable=true)
     */
    private $extraValue;

    /**
     * @var int
     *
     * @ORM\Column(name="is_real", type="smallint", nullable=false, options={"default"="1"})
     */
    private $isReal = '1';

    /**
     * @var Lang
     *
     * @ORM\ManyToOne(targetEntity="Lang")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_lang", referencedColumnName="id")
     * })
     */
    private $idLang;

    /**
     * @var AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_multiselect", referencedColumnName="id")
     * })
     */
    private $idMultiselect;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getSort(): ?int
    {
        return $this->sort;
    }

    public function setSort(int $sort): self
    {
        $this->sort = $sort;

        return $this;
    }

    public function getExtraValue(): ?string
    {
        return $this->extraValue;
    }

    public function setExtraValue(?string $extraValue): self
    {
        $this->extraValue = $extraValue;

        return $this;
    }

    public function getIsReal(): ?int
    {
        return $this->isReal;
    }

    public function setIsReal(int $isReal): self
    {
        $this->isReal = $isReal;

        return $this;
    }

    public function getIdLang(): ?Lang
    {
        return $this->idLang;
    }

    public function setIdLang(?Lang $idLang): self
    {
        $this->idLang = $idLang;

        return $this;
    }

    public function getIdMultiselect(): ?AdvFieldsMultiselectList
    {
        return $this->idMultiselect;
    }

    public function setIdMultiselect(?AdvFieldsMultiselectList $idMultiselect): self
    {
        $this->idMultiselect = $idMultiselect;

        return $this;
    }


}

<?php

namespace App\Core\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdvFields
 *
 * @ORM\Table(name="adv_fields", uniqueConstraints={@ORM\UniqueConstraint(name="slug_id", columns={"slug_id"})}, indexes={@ORM\Index(name="adv_dimension_unit_metric_FK", columns={"metric_unit_id"}), @ORM\Index(name="adv_dimension_unit_imperial_FK", columns={"imperial_unit_id"})})
 * @ORM\Entity
 */
class AdvFields
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="field_type", type="string", length=0, nullable=false)
     */
    private $fieldType;

    /**
     * @var string
     *
     * @ORM\Column(name="slug_id", type="string", length=50, nullable=false)
     */
    private $slugId;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_filterable", type="boolean", nullable=false, options={"comment"="Нужно ли выводить строку, чтобы облегчить поиск по категории"})
     */
    private $isFilterable = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="required_filling", type="boolean", nullable=false, options={"comment"="Фильтр обязателен для заполнения при добавлении объявления"})
     */
    private $requiredFilling = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="maxlength", type="integer", nullable=true, options={"comment"="Максимальный размер текстового поля"})
     */
    private $maxlength;

    /**
     * @var int|null
     *
     * @ORM\Column(name="min_value", type="integer", nullable=true, options={"comment"="Минимальное значение num_string"})
     */
    private $minValue;

    /**
     * @var int|null
     *
     * @ORM\Column(name="max_value", type="integer", nullable=true, options={"comment"="Максимальное значение num_string"})
     */
    private $maxValue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="text", length=65535, nullable=true)
     */
    private $icon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=true)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="item_type", type="string", length=0, nullable=false, options={"default"="simple"})
     */
    private $itemType = 'simple';

    /**
     * @var string|null
     *
     * @ORM\Column(name="field_properties", type="text", length=0, nullable=true)
     */
    private $fieldProperties;

    /**
     * @var AdvDimensionUnit
     *
     * @ORM\ManyToOne(targetEntity="AdvDimensionUnit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="metric_unit_id", referencedColumnName="id")
     * })
     */
    private $metricUnit;

    /**
     * @var AdvDimensionUnit
     *
     * @ORM\ManyToOne(targetEntity="AdvDimensionUnit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imperial_unit_id", referencedColumnName="id")
     * })
     */
    private $imperialUnit;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AdvFields", mappedBy="arrayItemField")
     */
    private $arrayTypeField;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Lang", inversedBy="idField")
     * @ORM\JoinTable(name="adv_fields_name",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_field", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_lang", referencedColumnName="id")
     *   }
     * )
     */
    private $idLang;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->arrayTypeField = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idLang = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFieldType(): ?string
    {
        return $this->fieldType;
    }

    public function setFieldType(string $fieldType): self
    {
        $this->fieldType = $fieldType;

        return $this;
    }

    public function getSlugId(): ?string
    {
        return $this->slugId;
    }

    public function setSlugId(string $slugId): self
    {
        $this->slugId = $slugId;

        return $this;
    }

    public function getIsFilterable(): ?bool
    {
        return $this->isFilterable;
    }

    public function setIsFilterable(bool $isFilterable): self
    {
        $this->isFilterable = $isFilterable;

        return $this;
    }

    public function getRequiredFilling(): ?bool
    {
        return $this->requiredFilling;
    }

    public function setRequiredFilling(bool $requiredFilling): self
    {
        $this->requiredFilling = $requiredFilling;

        return $this;
    }

    public function getMaxlength(): ?int
    {
        return $this->maxlength;
    }

    public function setMaxlength(?int $maxlength): self
    {
        $this->maxlength = $maxlength;

        return $this;
    }

    public function getMinValue(): ?int
    {
        return $this->minValue;
    }

    public function setMinValue(?int $minValue): self
    {
        $this->minValue = $minValue;

        return $this;
    }

    public function getMaxValue(): ?int
    {
        return $this->maxValue;
    }

    public function setMaxValue(?int $maxValue): self
    {
        $this->maxValue = $maxValue;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getItemType(): ?string
    {
        return $this->itemType;
    }

    public function setItemType(string $itemType): self
    {
        $this->itemType = $itemType;

        return $this;
    }

    public function getFieldProperties(): ?string
    {
        return $this->fieldProperties;
    }

    public function setFieldProperties(?string $fieldProperties): self
    {
        $this->fieldProperties = $fieldProperties;

        return $this;
    }

    public function getMetricUnit(): ?AdvDimensionUnit
    {
        return $this->metricUnit;
    }

    public function setMetricUnit(?AdvDimensionUnit $metricUnit): self
    {
        $this->metricUnit = $metricUnit;

        return $this;
    }

    public function getImperialUnit(): ?AdvDimensionUnit
    {
        return $this->imperialUnit;
    }

    public function setImperialUnit(?AdvDimensionUnit $imperialUnit): self
    {
        $this->imperialUnit = $imperialUnit;

        return $this;
    }

    /**
     * @return Collection<int, AdvFields>
     */
    public function getArrayTypeField(): Collection
    {
        return $this->arrayTypeField;
    }

    public function addArrayTypeField(AdvFields $arrayTypeField): self
    {
        if (!$this->arrayTypeField->contains($arrayTypeField)) {
            $this->arrayTypeField[] = $arrayTypeField;
            $arrayTypeField->addArrayItemField($this);
        }

        return $this;
    }

    public function removeArrayTypeField(AdvFields $arrayTypeField): self
    {
        if ($this->arrayTypeField->removeElement($arrayTypeField)) {
            $arrayTypeField->removeArrayItemField($this);
        }

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

}

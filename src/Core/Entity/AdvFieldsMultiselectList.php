<?php

namespace App\Core\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdvFieldsMultiselectList
 *
 * @ORM\Table(name="adv_fields_multiselect_list", uniqueConstraints={@ORM\UniqueConstraint(name="adv_fields_multiselect_list_UN", columns={"id", "id_field"})}, indexes={@ORM\Index(name="id_field", columns={"id_field"})})
 * @ORM\Entity
 */
class AdvFieldsMultiselectList
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
     * @var bool
     *
     * @ORM\Column(name="is_visible", type="boolean", nullable=false, options={"default"="1"})
     */
    private $isVisible = true;

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="text", length=65535, nullable=true)
     */
    private $icon;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_other", type="boolean", nullable=false)
     */
    private $isOther = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="item_type", type="string", length=0, nullable=false, options={"default"="simple"})
     */
    private $itemType = 'simple';

    /**
     * @var \AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_field", referencedColumnName="id")
     * })
     */
    private $idField;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AdvFieldsMultiselectList", mappedBy="depMultiselect")
     */
    private $multiselect;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->multiselect = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function setIsVisible(bool $isVisible): self
    {
        $this->isVisible = $isVisible;

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

    public function getIsOther(): ?bool
    {
        return $this->isOther;
    }

    public function setIsOther(bool $isOther): self
    {
        $this->isOther = $isOther;

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

    public function getIdField(): ?AdvFields
    {
        return $this->idField;
    }

    public function setIdField(?AdvFields $idField): self
    {
        $this->idField = $idField;

        return $this;
    }

    /**
     * @return Collection<int, AdvFieldsMultiselectList>
     */
    public function getMultiselect(): Collection
    {
        return $this->multiselect;
    }

    public function addMultiselect(AdvFieldsMultiselectList $multiselect): self
    {
        if (!$this->multiselect->contains($multiselect)) {
            $this->multiselect[] = $multiselect;
            $multiselect->addDepMultiselect($this);
        }

        return $this;
    }

    public function removeMultiselect(AdvFieldsMultiselectList $multiselect): self
    {
        if ($this->multiselect->removeElement($multiselect)) {
            $multiselect->removeDepMultiselect($this);
        }

        return $this;
    }

}

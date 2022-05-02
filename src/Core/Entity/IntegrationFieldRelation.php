<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IntegrationFieldRelation
 *
 * @ORM\Table(name="integration_field_relation", indexes={@ORM\Index(name="integrations_fir_fk_field", columns={"field_id"}), @ORM\Index(name="integrations_fir_fk_multiselect", columns={"multiselect_id"})})
 * @ORM\Entity
 */
class IntegrationFieldRelation
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
     * @var int
     *
     * @ORM\Column(name="integration_id", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $integrationId;

    /**
     * @var string
     *
     * @ORM\Column(name="related_field", type="string", length=100, nullable=false, options={"comment"="Название поля в файле интеграции"})
     */
    private $relatedField;

    /**
     * @var string|null
     *
     * @ORM\Column(name="related_value", type="string", length=100, nullable=true, options={"comment"="Значение поля в файле интеграции, для multiselect_id"})
     */
    private $relatedValue;

    /**
     * @var int|null
     *
     * @ORM\Column(name="created_at", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $createdAt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="updated_at", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $updatedAt;

    /**
     * @var \AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="multiselect_id", referencedColumnName="id")
     * })
     */
    private $multiselect;

    /**
     * @var \AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="field_id", referencedColumnName="id")
     * })
     */
    private $field;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntegrationId(): ?int
    {
        return $this->integrationId;
    }

    public function setIntegrationId(int $integrationId): self
    {
        $this->integrationId = $integrationId;

        return $this;
    }

    public function getRelatedField(): ?string
    {
        return $this->relatedField;
    }

    public function setRelatedField(string $relatedField): self
    {
        $this->relatedField = $relatedField;

        return $this;
    }

    public function getRelatedValue(): ?string
    {
        return $this->relatedValue;
    }

    public function setRelatedValue(?string $relatedValue): self
    {
        $this->relatedValue = $relatedValue;

        return $this;
    }

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getMultiselect(): ?AdvFieldsMultiselectList
    {
        return $this->multiselect;
    }

    public function setMultiselect(?AdvFieldsMultiselectList $multiselect): self
    {
        $this->multiselect = $multiselect;

        return $this;
    }

    public function getField(): ?AdvFields
    {
        return $this->field;
    }

    public function setField(?AdvFields $field): self
    {
        $this->field = $field;

        return $this;
    }


}

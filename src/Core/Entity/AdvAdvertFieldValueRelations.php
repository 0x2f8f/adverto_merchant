<?php

namespace App\Core\Entity;

use App\Adverts\Entity\Advert;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdvAdvertFieldValueRelations
 *
 * @ORM\Table(name="adv_advert_field_value_relations", indexes={@ORM\Index(name="adv_dependence_seq_id_fk", columns={"seq_id"}), @ORM\Index(name="hash_advert", columns={"hash_advert"}), @ORM\Index(name="id_field", columns={"id_field"}), @ORM\Index(name="adv_advert_field_value_relations_FK", columns={"id_multiselect"})})
 * @ORM\Entity
 */
class AdvAdvertFieldValueRelations
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
     * @var bool
     *
     * @ORM\Column(name="is_other", type="boolean", nullable=false, options={"comment"="выбрано ли для данного филда значение ""Другое"""})
     */
    private $isOther;

    /**
     * @var string
     *
     * @ORM\Column(name="value_metric", type="string", length=100, nullable=false, options={"comment"="Если НЕ multiselect, а иные значения, то сюда пишется значение, а id_multiselect ставится 0"})
     */
    private $valueMetric;

    /**
     * @var string
     *
     * @ORM\Column(name="value_imperial", type="string", length=100, nullable=false, options={"comment"="Если НЕ multiselect, а иные значения, то сюда пишется значение, а id_multiselect ставится 0"})
     */
    private $valueImperial;

    /**
     * @var Advert
     *
     * @ORM\ManyToOne(targetEntity="App\Adverts\Entity\Advert")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hash_advert", referencedColumnName="hash")
     * })
     */
    private $hashAdvert;

    /**
     * @var AdvFieldsDependence
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsDependence")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="seq_id", referencedColumnName="id")
     * })
     */
    private $seq;

    /**
     * @var AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_multiselect", referencedColumnName="id")
     * })
     */
    private $idMultiselect;

    /**
     * @var AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_field", referencedColumnName="id")
     * })
     */
    private $idField;

    public function getId(): ?string
    {
        return $this->id;
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

    public function getValueMetric(): ?string
    {
        return $this->valueMetric;
    }

    public function setValueMetric(string $valueMetric): self
    {
        $this->valueMetric = $valueMetric;

        return $this;
    }

    public function getValueImperial(): ?string
    {
        return $this->valueImperial;
    }

    public function setValueImperial(string $valueImperial): self
    {
        $this->valueImperial = $valueImperial;

        return $this;
    }

    public function getHashAdvert(): ?Advert
    {
        return $this->hashAdvert;
    }

    public function setHashAdvert(?Advert $hashAdvert): self
    {
        $this->hashAdvert = $hashAdvert;

        return $this;
    }

    public function getSeq(): ?AdvFieldsDependence
    {
        return $this->seq;
    }

    public function setSeq(?AdvFieldsDependence $seq): self
    {
        $this->seq = $seq;

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

    public function getIdField(): ?AdvFields
    {
        return $this->idField;
    }

    public function setIdField(?AdvFields $idField): self
    {
        $this->idField = $idField;

        return $this;
    }


}

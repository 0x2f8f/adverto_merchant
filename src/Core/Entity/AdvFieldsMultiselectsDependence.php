<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvFieldsMultiselectsDependence
 *
 * @ORM\Table(name="adv_fields_multiselects_dependence", uniqueConstraints={@ORM\UniqueConstraint(name="union_columns", columns={"union_columns"})}, indexes={@ORM\Index(name="adv_fields_multiselects_dependence_FK_11", columns={"dep_multiselect_id_11"}), @ORM\Index(name="adv_fields_multiselects_dependence_FK_8", columns={"dep_multiselect_id_8"}), @ORM\Index(name="adv_fields_multiselects_dependence_FK_5", columns={"dep_multiselect_id_5"}), @ORM\Index(name="adv_fields_multiselects_dependence_FK_2", columns={"dep_multiselect_id_2"}), @ORM\Index(name="adv_fields_multiselects_dependence_FK_15", columns={"dep_multiselect_id_15"}), @ORM\Index(name="adv_fields_multiselects_dependence_FK_12", columns={"dep_multiselect_id_12"}), @ORM\Index(name="adv_fields_multiselects_dependence_FK_9", columns={"dep_multiselect_id_9"}), @ORM\Index(name="adv_fields_multiselects_dependence_FK_6", columns={"dep_multiselect_id_6"}), @ORM\Index(name="adv_fields_multiselects_dependence_FK_3", columns={"dep_multiselect_id_3"}), @ORM\Index(name="adv_fields_multiselects_dependence_FK_m", columns={"multiselect_id"}), @ORM\Index(name="adv_fields_multiselects_dependence_FK", columns={"fields_dependence_id"}), @ORM\Index(name="adv_fields_multiselects_dependence_FK_13", columns={"dep_multiselect_id_13"}), @ORM\Index(name="adv_fields_multiselects_dependence_FK_10", columns={"dep_multiselect_id_10"}), @ORM\Index(name="adv_fields_multiselects_dependence_FK_7", columns={"dep_multiselect_id_7"}), @ORM\Index(name="adv_fields_multiselects_dependence_FK_4", columns={"dep_multiselect_id_4"}), @ORM\Index(name="adv_fields_multiselects_dependence_FK_1", columns={"dep_multiselect_id_1"}), @ORM\Index(name="adv_fields_multiselects_dependence_FK_14", columns={"dep_multiselect_id_14"})})
 * @ORM\Entity
 */
class AdvFieldsMultiselectsDependence
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
     * @var string|null
     *
     * @ORM\Column(name="union_columns", type="string", length=255, nullable=true, options={"comment"="Column for checking duplicates in table"})
     */
    private $unionColumns;

    /**
     * @var \AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_multiselect_id_12", referencedColumnName="id")
     * })
     */
    private $depMultiselectId12;

    /**
     * @var \AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_multiselect_id_7", referencedColumnName="id")
     * })
     */
    private $depMultiselectId7;

    /**
     * @var \AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_multiselect_id_14", referencedColumnName="id")
     * })
     */
    private $depMultiselectId14;

    /**
     * @var \AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_multiselect_id_9", referencedColumnName="id")
     * })
     */
    private $depMultiselectId9;

    /**
     * @var \AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_multiselect_id_2", referencedColumnName="id")
     * })
     */
    private $depMultiselectId2;

    /**
     * @var \AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_multiselect_id_1", referencedColumnName="id")
     * })
     */
    private $depMultiselectId1;

    /**
     * @var \AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_multiselect_id_4", referencedColumnName="id")
     * })
     */
    private $depMultiselectId4;

    /**
     * @var \AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_multiselect_id_11", referencedColumnName="id")
     * })
     */
    private $depMultiselectId11;

    /**
     * @var \AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_multiselect_id_6", referencedColumnName="id")
     * })
     */
    private $depMultiselectId6;

    /**
     * @var \AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_multiselect_id_13", referencedColumnName="id")
     * })
     */
    private $depMultiselectId13;

    /**
     * @var \AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_multiselect_id_8", referencedColumnName="id")
     * })
     */
    private $depMultiselectId8;

    /**
     * @var \AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_multiselect_id_15", referencedColumnName="id")
     * })
     */
    private $depMultiselectId15;

    /**
     * @var \AdvFieldsDependence
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsDependence")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fields_dependence_id", referencedColumnName="id")
     * })
     */
    private $fieldsDependence;

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
     * @var \AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_multiselect_id_3", referencedColumnName="id")
     * })
     */
    private $depMultiselectId3;

    /**
     * @var \AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_multiselect_id_10", referencedColumnName="id")
     * })
     */
    private $depMultiselectId10;

    /**
     * @var \AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_multiselect_id_5", referencedColumnName="id")
     * })
     */
    private $depMultiselectId5;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getUnionColumns(): ?string
    {
        return $this->unionColumns;
    }

    public function setUnionColumns(?string $unionColumns): self
    {
        $this->unionColumns = $unionColumns;

        return $this;
    }

    public function getDepMultiselectId12(): ?AdvFieldsMultiselectList
    {
        return $this->depMultiselectId12;
    }

    public function setDepMultiselectId12(?AdvFieldsMultiselectList $depMultiselectId12): self
    {
        $this->depMultiselectId12 = $depMultiselectId12;

        return $this;
    }

    public function getDepMultiselectId7(): ?AdvFieldsMultiselectList
    {
        return $this->depMultiselectId7;
    }

    public function setDepMultiselectId7(?AdvFieldsMultiselectList $depMultiselectId7): self
    {
        $this->depMultiselectId7 = $depMultiselectId7;

        return $this;
    }

    public function getDepMultiselectId14(): ?AdvFieldsMultiselectList
    {
        return $this->depMultiselectId14;
    }

    public function setDepMultiselectId14(?AdvFieldsMultiselectList $depMultiselectId14): self
    {
        $this->depMultiselectId14 = $depMultiselectId14;

        return $this;
    }

    public function getDepMultiselectId9(): ?AdvFieldsMultiselectList
    {
        return $this->depMultiselectId9;
    }

    public function setDepMultiselectId9(?AdvFieldsMultiselectList $depMultiselectId9): self
    {
        $this->depMultiselectId9 = $depMultiselectId9;

        return $this;
    }

    public function getDepMultiselectId2(): ?AdvFieldsMultiselectList
    {
        return $this->depMultiselectId2;
    }

    public function setDepMultiselectId2(?AdvFieldsMultiselectList $depMultiselectId2): self
    {
        $this->depMultiselectId2 = $depMultiselectId2;

        return $this;
    }

    public function getDepMultiselectId1(): ?AdvFieldsMultiselectList
    {
        return $this->depMultiselectId1;
    }

    public function setDepMultiselectId1(?AdvFieldsMultiselectList $depMultiselectId1): self
    {
        $this->depMultiselectId1 = $depMultiselectId1;

        return $this;
    }

    public function getDepMultiselectId4(): ?AdvFieldsMultiselectList
    {
        return $this->depMultiselectId4;
    }

    public function setDepMultiselectId4(?AdvFieldsMultiselectList $depMultiselectId4): self
    {
        $this->depMultiselectId4 = $depMultiselectId4;

        return $this;
    }

    public function getDepMultiselectId11(): ?AdvFieldsMultiselectList
    {
        return $this->depMultiselectId11;
    }

    public function setDepMultiselectId11(?AdvFieldsMultiselectList $depMultiselectId11): self
    {
        $this->depMultiselectId11 = $depMultiselectId11;

        return $this;
    }

    public function getDepMultiselectId6(): ?AdvFieldsMultiselectList
    {
        return $this->depMultiselectId6;
    }

    public function setDepMultiselectId6(?AdvFieldsMultiselectList $depMultiselectId6): self
    {
        $this->depMultiselectId6 = $depMultiselectId6;

        return $this;
    }

    public function getDepMultiselectId13(): ?AdvFieldsMultiselectList
    {
        return $this->depMultiselectId13;
    }

    public function setDepMultiselectId13(?AdvFieldsMultiselectList $depMultiselectId13): self
    {
        $this->depMultiselectId13 = $depMultiselectId13;

        return $this;
    }

    public function getDepMultiselectId8(): ?AdvFieldsMultiselectList
    {
        return $this->depMultiselectId8;
    }

    public function setDepMultiselectId8(?AdvFieldsMultiselectList $depMultiselectId8): self
    {
        $this->depMultiselectId8 = $depMultiselectId8;

        return $this;
    }

    public function getDepMultiselectId15(): ?AdvFieldsMultiselectList
    {
        return $this->depMultiselectId15;
    }

    public function setDepMultiselectId15(?AdvFieldsMultiselectList $depMultiselectId15): self
    {
        $this->depMultiselectId15 = $depMultiselectId15;

        return $this;
    }

    public function getFieldsDependence(): ?AdvFieldsDependence
    {
        return $this->fieldsDependence;
    }

    public function setFieldsDependence(?AdvFieldsDependence $fieldsDependence): self
    {
        $this->fieldsDependence = $fieldsDependence;

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

    public function getDepMultiselectId3(): ?AdvFieldsMultiselectList
    {
        return $this->depMultiselectId3;
    }

    public function setDepMultiselectId3(?AdvFieldsMultiselectList $depMultiselectId3): self
    {
        $this->depMultiselectId3 = $depMultiselectId3;

        return $this;
    }

    public function getDepMultiselectId10(): ?AdvFieldsMultiselectList
    {
        return $this->depMultiselectId10;
    }

    public function setDepMultiselectId10(?AdvFieldsMultiselectList $depMultiselectId10): self
    {
        $this->depMultiselectId10 = $depMultiselectId10;

        return $this;
    }

    public function getDepMultiselectId5(): ?AdvFieldsMultiselectList
    {
        return $this->depMultiselectId5;
    }

    public function setDepMultiselectId5(?AdvFieldsMultiselectList $depMultiselectId5): self
    {
        $this->depMultiselectId5 = $depMultiselectId5;

        return $this;
    }


}

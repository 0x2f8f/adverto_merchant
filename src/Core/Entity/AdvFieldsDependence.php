<?php

namespace App\Core\Entity;

use App\Adverts\Entity\Category;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdvFieldsDependence
 *
 * @ORM\Table(name="adv_fields_dependence", indexes={@ORM\Index(name="adv_fields_dependence_FK_11", columns={"dep_field_id_11"}), @ORM\Index(name="adv_fields_dependence_FK_8", columns={"dep_field_id_8"}), @ORM\Index(name="adv_fields_dependence_FK_5", columns={"dep_field_id_5"}), @ORM\Index(name="adv_fields_dependence_FK_2", columns={"dep_field_id_2"}), @ORM\Index(name="adv_fields_dependence_FK", columns={"cat_id"}), @ORM\Index(name="adv_fields_dependence_FK_15", columns={"dep_field_id_15"}), @ORM\Index(name="adv_fields_dependence_FK_12", columns={"dep_field_id_12"}), @ORM\Index(name="adv_fields_dependence_FK_9", columns={"dep_field_id_9"}), @ORM\Index(name="adv_fields_dependence_FK_6", columns={"dep_field_id_6"}), @ORM\Index(name="adv_fields_dependence_FK_3", columns={"dep_field_id_3"}), @ORM\Index(name="adv_fields_dependence_FK_main", columns={"field_id"}), @ORM\Index(name="adv_fields_dependence_FK_13", columns={"dep_field_id_13"}), @ORM\Index(name="adv_fields_dependence_FK_10", columns={"dep_field_id_10"}), @ORM\Index(name="adv_fields_dependence_FK_7", columns={"dep_field_id_7"}), @ORM\Index(name="adv_fields_dependence_FK_4", columns={"dep_field_id_4"}), @ORM\Index(name="adv_fields_dependence_FK_1", columns={"dep_field_id_1"}), @ORM\Index(name="adv_fields_dependence_FK_14", columns={"dep_field_id_14"})})
 * @ORM\Entity
 */
class AdvFieldsDependence
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
     * @var AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_field_id_12", referencedColumnName="id")
     * })
     */
    private $depFieldId12;

    /**
     * @var AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_field_id_7", referencedColumnName="id")
     * })
     */
    private $depFieldId7;

    /**
     * @var AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_field_id_14", referencedColumnName="id")
     * })
     */
    private $depFieldId14;

    /**
     * @var AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_field_id_9", referencedColumnName="id")
     * })
     */
    private $depFieldId9;

    /**
     * @var AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_field_id_2", referencedColumnName="id")
     * })
     */
    private $depFieldId2;

    /**
     * @var AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_field_id_1", referencedColumnName="id")
     * })
     */
    private $depFieldId1;

    /**
     * @var AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_field_id_4", referencedColumnName="id")
     * })
     */
    private $depFieldId4;

    /**
     * @var AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_field_id_11", referencedColumnName="id")
     * })
     */
    private $depFieldId11;

    /**
     * @var AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_field_id_6", referencedColumnName="id")
     * })
     */
    private $depFieldId6;

    /**
     * @var AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_field_id_13", referencedColumnName="id")
     * })
     */
    private $depFieldId13;

    /**
     * @var AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_field_id_8", referencedColumnName="id")
     * })
     */
    private $depFieldId8;

    /**
     * @var AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_field_id_15", referencedColumnName="id")
     * })
     */
    private $depFieldId15;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="App\Adverts\Entity\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cat_id", referencedColumnName="id")
     * })
     */
    private $cat;

    /**
     * @var AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="field_id", referencedColumnName="id")
     * })
     */
    private $field;

    /**
     * @var AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_field_id_3", referencedColumnName="id")
     * })
     */
    private $depFieldId3;

    /**
     * @var AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_field_id_10", referencedColumnName="id")
     * })
     */
    private $depFieldId10;

    /**
     * @var AdvFields
     *
     * @ORM\ManyToOne(targetEntity="AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dep_field_id_5", referencedColumnName="id")
     * })
     */
    private $depFieldId5;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepFieldId12(): ?AdvFields
    {
        return $this->depFieldId12;
    }

    public function setDepFieldId12(?AdvFields $depFieldId12): self
    {
        $this->depFieldId12 = $depFieldId12;

        return $this;
    }

    public function getDepFieldId7(): ?AdvFields
    {
        return $this->depFieldId7;
    }

    public function setDepFieldId7(?AdvFields $depFieldId7): self
    {
        $this->depFieldId7 = $depFieldId7;

        return $this;
    }

    public function getDepFieldId14(): ?AdvFields
    {
        return $this->depFieldId14;
    }

    public function setDepFieldId14(?AdvFields $depFieldId14): self
    {
        $this->depFieldId14 = $depFieldId14;

        return $this;
    }

    public function getDepFieldId9(): ?AdvFields
    {
        return $this->depFieldId9;
    }

    public function setDepFieldId9(?AdvFields $depFieldId9): self
    {
        $this->depFieldId9 = $depFieldId9;

        return $this;
    }

    public function getDepFieldId2(): ?AdvFields
    {
        return $this->depFieldId2;
    }

    public function setDepFieldId2(?AdvFields $depFieldId2): self
    {
        $this->depFieldId2 = $depFieldId2;

        return $this;
    }

    public function getDepFieldId1(): ?AdvFields
    {
        return $this->depFieldId1;
    }

    public function setDepFieldId1(?AdvFields $depFieldId1): self
    {
        $this->depFieldId1 = $depFieldId1;

        return $this;
    }

    public function getDepFieldId4(): ?AdvFields
    {
        return $this->depFieldId4;
    }

    public function setDepFieldId4(?AdvFields $depFieldId4): self
    {
        $this->depFieldId4 = $depFieldId4;

        return $this;
    }

    public function getDepFieldId11(): ?AdvFields
    {
        return $this->depFieldId11;
    }

    public function setDepFieldId11(?AdvFields $depFieldId11): self
    {
        $this->depFieldId11 = $depFieldId11;

        return $this;
    }

    public function getDepFieldId6(): ?AdvFields
    {
        return $this->depFieldId6;
    }

    public function setDepFieldId6(?AdvFields $depFieldId6): self
    {
        $this->depFieldId6 = $depFieldId6;

        return $this;
    }

    public function getDepFieldId13(): ?AdvFields
    {
        return $this->depFieldId13;
    }

    public function setDepFieldId13(?AdvFields $depFieldId13): self
    {
        $this->depFieldId13 = $depFieldId13;

        return $this;
    }

    public function getDepFieldId8(): ?AdvFields
    {
        return $this->depFieldId8;
    }

    public function setDepFieldId8(?AdvFields $depFieldId8): self
    {
        $this->depFieldId8 = $depFieldId8;

        return $this;
    }

    public function getDepFieldId15(): ?AdvFields
    {
        return $this->depFieldId15;
    }

    public function setDepFieldId15(?AdvFields $depFieldId15): self
    {
        $this->depFieldId15 = $depFieldId15;

        return $this;
    }

    public function getCat(): ?Category
    {
        return $this->cat;
    }

    public function setCat(?Category $cat): self
    {
        $this->cat = $cat;

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

    public function getDepFieldId3(): ?AdvFields
    {
        return $this->depFieldId3;
    }

    public function setDepFieldId3(?AdvFields $depFieldId3): self
    {
        $this->depFieldId3 = $depFieldId3;

        return $this;
    }

    public function getDepFieldId10(): ?AdvFields
    {
        return $this->depFieldId10;
    }

    public function setDepFieldId10(?AdvFields $depFieldId10): self
    {
        $this->depFieldId10 = $depFieldId10;

        return $this;
    }

    public function getDepFieldId5(): ?AdvFields
    {
        return $this->depFieldId5;
    }

    public function setDepFieldId5(?AdvFields $depFieldId5): self
    {
        $this->depFieldId5 = $depFieldId5;

        return $this;
    }


}

<?php

namespace App\Core\Entity;

use App\Adverts\Entity\Category;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdvFieldsTitleToFieldRelation
 *
 * @ORM\Table(name="adv_fields_title_to_field_relation", uniqueConstraints={@ORM\UniqueConstraint(name="adv_fields_title_to_field_relation_UN", columns={"title_field_id", "related_field_id", "cat_id"})}, indexes={@ORM\Index(name="adv_fields_title_items_relation_category_FK", columns={"cat_id"}), @ORM\Index(name="adv_fields_title_to_field_relation_FK_1", columns={"related_field_id"}), @ORM\Index(name="IDX_3A57F2736DACB211", columns={"title_field_id"})})
 * @ORM\Entity
 */
class AdvFieldsTitleToFieldRelation
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
     *   @ORM\JoinColumn(name="title_field_id", referencedColumnName="id")
     * })
     */
    private $titleField;

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
     *   @ORM\JoinColumn(name="related_field_id", referencedColumnName="id")
     * })
     */
    private $relatedField;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleField(): ?AdvFields
    {
        return $this->titleField;
    }

    public function setTitleField(?AdvFields $titleField): self
    {
        $this->titleField = $titleField;

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

    public function getRelatedField(): ?AdvFields
    {
        return $this->relatedField;
    }

    public function setRelatedField(?AdvFields $relatedField): self
    {
        $this->relatedField = $relatedField;

        return $this;
    }


}

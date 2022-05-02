<?php

namespace App\Adverts\Entity;

use App\Core\Entity\AdvFields;
use Doctrine\ORM\Mapping as ORM;

/**
 * CategoryFieldRelations
 *
 * @ORM\Table(name="adv_category_field_relations", uniqueConstraints={@ORM\UniqueConstraint(name="cat_id", columns={"cat_id", "field_id"})}, indexes={@ORM\Index(name="field_id", columns={"field_id"}), @ORM\Index(name="IDX_70CBD5BDE6ADA943", columns={"cat_id"})})
 * @ORM\Entity
 */
class CategoryFieldRelations
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
     * @var int
     *
     * @ORM\Column(name="sort", type="integer", nullable=false)
     */
    private $sort;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cat_id", referencedColumnName="id")
     * })
     */
    private $cat;

    /**
     * @var AdvFields
     *
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\AdvFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="field_id", referencedColumnName="id")
     * })
     */
    private $field;

    public function getId(): ?int
    {
        return $this->id;
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


}

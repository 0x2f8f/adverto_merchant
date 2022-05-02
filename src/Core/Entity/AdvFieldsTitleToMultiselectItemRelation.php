<?php

namespace App\Core\Entity;

use App\Adverts\Entity\Category;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdvFieldsTitleToMultiselectItemRelation
 *
 * @ORM\Table(name="adv_fields_title_to_multiselect_item_relation", uniqueConstraints={@ORM\UniqueConstraint(name="adv_fields_title_to_multiselect_item_relation_UN", columns={"title_multiselect_item_id", "related_multiselect_item_id", "cat_id"})}, indexes={@ORM\Index(name="adv_fields_title_items_relation_FK", columns={"cat_id"}), @ORM\Index(name="adv_fields_title_to_multiselect_item_relation_FK_1", columns={"related_multiselect_item_id"}), @ORM\Index(name="IDX_D04E1BE5999D8125", columns={"title_multiselect_item_id"})})
 * @ORM\Entity
 */
class AdvFieldsTitleToMultiselectItemRelation
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
     * @var AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="title_multiselect_item_id", referencedColumnName="id")
     * })
     */
    private $titleMultiselectItem;

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
     * @var AdvFieldsMultiselectList
     *
     * @ORM\ManyToOne(targetEntity="AdvFieldsMultiselectList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="related_multiselect_item_id", referencedColumnName="id")
     * })
     */
    private $relatedMultiselectItem;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleMultiselectItem(): ?AdvFieldsMultiselectList
    {
        return $this->titleMultiselectItem;
    }

    public function setTitleMultiselectItem(?AdvFieldsMultiselectList $titleMultiselectItem): self
    {
        $this->titleMultiselectItem = $titleMultiselectItem;

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

    public function getRelatedMultiselectItem(): ?AdvFieldsMultiselectList
    {
        return $this->relatedMultiselectItem;
    }

    public function setRelatedMultiselectItem(?AdvFieldsMultiselectList $relatedMultiselectItem): self
    {
        $this->relatedMultiselectItem = $relatedMultiselectItem;

        return $this;
    }


}

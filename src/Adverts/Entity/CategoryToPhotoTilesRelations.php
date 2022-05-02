<?php

namespace App\Adverts\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoryToPhotoTilesRelations
 *
 * @ORM\Table(name="adv_category_to_photo_tiles_relations")
 * @ORM\Entity
 */
class CategoryToPhotoTilesRelations
{
    /**
     * @var int
     *
     * @ORM\Column(name="category_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $categoryId;

    /**
     * @var int
     *
     * @ORM\Column(name="photo_tile_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $photoTileId;

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function getPhotoTileId(): ?int
    {
        return $this->photoTileId;
    }


}

<?php

namespace App\Core\Entity;

use App\Core\Traits\Incremental32IdTrait;
use App\Core\Traits\MethodTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Core\Repository\LocationRepository")
 * @ORM\Table(name="adv_locations",
 *     indexes={
 *         @ORM\Index(name="parent_id_idx", columns={"parent_id"}),
 *         @ORM\Index(name="IDX_17E64ABA79066886", columns={"root_id"}),
 *         @ORM\Index(name="index_slug", columns={"slug"}),
 *     },
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(name="word", columns={"word", "parent_id"}),
 *         @ORM\UniqueConstraint(name="slug", columns={"slug", "root_id"}),
 *     },
 * )
 *
 * @method getLft(): ?int
 * @method setLft(?int $lft): self
 *
 * @method getRgt(): ?int
 * @method setRgt(?int $rgt): self
 *
 * @method getLvl(): ?int
 * @method setLvl(?int $lvl): self
 *
 * @method getWord(): ?string
 * @method setWord(?string $word): self
 *
 * @method getType(): ?string
 * @method setType(?string $type): self
 *
 * @method getLatitude(): ?float
 * @method setLatitude(?float $latitude): self
 *
 * @method getLongitude(): ?float
 * @method setLongitude(?float $longitude): self
 *
 * @method getReferenceId(): ?int
 * @method setReferenceId(?int $referenceId): self
 *
 * @method getZoom(): ?int
 * @method setZoom(?int $zoom): self
 *
 * @method getPhoneCode(): ?string
 * @method setPhoneCode(?string $phoneCode): self
 *
 * @method getSlug(): ?string
 * @method setSlug(?string $slug): self
 *
 * @method getParent(): ?Location
 * @method setParent(?Location $parent): self
 *
 * @method setRoot(?Location $root): self
 * @method getRoot(): ?Location
 */
class Location
{
    use Incremental32IdTrait;
    use MethodTrait;

    public const LEVEL_COUNTRY = 0;
    public const LEVEL_REGION = 1;
    public const LEVEL_CITY = 2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $lft = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $rgt = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $lvl = null;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private ?string $word = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $type = null;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $latitude = null;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $longitude = null;

    /**
     * @ORM\Column(type="integer", name="reference_id", nullable=true)
     */
    private ?int $referenceId = null;

    /**
     * @ORM\Column(type="integer", name="zoom", nullable=true)
     */
    private ?int $zoom = null;

    /**
     * @ORM\Column(type="string", name="phone_code", length=10, nullable=true)
     */
    private ?string $phoneCode = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $slug = null;

    /**
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\Location", fetch="LAZY")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     */
    private ?Location $parent = null;

    /**
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\Location", fetch="LAZY")
     * @ORM\JoinColumn(name="root_id", referencedColumnName="id", nullable=true)
     */
    private ?Location $root = null;

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->word;
    }

}

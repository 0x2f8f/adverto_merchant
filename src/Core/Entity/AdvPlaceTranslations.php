<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvPlaceTranslations
 *
 * @ORM\Table(name="adv_place_translations", indexes={@ORM\Index(name="IDX_1702483E232D562B", columns={"object_id"})})
 * @ORM\Entity
 */
class AdvPlaceTranslations
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
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=10, nullable=false)
     */
    private $locale;

    /**
     * @var string
     *
     * @ORM\Column(name="field", type="string", length=50, nullable=false)
     */
    private $field;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=1000, nullable=false)
     */
    private $content;

    /**
     * @var AdvPlaces
     *
     * @ORM\ManyToOne(targetEntity="AdvPlaces")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="object_id", referencedColumnName="id")
     * })
     */
    private $object;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function getField(): ?string
    {
        return $this->field;
    }

    public function setField(string $field): self
    {
        $this->field = $field;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getObject(): ?AdvPlaces
    {
        return $this->object;
    }

    public function setObject(?AdvPlaces $object): self
    {
        $this->object = $object;

        return $this;
    }


}

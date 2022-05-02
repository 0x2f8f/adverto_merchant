<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvPlaces
 *
 * @ORM\Table(name="adv_places", uniqueConstraints={@ORM\UniqueConstraint(name="word_idx", columns={"word"})})
 * @ORM\Entity
 */
class AdvPlaces
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
     * @var string|null
     *
     * @ORM\Column(name="word", type="string", length=200, nullable=true)
     */
    private $word;

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="string", length=200, nullable=true)
     */
    private $icon;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWord(): ?string
    {
        return $this->word;
    }

    public function setWord(?string $word): self
    {
        $this->word = $word;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }


}

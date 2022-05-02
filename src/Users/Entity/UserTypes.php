<?php

namespace App\Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserTypes
 *
 * @ORM\Table(name="adv_user_types")
 * @ORM\Entity
 */
class UserTypes
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
     * @ORM\Column(name="name_slug", type="string", length=100, nullable=false)
     */
    private $nameSlug;

    /**
     * @var string
     *
     * @ORM\Column(name="description_slug", type="string", length=255, nullable=false)
     */
    private $descriptionSlug;

    /**
     * @var string|null
     *
     * @ORM\Column(name="logo", type="text", length=65535, nullable=true)
     */
    private $logo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameSlug(): ?string
    {
        return $this->nameSlug;
    }

    public function setNameSlug(string $nameSlug): self
    {
        $this->nameSlug = $nameSlug;

        return $this;
    }

    public function getDescriptionSlug(): ?string
    {
        return $this->descriptionSlug;
    }

    public function setDescriptionSlug(string $descriptionSlug): self
    {
        $this->descriptionSlug = $descriptionSlug;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }


}

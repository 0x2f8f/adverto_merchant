<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvSotialNetworks
 *
 * @ORM\Table(name="adv_sotial_networks")
 * @ORM\Entity
 */
class AdvSotialNetworks
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
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="main_page_url", type="string", length=255, nullable=false)
     */
    private $mainPageUrl;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_general", type="boolean", nullable=false, options={"comment"="TRUE - значит доступна для входа из любой страны"})
     */
    private $isGeneral;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getMainPageUrl(): ?string
    {
        return $this->mainPageUrl;
    }

    public function setMainPageUrl(string $mainPageUrl): self
    {
        $this->mainPageUrl = $mainPageUrl;

        return $this;
    }

    public function getIsGeneral(): ?bool
    {
        return $this->isGeneral;
    }

    public function setIsGeneral(bool $isGeneral): self
    {
        $this->isGeneral = $isGeneral;

        return $this;
    }


}

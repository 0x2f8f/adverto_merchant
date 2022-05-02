<?php

namespace App\Core\Entity;

use App\Adverts\Entity\Advert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Lang
 *
 * @ORM\Table(name="adv_langs", uniqueConstraints={@ORM\UniqueConstraint(name="code_3", columns={"code"})})
 * @ORM\Entity
 */
class Lang
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=2, nullable=false, options={"fixed"=true})
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="translate_ready", type="boolean", nullable=false)
     */
    private $translateReady = '0';


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
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

    public function getTranslateReady(): ?bool
    {
        return $this->translateReady;
    }

    public function setTranslateReady(bool $translateReady): self
    {
        $this->translateReady = $translateReady;

        return $this;
    }

}

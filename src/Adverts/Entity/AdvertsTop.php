<?php

namespace App\Adverts\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvertsTop
 *
 * @ORM\Table(name="adv_adverts_top")
 * @ORM\Entity
 */
class AdvertsTop
{
    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=7, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $hash = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="main_top", type="boolean", nullable=false)
     */
    private $mainTop = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="category_top", type="boolean", nullable=false)
     */
    private $categoryTop = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="main_ts", type="integer", nullable=false)
     */
    private $mainTs = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="category_ts", type="integer", nullable=false)
     */
    private $categoryTs = '0';

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function getMainTop(): ?bool
    {
        return $this->mainTop;
    }

    public function setMainTop(bool $mainTop): self
    {
        $this->mainTop = $mainTop;

        return $this;
    }

    public function getCategoryTop(): ?bool
    {
        return $this->categoryTop;
    }

    public function setCategoryTop(bool $categoryTop): self
    {
        $this->categoryTop = $categoryTop;

        return $this;
    }

    public function getMainTs(): ?int
    {
        return $this->mainTs;
    }

    public function setMainTs(int $mainTs): self
    {
        $this->mainTs = $mainTs;

        return $this;
    }

    public function getCategoryTs(): ?int
    {
        return $this->categoryTs;
    }

    public function setCategoryTs(int $categoryTs): self
    {
        $this->categoryTs = $categoryTs;

        return $this;
    }


}

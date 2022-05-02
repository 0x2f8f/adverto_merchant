<?php

namespace App\Adverts\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvertsComplainReasons
 *
 * @ORM\Table(name="adv_adverts_complain_reasons", indexes={@ORM\Index(name="adv_adverts_complain_reasons_adv_adverts_complain_reasons_id_fk", columns={"id_parent"})})
 * @ORM\Entity
 */
class AdvertsComplainReasons
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
     * @ORM\Column(name="title_code", type="string", length=50, nullable=false)
     */
    private $titleCode;

    /**
     * @var int
     *
     * @ORM\Column(name="sort", type="integer", nullable=false)
     */
    private $sort;

    /**
     * @var bool
     *
     * @ORM\Column(name="have_child", type="boolean", nullable=false)
     */
    private $haveChild = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="category_id_list", type="text", length=0, nullable=true)
     */
    private $categoryIdList;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="block_forever", type="boolean", nullable=true)
     */
    private $blockForever = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="only_for_private_user", type="boolean", nullable=true)
     */
    private $onlyForPrivateUser = '0';

    /**
     * @var AdvertsComplainReasons
     *
     * @ORM\ManyToOne(targetEntity="AdvertsComplainReasons")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_parent", referencedColumnName="id")
     * })
     */
    private $idParent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleCode(): ?string
    {
        return $this->titleCode;
    }

    public function setTitleCode(string $titleCode): self
    {
        $this->titleCode = $titleCode;

        return $this;
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

    public function getHaveChild(): ?bool
    {
        return $this->haveChild;
    }

    public function setHaveChild(bool $haveChild): self
    {
        $this->haveChild = $haveChild;

        return $this;
    }

    public function getCategoryIdList(): ?string
    {
        return $this->categoryIdList;
    }

    public function setCategoryIdList(?string $categoryIdList): self
    {
        $this->categoryIdList = $categoryIdList;

        return $this;
    }

    public function getBlockForever(): ?bool
    {
        return $this->blockForever;
    }

    public function setBlockForever(?bool $blockForever): self
    {
        $this->blockForever = $blockForever;

        return $this;
    }

    public function getOnlyForPrivateUser(): ?bool
    {
        return $this->onlyForPrivateUser;
    }

    public function setOnlyForPrivateUser(?bool $onlyForPrivateUser): self
    {
        $this->onlyForPrivateUser = $onlyForPrivateUser;

        return $this;
    }

    public function getIdParent(): ?self
    {
        return $this->idParent;
    }

    public function setIdParent(?self $idParent): self
    {
        $this->idParent = $idParent;

        return $this;
    }


}

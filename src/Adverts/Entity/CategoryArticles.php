<?php

namespace App\Adverts\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoryArticles
 *
 * @ORM\Table(name="adv_category_articles")
 * @ORM\Entity
 */
class CategoryArticles
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="category_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $categoryId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="country_id", type="smallint", nullable=true, options={"unsigned"=true})
     */
    private $countryId;

    /**
     * @var int
     *
     * @ORM\Column(name="lang_id", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $langId;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
     */
    private $content;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getCountryId(): ?int
    {
        return $this->countryId;
    }

    public function setCountryId(?int $countryId): self
    {
        $this->countryId = $countryId;

        return $this;
    }

    public function getLangId(): ?int
    {
        return $this->langId;
    }

    public function setLangId(int $langId): self
    {
        $this->langId = $langId;

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


}

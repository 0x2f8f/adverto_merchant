<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvSiteContent
 *
 * @ORM\Table(name="adv_site_content", uniqueConstraints={@ORM\UniqueConstraint(name="id_lang", columns={"id_lang", "url"})}, indexes={@ORM\Index(name="url", columns={"url"}), @ORM\Index(name="pid", columns={"pid"}), @ORM\Index(name="IDX_F1337979BA299860", columns={"id_lang"})})
 * @ORM\Entity
 */
class AdvSiteContent
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
     * @var int
     *
     * @ORM\Column(name="page_type", type="integer", nullable=false, options={"default"="1","comment"="Тип страницы: 1-страница в шаблоне сайта, 2-страница ""голая"""})
     */
    private $pageType = 1;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
     */
    private $content;

    /**
     * @var string|null
     *
     * @ORM\Column(name="javascript", type="text", length=65535, nullable=true, options={"comment"="Яваскрипт, который должен включиться в эту страницу"})
     */
    private $javascript;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=255, nullable=false)
     */
    private $keywords;

    /**
     * @var AdvSiteContent
     *
     * @ORM\ManyToOne(targetEntity="AdvSiteContent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pid", referencedColumnName="id")
     * })
     */
    private $pid;

    /**
     * @var Lang
     *
     * @ORM\ManyToOne(targetEntity="Lang")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_lang", referencedColumnName="id")
     * })
     */
    private $idLang;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPageType(): ?int
    {
        return $this->pageType;
    }

    public function setPageType(int $pageType): self
    {
        $this->pageType = $pageType;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

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

    public function getJavascript(): ?string
    {
        return $this->javascript;
    }

    public function setJavascript(?string $javascript): self
    {
        $this->javascript = $javascript;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function getPid(): ?self
    {
        return $this->pid;
    }

    public function setPid(?self $pid): self
    {
        $this->pid = $pid;

        return $this;
    }

    public function getIdLang(): ?Lang
    {
        return $this->idLang;
    }

    public function setIdLang(?Lang $idLang): self
    {
        $this->idLang = $idLang;

        return $this;
    }


}

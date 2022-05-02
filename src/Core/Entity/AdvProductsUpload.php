<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsUpload
 *
 * @ORM\Table(name="adv_products_upload", indexes={@ORM\Index(name="idx_user_id", columns={"user_id"}), @ORM\Index(name="idx_cms_user_id", columns={"cms_user_id"}), @ORM\Index(name="idx_moderator_id", columns={"moderator_id"}), @ORM\Index(name="idx_status", columns={"status"})})
 * @ORM\Entity
 */
class AdvProductsUpload
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
     * @ORM\Column(name="load_type", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $loadType;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false, options={"unsigned"=true,"comment"="Advert owner"})
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="cms_user_id", type="integer", nullable=false, options={"unsigned"=true,"comment"="Upload moderator"})
     */
    private $cmsUserId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="moderator_id", type="integer", nullable=true, options={"unsigned"=true,"comment"="Approve moderator"})
     */
    private $moderatorId;

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string", length=191, nullable=false, options={"comment"="User file name"})
     */
    private $filename;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $status;

    /**
     * @var string|null
     *
     * @ORM\Column(name="decline_reason", type="string", length=191, nullable=true)
     */
    private $declineReason;

    /**
     * @var string
     *
     * @ORM\Column(name="file_hash_original", type="string", length=191, nullable=false)
     */
    private $fileHashOriginal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="json_products", type="text", length=0, nullable=true)
     */
    private $jsonProducts;

    /**
     * @var int
     *
     * @ORM\Column(name="id_lang", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idLang;

    /**
     * @var int
     *
     * @ORM\Column(name="count_prods_total", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $countProdsTotal;

    /**
     * @var int
     *
     * @ORM\Column(name="count_prods_success", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $countProdsSuccess;

    /**
     * @var int
     *
     * @ORM\Column(name="count_prods_error", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $countProdsError;

    /**
     * @var int
     *
     * @ORM\Column(name="count_prods_warning", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $countProdsWarning;

    /**
     * @var int
     *
     * @ORM\Column(name="created_at", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $createdAt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="moderated_at", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $moderatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLoadType(): ?int
    {
        return $this->loadType;
    }

    public function setLoadType(int $loadType): self
    {
        $this->loadType = $loadType;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getCmsUserId(): ?int
    {
        return $this->cmsUserId;
    }

    public function setCmsUserId(int $cmsUserId): self
    {
        $this->cmsUserId = $cmsUserId;

        return $this;
    }

    public function getModeratorId(): ?int
    {
        return $this->moderatorId;
    }

    public function setModeratorId(?int $moderatorId): self
    {
        $this->moderatorId = $moderatorId;

        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDeclineReason(): ?string
    {
        return $this->declineReason;
    }

    public function setDeclineReason(?string $declineReason): self
    {
        $this->declineReason = $declineReason;

        return $this;
    }

    public function getFileHashOriginal(): ?string
    {
        return $this->fileHashOriginal;
    }

    public function setFileHashOriginal(string $fileHashOriginal): self
    {
        $this->fileHashOriginal = $fileHashOriginal;

        return $this;
    }

    public function getJsonProducts(): ?string
    {
        return $this->jsonProducts;
    }

    public function setJsonProducts(?string $jsonProducts): self
    {
        $this->jsonProducts = $jsonProducts;

        return $this;
    }

    public function getIdLang(): ?int
    {
        return $this->idLang;
    }

    public function setIdLang(int $idLang): self
    {
        $this->idLang = $idLang;

        return $this;
    }

    public function getCountProdsTotal(): ?int
    {
        return $this->countProdsTotal;
    }

    public function setCountProdsTotal(int $countProdsTotal): self
    {
        $this->countProdsTotal = $countProdsTotal;

        return $this;
    }

    public function getCountProdsSuccess(): ?int
    {
        return $this->countProdsSuccess;
    }

    public function setCountProdsSuccess(int $countProdsSuccess): self
    {
        $this->countProdsSuccess = $countProdsSuccess;

        return $this;
    }

    public function getCountProdsError(): ?int
    {
        return $this->countProdsError;
    }

    public function setCountProdsError(int $countProdsError): self
    {
        $this->countProdsError = $countProdsError;

        return $this;
    }

    public function getCountProdsWarning(): ?int
    {
        return $this->countProdsWarning;
    }

    public function setCountProdsWarning(int $countProdsWarning): self
    {
        $this->countProdsWarning = $countProdsWarning;

        return $this;
    }

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getModeratedAt(): ?int
    {
        return $this->moderatedAt;
    }

    public function setModeratedAt(?int $moderatedAt): self
    {
        $this->moderatedAt = $moderatedAt;

        return $this;
    }


}

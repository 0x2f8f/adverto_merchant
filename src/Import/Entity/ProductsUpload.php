<?php

namespace App\Import\Entity;

use App\Core\Entity\Lang;
use App\Import\Enum\LoadTypeEnum;
use App\Import\Enum\ProductsUploadStatusEnum;
use App\Users\Entity\User;
use App\Core\Traits\Incremental32IdTrait;
use App\Core\Traits\MethodTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Таблица для хранения загрузок
 *
 * @ORM\Table(name="adv_products_upload", indexes={@ORM\Index(name="idx_user_id", columns={"user_id"}), @ORM\Index(name="idx_cms_user_id", columns={"cms_user_id"}), @ORM\Index(name="idx_moderator_id", columns={"moderator_id"}), @ORM\Index(name="idx_status", columns={"status"})})
 * @ORM\Entity
 *
 * @method getLoadType(): LoadTypeEnum
 * @method setLoadType(LoadTypeEnum $value): self
 *
 * @method getUser(): User
 * @method setUser(User $value): self
 *
 * @method getCmsUserId(): ?int
 * @method setCmsUserId(int $value): self
 *
 * @method getModeratorId(): ?int
 * @method setModeratorId(int $value): self
 *
 * @method getFilename(): string
 * @method setFilename(string $value): self
 *
 * @method getStatus(): ProductsUploadStatusEnum
 * @method setStatus(ProductsUploadStatusEnum $value): self
 *
 * @method getDeclineReason(): ?string
 * @method setDeclineReason(?string $value): self
 *
 * @method getFileHashOriginal(): string
 * @method setFileHashOriginal(string $value): self
 *
 * @method getJsonProducts(): array
 * @method setJsonProducts(array $value): self
 *
 * @method getLang(): Lang
 * @method setLang(Lang $value): self
 *
 * @method getCountProdsTotal(): int
 * @method setCountProdsTotal(int $value): self
 *
 * @method getCountProdsSuccess(): int
 * @method setCountProdsSuccess(int $value): self
 *
 * @method getCountProdsError(): int
 * @method setCountProdsError(int $value): self
 *
 * @method getCreatedAt(): int
 * @method setCreatedAt(int $value): self
 *
 * @method getModeratedAt(): ?int
 * @method setModeratedAt(?int $value): self
 *
 * @method getCountProdsWarning(): int
 * @method setCountProdsWarning(int $value): self
 * @method getProductItems(): ProductItem[]
 */
class ProductsUpload
{
    use Incremental32IdTrait;
    use MethodTrait;

    /**
     * LoadTypeEnum
     *
     * @ORM\Column(type="smallint", name="load_type", nullable=false, options={"unsigned"=true})
     */
    private int $loadType;

    /**
     * ID пользователя, который залил файл. Или от имени которого файл был залит
     *
     * @ORM\ManyToOne(targetEntity="App\Users\Entity\User", fetch="LAZY")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private User $user;

    /**
     * @ORM\Column(name="cms_user_id", type="integer", nullable=false, options={"unsigned"=true,"comment"="Upload moderator"})
     */
    private int $cmsUserId;

    /**
     * @ORM\Column(name="moderator_id", type="integer", nullable=true, options={"unsigned"=true,"comment"="Approve moderator"})
     */
    private ?int $moderatorId;

    /**
     * Имя загруженного файла (от пользователя на момент загрузки)
     *
     * @ORM\Column(type="string", name="filename", length=255, nullable=false)
     */
    private string $filename;

    /**
     * Статус данной загрузки
     * ProductsUploadStatusEnum
     *
     * @ORM\Column(type="smallint", name="status", nullable=false)
     */
    private int $status;

    /**
     * Причина отклонения
     *
     * @ORM\Column(type="string", name="decline_reason", length=255, nullable=true)
     */
    private ?string $declineReason = null;

    /**
     * Хэш исходного файла в файловой системе
     *
     * @ORM\Column(type="string", name="file_hash_original", length=191, nullable=false)
     */
    private string $fileHashOriginal;

    /**
     * json с товарами + комментарий модератора (или робота) к каждому
     * Но думаю что надо хранить в отдельной таблице
     *
     * @ORM\Column(type="json", name="json_products", nullable=true)
     */
    protected ?array $jsonProducts;

    /**
     * Язык загружаемого файла
     *
     * @ORM\ManyToOne(targetEntity="App\Core\Entity\Lang", fetch="LAZY")
     * @ORM\JoinColumn(name="id_lang", referencedColumnName="id", nullable=false)
     */
    private Lang $lang;

    /**
     * Количество товаров в файле
     *
     * @ORM\Column(type="integer", name="count_prods_total", nullable=false)
     */
    private int $countProdsTotal;

    /**
     * Количество загруженных без ошибок
     *
     * @ORM\Column(type="integer", name="count_prods_success", nullable=false)
     */
    private int $countProdsSuccess;

    /**
     * Количество не загруженных (содержат ошибки)
     *
     * @ORM\Column(type="integer", name="count_prods_error", nullable=false)
     */
    private int $countProdsError;

    /**
     * Количество загруженных, в выдаче присутствуют, но содержат замечания
     *
     * @ORM\Column(type="integer", name="count_prods_warning", nullable=false)
     */
    private int $countProdsWarning;

    /**
     * @ORM\Column(type="integer", name="created_at", nullable=false, options={"unsigned"=true})
     */
    private int $createdAt;

    private ?\DateTime $created = null;

    /**
     * @ORM\Column(type="integer", name="moderated_at", nullable=true, options={"unsigned"=true})
     */
    private ?int $moderatedAt = null;

    private ?\DateTime $moderated = null;

    /**
     * @ORM\OneToMany(
     *     targetEntity="App\Import\Entity\ProductUploadItem",
     *      mappedBy="productsUpload",
     *      orphanRemoval=true,
     *      fetch="EXTRA_LAZY",
     *      cascade={"persist"},
     * )
     */
    private Collection $productItems;

    public function __construct()
    {
        $this->created          = new \DateTime();
        $this->createdAt        = $this->created->getTimestamp();
        $this->fileHashOriginal = '';
        $this->productItems     = new ArrayCollection();
        $this->status           = ProductsUploadStatusEnum::NEW;
    }

    public function __toString(): string
    {
        return $this->fileHashOriginal
            ? $this->fileHashOriginal . ' ' . $this->filename
            : 'ProductsUpload is empty';
    }

    public function addProductItems(ProductUploadItem $productItem): self
    {
        if (!$this->productItems->contains($productItem)) {
            $this->productItems[] = $productItem;
        }

        return $this;
    }

    public function setCreated(\DateTime $val): self
    {
        $this->created   = $val;
        $this->createdAt = $val->getTimestamp();

        return $this;
    }

    public function getCreated(): \DateTime
    {
        if ($this->created === null) {
            $this->created = (new \DateTime())->setTimestamp($this->createdAt);
        }

        return $this->created;
    }

    public function setModerated(\DateTime $val): self
    {
        $this->moderated = $val;
        $this->moderatedAt = $val->getTimestamp();

        return $this;
    }

    public function getModerated(): ?\DateTime
    {
        if ($this->moderated === null && $this->moderatedAt !== null) {
            $this->moderated = (new \DateTime())->setTimestamp($this->moderatedAt);
        }

        return $this->moderated;
    }
}

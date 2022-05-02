<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvFieldsUsersOffers
 *
 * @ORM\Table(name="adv_fields_users_offers")
 * @ORM\Entity
 */
class AdvFieldsUsersOffers
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
     * @ORM\Column(name="id_field", type="integer", nullable=false)
     */
    private $idField;

    /**
     * @var string
     *
     * @ORM\Column(name="user_hash", type="string", length=10, nullable=false)
     */
    private $userHash;

    /**
     * @var int
     *
     * @ORM\Column(name="lang", type="integer", nullable=false)
     */
    private $lang;

    /**
     * @var string
     *
     * @ORM\Column(name="field_text", type="string", length=1000, nullable=false)
     */
    private $fieldText;

    /**
     * @var int
     *
     * @ORM\Column(name="dt", type="integer", nullable=false)
     */
    private $dt;

    /**
     * @var string
     *
     * @ORM\Column(name="app_id", type="string", length=255, nullable=false)
     */
    private $appId;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdField(): ?int
    {
        return $this->idField;
    }

    public function setIdField(int $idField): self
    {
        $this->idField = $idField;

        return $this;
    }

    public function getUserHash(): ?string
    {
        return $this->userHash;
    }

    public function setUserHash(string $userHash): self
    {
        $this->userHash = $userHash;

        return $this;
    }

    public function getLang(): ?int
    {
        return $this->lang;
    }

    public function setLang(int $lang): self
    {
        $this->lang = $lang;

        return $this;
    }

    public function getFieldText(): ?string
    {
        return $this->fieldText;
    }

    public function setFieldText(string $fieldText): self
    {
        $this->fieldText = $fieldText;

        return $this;
    }

    public function getDt(): ?int
    {
        return $this->dt;
    }

    public function setDt(int $dt): self
    {
        $this->dt = $dt;

        return $this;
    }

    public function getAppId(): ?string
    {
        return $this->appId;
    }

    public function setAppId(string $appId): self
    {
        $this->appId = $appId;

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


}

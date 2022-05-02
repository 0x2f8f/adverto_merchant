<?php

namespace App\Core\Entity;

use App\Users\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * IntegrationAdvertsSetting
 *
 * @ORM\Table(name="integration_adverts_setting", uniqueConstraints={@ORM\UniqueConstraint(name="UNQ_integration_adverts_setting_integration", columns={"integration_id"})}, indexes={@ORM\Index(name="integrations_as_fk_user", columns={"user_id"}), @ORM\Index(name="integrations_as_fk_lang", columns={"lang_id"})})
 * @ORM\Entity
 */
class IntegrationAdvertsSetting
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="smallint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="integration_id", type="smallint", nullable=false, options={"unsigned"=true,"comment"="У каждого партнера свой ID интеграции, прописанный в коде"})
     */
    private $integrationId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="data_url", type="string", length=255, nullable=true)
     */
    private $dataUrl;

    /**
     * @var int
     *
     * @ORM\Column(name="created_at", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $createdAt;

    /**
     * @var int
     *
     * @ORM\Column(name="updated_at", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $updatedAt;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Users\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var Lang
     *
     * @ORM\ManyToOne(targetEntity="Lang")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lang_id", referencedColumnName="id")
     * })
     */
    private $lang;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntegrationId(): ?int
    {
        return $this->integrationId;
    }

    public function setIntegrationId(int $integrationId): self
    {
        $this->integrationId = $integrationId;

        return $this;
    }

    public function getDataUrl(): ?string
    {
        return $this->dataUrl;
    }

    public function setDataUrl(?string $dataUrl): self
    {
        $this->dataUrl = $dataUrl;

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

    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getLang(): ?Lang
    {
        return $this->lang;
    }

    public function setLang(?Lang $lang): self
    {
        $this->lang = $lang;

        return $this;
    }


}

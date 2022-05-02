<?php

namespace App\Core\Entity;

use App\Adverts\Entity\Advert;
use Doctrine\ORM\Mapping as ORM;

/**
 * IntegrationAdvertsForeign
 *
 * @ORM\Table(name="integration_adverts_foreign", uniqueConstraints={@ORM\UniqueConstraint(name="UNQ_integration_adverts_foreign_agent", columns={"integration_id", "agent_adv_id"}), @ORM\UniqueConstraint(name="UNQ_integration_adverts_foreign_advert", columns={"adverto_adv_hash"})})
 * @ORM\Entity
 */
class IntegrationAdvertsForeign
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
     * @ORM\Column(name="integration_id", type="smallint", nullable=false, options={"unsigned"=true,"comment"="У каждого партнера свой ID интеграции, прописанный в коде"})
     */
    private $integrationId;

    /**
     * @var string
     *
     * @ORM\Column(name="agent_adv_id", type="string", length=100, nullable=false, options={"comment"="ID объявления на стороне партнера (бывают текстовые)"})
     */
    private $agentAdvId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tech_comment", type="string", length=510, nullable=true)
     */
    private $techComment;

    /**
     * @var string
     *
     * @ORM\Column(name="photos", type="text", length=0, nullable=false, options={"default"="[]"})
     */
    private $photos = '[]';

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
     * @var Advert
     *
     * @ORM\ManyToOne(targetEntity="App\Adverts\Entity\Advert")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="adverto_adv_hash", referencedColumnName="hash")
     * })
     */
    private $advertoAdvHash;

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

    public function getAgentAdvId(): ?string
    {
        return $this->agentAdvId;
    }

    public function setAgentAdvId(string $agentAdvId): self
    {
        $this->agentAdvId = $agentAdvId;

        return $this;
    }

    public function getTechComment(): ?string
    {
        return $this->techComment;
    }

    public function setTechComment(?string $techComment): self
    {
        $this->techComment = $techComment;

        return $this;
    }

    public function getPhotos(): ?string
    {
        return $this->photos;
    }

    public function setPhotos(string $photos): self
    {
        $this->photos = $photos;

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

    public function getAdvertoAdvHash(): ?Advert
    {
        return $this->advertoAdvHash;
    }

    public function setAdvertoAdvHash(?Advert $advertoAdvHash): self
    {
        $this->advertoAdvHash = $advertoAdvHash;

        return $this;
    }


}

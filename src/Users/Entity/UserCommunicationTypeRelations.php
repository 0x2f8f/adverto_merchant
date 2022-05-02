<?php

namespace App\Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserCommunicationTypeRelations
 *
 * @ORM\Table(name="adv_user_communication_type_relations", indexes={@ORM\Index(name="adv_user_communication_type_relations_FK", columns={"comm_type"}), @ORM\Index(name="adv_user_communication_type_relations_FK_1", columns={"user_id"})})
 * @ORM\Entity
 */
class UserCommunicationTypeRelations
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
     * @ORM\Column(name="value", type="string", length=100, nullable=false)
     */
    private $value;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var UserCommunicationType
     *
     * @ORM\ManyToOne(targetEntity="UserCommunicationType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comm_type", referencedColumnName="id")
     * })
     */
    private $commType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

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

    public function getCommType(): ?UserCommunicationType
    {
        return $this->commType;
    }

    public function setCommType(?UserCommunicationType $commType): self
    {
        $this->commType = $commType;

        return $this;
    }


}

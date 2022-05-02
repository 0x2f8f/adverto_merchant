<?php

namespace App\Adverts\Entity;

use App\Users\Entity\UserCommunicationTypeRelations;
use Doctrine\ORM\Mapping as ORM;

/**
 * AdvertsCommTypeRelations
 *
 * @ORM\Table(name="adv_adverts_comm_type_relations", indexes={@ORM\Index(name="adv_adverts_comm_type_relations_FK_1", columns={"user_comm_type_id"})})
 * @ORM\Entity
 */
class AdvertsCommTypeRelations
{
    /**
     * @var UserCommunicationTypeRelations
     *
     * @ORM\ManyToOne(targetEntity="App\Users\Entity\UserCommunicationTypeRelations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_comm_type_id", referencedColumnName="id")
     * })
     */
    private $userCommType;

    /**
     * @var Advert
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Advert")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="advert_hash", referencedColumnName="hash")
     * })
     */
    private $advertHash;

    public function getUserCommType(): ?UserCommunicationTypeRelations
    {
        return $this->userCommType;
    }

    public function setUserCommType(?UserCommunicationTypeRelations $userCommType): self
    {
        $this->userCommType = $userCommType;

        return $this;
    }

    public function getAdvertHash(): ?Advert
    {
        return $this->advertHash;
    }

    public function setAdvertHash(?Advert $advertHash): self
    {
        $this->advertHash = $advertHash;

        return $this;
    }


}

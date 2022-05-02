<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvMetro
 *
 * @ORM\Table(name="adv_metro", indexes={@ORM\Index(name="id_city", columns={"id_city"}), @ORM\Index(name="id_country", columns={"id_country"})})
 * @ORM\Entity
 */
class AdvMetro
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
     * @var Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_country", referencedColumnName="iso")
     * })
     */
    private $idCountry;

    /**
     * @var Location
     *
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_city", referencedColumnName="id")
     * })
     */
    private $idCity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCountry(): ?Country
    {
        return $this->idCountry;
    }

    public function setIdCountry(?Country $idCountry): self
    {
        $this->idCountry = $idCountry;

        return $this;
    }

    public function getIdCity(): ?Location
    {
        return $this->idCity;
    }

    public function setIdCity(?Location $idCity): self
    {
        $this->idCity = $idCity;

        return $this;
    }


}

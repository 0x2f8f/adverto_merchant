<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvServiceCountryExtra
 *
 * @ORM\Table(name="adv_service_country_extra")
 * @ORM\Entity
 */
class AdvServiceCountryExtra
{
    /**
     * @var int
     *
     * @ORM\Column(name="country_iso", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $countryIso;

    /**
     * @var int
     *
     * @ORM\Column(name="country_visibility_extra", type="integer", nullable=false)
     */
    private $countryVisibilityExtra = '0';

    public function getCountryIso(): ?int
    {
        return $this->countryIso;
    }

    public function getCountryVisibilityExtra(): ?int
    {
        return $this->countryVisibilityExtra;
    }

    public function setCountryVisibilityExtra(int $countryVisibilityExtra): self
    {
        $this->countryVisibilityExtra = $countryVisibilityExtra;

        return $this;
    }


}

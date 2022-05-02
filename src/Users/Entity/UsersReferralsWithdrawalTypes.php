<?php

namespace App\Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsersReferralsWithdrawalTypes
 *
 * @ORM\Table(name="adv_users_referrals_withdrawal_types")
 * @ORM\Entity
 */
class UsersReferralsWithdrawalTypes
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
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="website", type="string", length=150, nullable=true)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="logo_url_50x50", type="string", length=300, nullable=false)
     */
    private $logoUrl50x50;

    /**
     * @var string|null
     *
     * @ORM\Column(name="logo_url_150x150", type="string", length=300, nullable=true)
     */
    private $logoUrl150x150;

    /**
     * @var string|null
     *
     * @ORM\Column(name="logo_url_500x500", type="string", length=300, nullable=true)
     */
    private $logoUrl500x500;

    /**
     * @var string|null
     *
     * @ORM\Column(name="logo_url_1000x1000", type="string", length=300, nullable=true)
     */
    private $logoUrl1000x1000;

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false, options={"default"="1"})
     */
    private $enabled = true;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getLogoUrl50x50(): ?string
    {
        return $this->logoUrl50x50;
    }

    public function setLogoUrl50x50(string $logoUrl50x50): self
    {
        $this->logoUrl50x50 = $logoUrl50x50;

        return $this;
    }

    public function getLogoUrl150x150(): ?string
    {
        return $this->logoUrl150x150;
    }

    public function setLogoUrl150x150(?string $logoUrl150x150): self
    {
        $this->logoUrl150x150 = $logoUrl150x150;

        return $this;
    }

    public function getLogoUrl500x500(): ?string
    {
        return $this->logoUrl500x500;
    }

    public function setLogoUrl500x500(?string $logoUrl500x500): self
    {
        $this->logoUrl500x500 = $logoUrl500x500;

        return $this;
    }

    public function getLogoUrl1000x1000(): ?string
    {
        return $this->logoUrl1000x1000;
    }

    public function setLogoUrl1000x1000(?string $logoUrl1000x1000): self
    {
        $this->logoUrl1000x1000 = $logoUrl1000x1000;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }


}

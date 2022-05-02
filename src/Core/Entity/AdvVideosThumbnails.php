<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdvVideosThumbnails
 *
 * @ORM\Table(name="adv_videos_thumbnails")
 * @ORM\Entity
 */
class AdvVideosThumbnails
{
    /**
     * @var string
     *
     * @ORM\Column(name="thumbnail_hash", type="string", length=24, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $thumbnailHash;

    /**
     * @var string
     *
     * @ORM\Column(name="thumbnail_url", type="string", length=100, nullable=false)
     */
    private $thumbnailUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="video_hash", type="string", length=24, nullable=false)
     */
    private $videoHash;

    /**
     * @var int
     *
     * @ORM\Column(name="created_at", type="integer", nullable=false)
     */
    private $createdAt;

    public function getThumbnailHash(): ?string
    {
        return $this->thumbnailHash;
    }

    public function getThumbnailUrl(): ?string
    {
        return $this->thumbnailUrl;
    }

    public function setThumbnailUrl(string $thumbnailUrl): self
    {
        $this->thumbnailUrl = $thumbnailUrl;

        return $this;
    }

    public function getVideoHash(): ?string
    {
        return $this->videoHash;
    }

    public function setVideoHash(string $videoHash): self
    {
        $this->videoHash = $videoHash;

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


}

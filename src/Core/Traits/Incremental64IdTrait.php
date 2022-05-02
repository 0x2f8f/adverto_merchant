<?php

namespace App\Core\Traits;

use Doctrine\ORM\Mapping as ORM;

trait Incremental64IdTrait
{
    /**
     * Размер: integer, 64 бит
     * По умолчанию генератор использует strategy="AUTO" это равно IDENTITY в случае MySQL
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(
     *     type="bigint",
     *     nullable=false,
     *     options={"unsigned"=true},
     *     )
     */
    protected ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}

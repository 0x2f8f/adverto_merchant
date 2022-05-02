<?php

namespace App\Core\Traits;

use Doctrine\ORM\Mapping as ORM;

trait Incremental16IdTrait
{
    /**
     * Размер: smallint, 16 бит
     * По умолчанию генератор использует strategy="AUTO" это равно IDENTITY в случае MySQL
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(
     *     type="smallint",
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

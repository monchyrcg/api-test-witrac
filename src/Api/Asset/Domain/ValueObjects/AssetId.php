<?php
declare(strict_types=1);

namespace Src\Api\Asset\Domain\ValueObjects;


final class AssetId
{
    public function __construct(private int $id)
    {
    }

    public function value(): int
    {
        return $this->id;
    }
}

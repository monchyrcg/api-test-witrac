<?php
declare(strict_types=1);

namespace Src\Api\Asset\Domain\ValueObjects;


final class AssetSize
{
    public function __construct(private float $size)
    {

    }

    public function value(): float
    {
        return $this->size;
    }
}

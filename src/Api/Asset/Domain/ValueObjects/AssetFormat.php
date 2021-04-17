<?php
declare(strict_types=1);

namespace Src\Api\Asset\Domain\ValueObjects;


final class AssetFormat
{
    public function __construct(private string $format)
    {
    }

    public function value(): string
    {
        return $this->format;
    }
}

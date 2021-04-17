<?php
declare(strict_types=1);

namespace Src\Api\Asset\Domain\ValueObjects;


final class AssetName
{
    public function __construct(private string $name)
    {
    }

    public function value(): string
    {
        return $this->name;
    }
}

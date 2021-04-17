<?php
declare(strict_types=1);

namespace Src\Api\Asset\Domain\ValueObjects;


final class AssetUrl
{
    public function __construct(private string $url)
    {

    }

    public function url(): string
    {
        return $this->url;
    }
}

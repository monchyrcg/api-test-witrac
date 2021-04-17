<?php
declare(strict_types=1);

namespace Src\Api\Asset\Domain;

use Src\Api\Asset\Domain\ValueObjects\AssetFormat;
use Src\Api\Asset\Domain\ValueObjects\AssetName;
use Src\Api\Asset\Domain\ValueObjects\AssetSize;
use Src\Api\Asset\Domain\ValueObjects\AssetUrl;
use Src\Api\Asset\Domain\ValueObjects\AssetId;
use Src\Shared\Domain\Domain;

final class Asset implements Domain
{
    public AssetId $id;

    public function __construct(
        private AssetName $name,
        private AssetSize $size,
        private AssetFormat $format,
        private AssetUrl $url
    )
    {
    }

    public function setId($id)
    {
        $this->id = new AssetId($id);
    }

    public function id(): AssetId
    {
        return $this->id;
    }
    public function name(): AssetName
    {
        return $this->name;
    }

    public function size(): AssetSize
    {
        return $this->size;
    }

    public function format(): AssetFormat
    {
        return $this->format;
    }

    public function url(): AssetUrl
    {
        return $this->url;
    }

    public static function create(AssetName $name, AssetSize $size, AssetFormat $format, AssetUrl $url): Asset
    {
        return new self($name, $size, $format, $url);
    }

    public function toArray(): array
    {
        $data = [];

        foreach ($this as $key => $item) {
            $data[$key] = $item->value();
        }

        return $data;
    }
}

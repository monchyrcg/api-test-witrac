<?php
declare(strict_types=1);

namespace Src\Api\Asset\Domain\Contract;

use Src\Api\Asset\Domain\Asset;
use Src\Api\Asset\Domain\ValueObjects\AssetId;

interface AssetRepositoryContract
{
    public function getAssets(string $search_text): array;

    public function findById(AssetId $assetId): Asset;

}

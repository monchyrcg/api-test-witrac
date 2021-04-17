<?php
declare(strict_types=1);

namespace Src\Api\Asset\Domain\Contract;

interface AssetRepositoryContract
{
    public function getAssets(string $search_text): array;
}

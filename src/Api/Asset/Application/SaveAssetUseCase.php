<?php
declare(strict_types=1);

namespace Src\Api\Asset\Application;


use Src\Api\Asset\Domain\Contract\AssetRepositoryContract;
use Src\Api\Asset\Domain\ValueObjects\AssetId;

final class SaveAssetUseCase
{
    public function __construct(private AssetRepositoryContract $repositoryContract)
    {}

    public function __invoke(int $asset_id)
    {
        return $this->repositoryContract->saveAsset(new AssetId($asset_id));
    }
}

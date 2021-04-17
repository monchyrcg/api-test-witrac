<?php
declare(strict_types=1);

namespace Src\Api\Asset\Application;


use Src\Api\Asset\Domain\Asset;
use Src\Api\Asset\Domain\Contract\AssetRepositoryContract;
use Src\Api\Asset\Domain\ValueObjects\AssetId;

class FindAssetByIdUseCase
{
    public function __construct(private AssetRepositoryContract $repositoryContract)
    {}

    public function __invoke(int $asset_id): Asset
    {
        return $this->repositoryContract->findById(new AssetId($asset_id));
    }
}

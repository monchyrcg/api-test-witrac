<?php
declare(strict_types=1);

namespace Src\Api\Asset\Infrastructure\Repositories;


use App\Models\Asset as EloquentAssetModel;
use Src\Api\Asset\Domain\Asset;
use Src\Api\Asset\Domain\Contract\AssetRepositoryContract;
use Src\Api\Asset\Domain\ValueObjects\AssetFormat;
use Src\Api\Asset\Domain\ValueObjects\AssetName;
use Src\Api\Asset\Domain\ValueObjects\AssetSize;
use Src\Api\Asset\Domain\ValueObjects\AssetUrl;
use Src\Api\User\Domain\ValueObjects\UserId;

final class EloquentAssetRepository implements AssetRepositoryContract
{
    private EloquentAssetModel $eloquentAssetModel;

    public function __construct()
    {
        $this->eloquentAssetModel = new EloquentAssetModel;
    }

    public function getAssets(string $search_text = null): array
    {
        $assets = $this->eloquentAssetModel->where('name', 'like', '%'.$search_text.'%')->get();

        $arrayModels = [];
        foreach ($assets as $asset) {
            array_push($arrayModels,
                [
                    'name' => $asset->name,
                    'size' => $asset->size,
                    'extension' => $asset->extension,
                    'url' => $asset->url
                ]
            );
        }
        return $arrayModels;
    }
}

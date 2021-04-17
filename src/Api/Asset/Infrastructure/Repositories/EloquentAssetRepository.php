<?php
declare(strict_types=1);

namespace Src\Api\Asset\Infrastructure\Repositories;


use App\Models\Asset as EloquentAssetModel;
use Src\Api\Asset\Domain\Asset;
use Src\Api\Asset\Domain\Contract\AssetRepositoryContract;
use Src\Api\Asset\Domain\ValueObjects\AssetFormat;
use Src\Api\Asset\Domain\ValueObjects\AssetId;
use Src\Api\Asset\Domain\ValueObjects\AssetName;
use Src\Api\Asset\Domain\ValueObjects\AssetSize;
use Src\Api\Asset\Domain\ValueObjects\AssetUrl;


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
                    'id' => $asset->id,
                    'name' => $asset->name,
                    'size' => $asset->size,
                    'extension' => $asset->extension,
                    'url' => $asset->url
                ]
            );
        }
        return $arrayModels;
    }

    public function findById(AssetId $assetId): Asset
    {
        $model = $this->eloquentAssetModel->findOrFail($assetId->value());

        $asset = Asset::create(
            new AssetName($model->name),
            new AssetSize((float) $model->size),
            new AssetFormat($model->extension),
            new AssetUrl ($model->url)
        );

        $asset->setId($model->id);

        return $asset;
    }
}

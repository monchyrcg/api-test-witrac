<?php
declare(strict_types=1);

namespace Src\Api\Library\Infrastructure\Repositories;

use App\Models\Library as EloquentLibraryModel;
use Src\Api\Asset\Domain\ValueObjects\AssetName;
use Src\Api\Library\Domain\Contract\LibraryRepositoryContract;

final class EloquentLibraryRepository implements LibraryRepositoryContract
{
    private EloquentLibraryModel $eloquentLibraryModel;

    public function __construct()
    {
        $this->eloquentLibraryModel = new EloquentLibraryModel;
    }

    public function save(AssetName $name): array
    {
        $libraryArray = [
            'user_id'   =>request()->user()->id,
            'name'      =>$name->value(),
        ];

        $this->eloquentLibraryModel->create($libraryArray);

        return $libraryArray;
    }

    public function getLibraries(): array
    {
        $libraries = $this->eloquentLibraryModel->all();

        $libraryModel = [];
        foreach ($libraries as $library) {
            array_push($libraryModel,
                [
                    'name' => $library->name,
                    'date' => $library->created_at->diffForHumans()
                ]
            );
        }
        return $libraryModel;
    }
}

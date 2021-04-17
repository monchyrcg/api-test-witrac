<?php
declare(strict_types=1);

namespace Src\Api\Asset\Infrastructure;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Api\Asset\Application\FindAssetByIdUseCase;
use Src\Api\Asset\Application\SaveAssetUseCase;
use Src\Api\Asset\Infrastructure\Repositories\EloquentAssetRepository;
use Src\Api\Library\Application\SaveLibraryUseCase;
use Src\Api\Library\Infrastructure\Repositories\EloquentLibraryRepository;
use Src\Shared\Infrastructure\Controller;

final class SaveAssetController extends Controller
{
    public function __construct(private EloquentAssetRepository $repository, private EloquentLibraryRepository $eloquentLibraryRepository)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        // retrieve all asset information
        $asset = (new FindAssetByIdUseCase($this->repository))->__invoke((int) $request->input('asset'));

        // save the asset in my library
        $saveAssetUseCase =  new SaveLibraryUseCase($this->eloquentLibraryRepository);
        $saveAssetUseCase($asset->name());

        return $this->showOneObject($asset);
    }
}

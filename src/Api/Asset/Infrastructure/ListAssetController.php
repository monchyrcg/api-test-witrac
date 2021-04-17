<?php
declare(strict_types=1);

namespace Src\Api\Asset\Infrastructure;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Src\Api\Asset\Application\ListAssetUseCase;
use Src\Api\Asset\Infrastructure\Repositories\EloquentAssetRepository;
use Src\Shared\Infrastructure\Controller;

final class ListAssetController extends Controller
{
    public function __construct(private EloquentAssetRepository $repository)
    {
    }

    public function __invoke(Request $request): LengthAwarePaginator
    {
        $listAssetUseCase =  new ListAssetUseCase($this->repository);

        $assets = $listAssetUseCase($request->input('name'));

        return $this->paginateCollection(collect($assets));
    }
}

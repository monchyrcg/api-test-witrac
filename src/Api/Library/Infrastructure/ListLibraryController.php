<?php
declare(strict_types=1);

namespace Src\Api\Library\Infrastructure;


use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Src\Api\Library\Application\ListLibraryUseCase;
use Src\Api\Library\Infrastructure\Repositories\EloquentLibraryRepository;
use Src\Shared\Infrastructure\Controller;

final class ListLibraryController extends Controller
{
    public function __construct(private EloquentLibraryRepository $repository)
    {
    }

    public function __invoke(Request $request): LengthAwarePaginator
    {
        $listLibraryUseCase =  new ListLibraryUseCase($this->repository);

        $libraries = $listLibraryUseCase();

        return $this->paginateCollection(collect($libraries));
    }
}

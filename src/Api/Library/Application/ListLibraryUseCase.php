<?php
declare(strict_types=1);

namespace Src\Api\Library\Application;


use Src\Api\Library\Domain\Contract\LibraryRepositoryContract;

final class ListLibraryUseCase
{
    public function __construct(private LibraryRepositoryContract $repositoryContract)
    {}

    public function __invoke(string $search_text = null): array
    {
        return $this->repositoryContract->getLibraries($search_text);
    }
}

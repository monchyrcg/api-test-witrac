<?php
declare(strict_types=1);

namespace Src\Api\Library\Application;

use Src\Api\Asset\Domain\ValueObjects\AssetName;
use Src\Api\Library\Domain\Contract\LibraryRepositoryContract;

class SaveLibraryUseCase
{
    public function __construct(private LibraryRepositoryContract $repositoryContract)
    {}

    public function __invoke(AssetName $name)
    {
        return $this->repositoryContract->save($name);
    }
}

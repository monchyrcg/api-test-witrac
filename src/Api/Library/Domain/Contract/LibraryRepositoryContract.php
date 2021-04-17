<?php
declare(strict_types=1);

namespace Src\Api\Library\Domain\Contract;


use Src\Api\Asset\Domain\ValueObjects\AssetName;

interface LibraryRepositoryContract
{
    public function save(AssetName $name): array;

    public function getLibraries(): array;
}

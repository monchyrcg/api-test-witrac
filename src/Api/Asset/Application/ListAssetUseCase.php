<?php
declare(strict_types=1);

namespace Src\Api\Asset\Application;


use Src\Api\Asset\Domain\Contract\AssetRepositoryContract;
use Src\Api\User\Domain\ValueObjects\UserId;

final class ListAssetUseCase
{
    public function __construct(private AssetRepositoryContract $repositoryContract)
    {}

    public function __invoke(string $search_text = null): array
    {
        return $this->repositoryContract->getAssets($search_text);
    }
}

<?php
declare(strict_types=1);

namespace Src\Api\User\Application;

use Src\Api\User\Domain\Contract\UserRepositoryContract;
use Src\Api\User\Domain\User;
use Src\Api\User\Domain\ValueObjects\UserId;

final class GetUserByIdUseCase
{
    public function __construct(private UserRepositoryContract $repositoryContract)
    {
    }

    public function __invoke(int $user): User
    {
        $userId = new UserId($user);

        return $this->repositoryContract->findById($userId);
    }
}

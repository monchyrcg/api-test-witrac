<?php
declare(strict_types=1);

namespace Src\Api\User\Application;

use Src\Api\User\Domain\Contract\UserRepositoryContract;
use Src\Api\User\Domain\User;
use Src\Api\User\Domain\ValueObjects\UserEmail;
use Src\Api\User\Domain\ValueObjects\UserId;
use Src\Api\User\Domain\ValueObjects\UserName;

final class UpdateUserUseCase
{
    public function __construct(private UserRepositoryContract $repository)
    {
    }

    public function __invoke(int $id, string $name, string $email) : User
    {
        $user = User::create(
            new UserName($name),
            new UserEmail($email)
        );

        return $this->repository->update(new UserId($id), $user);
    }
}

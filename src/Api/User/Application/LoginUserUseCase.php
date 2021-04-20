<?php
declare(strict_types=1);

namespace Src\Api\User\Application;

use Src\Api\User\Domain\Contract\UserRepositoryContract;
use Src\Api\User\Domain\User;
use Src\Api\User\Domain\UserLogin;
use Src\Api\User\Domain\ValueObjects\UserEmail;
use Src\Api\User\Domain\ValueObjects\UserId;
use Src\Api\User\Domain\ValueObjects\UserPassword;

final class LoginUserUseCase
{
    public function __construct(private UserRepositoryContract $repository)
    {
    }

    public function __invoke(string $email, string $password) : string|null
    {
        $login = UserLogin::create(
            new UserEmail($email),
            new UserPassword($password)
        );


        return $this->repository->login($login);
    }
}

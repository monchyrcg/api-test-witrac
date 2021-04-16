<?php
declare(strict_types=1);

namespace Src\Api\User\Domain\Contract;

use Src\Api\User\Domain\User;
use Src\Api\User\Domain\UserLogin;
use Src\Api\User\Domain\ValueObjects\UserId;

interface UserRepositoryContract
{
    public function login(UserLogin $login): string|null;
    public function update(UserId $userId, User $user): User;
    public function findById(UserId $userId): User;
}

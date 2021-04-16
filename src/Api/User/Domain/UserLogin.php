<?php
declare(strict_types=1);

namespace Src\Api\User\Domain;

use Src\Api\User\Domain\ValueObjects\UserEmail;
use Src\Api\User\Domain\ValueObjects\UserPassword;

final class UserLogin
{
    public function __construct(private UserEmail $email, private UserPassword $password)
    {
    }

    public function email(): UserEmail
    {
        return $this->email;
    }

    public function password(): UserPassword
    {
        return $this->password;
    }

    public static function create(UserEmail $email, UserPassword $password): UserLogin
    {
        return new self($email, $password);
    }
}

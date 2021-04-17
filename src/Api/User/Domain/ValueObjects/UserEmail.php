<?php
declare(strict_types=1);

namespace Src\Api\User\Domain\ValueObjects;

final class UserEmail
{
    public function __construct(private string $email)
    {
    }

    public function value(): string
    {
        return $this->email;
    }
}

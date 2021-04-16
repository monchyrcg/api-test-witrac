<?php
declare(strict_types=1);

namespace Src\Api\User\Domain\ValueObjects;


final class UserName
{
    public function __construct(private string $name)
    {
    }

    public function value(): string
    {
        return $this->name;
    }
}

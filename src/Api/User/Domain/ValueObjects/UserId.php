<?php
declare(strict_types=1);

namespace Src\Api\User\Domain\ValueObjects;


final class UserId
{
    public function __construct(private int $id)
    {
    }

    public function value(): int
    {
        return $this->id;
    }
}

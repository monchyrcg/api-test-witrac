<?php
declare(strict_types=1);

namespace Src\Api\User\Domain;

use Src\Api\User\Domain\ValueObjects\UserEmail;
use Src\Api\User\Domain\ValueObjects\UserId;
use Src\Api\User\Domain\ValueObjects\UserName;
use Src\Shared\Domain\Domain;

final class User implements Domain
{
    public UserId $id;

    public function __construct(
        private UserName $name,
        private UserEmail $email
    )
    {
    }

    public function setId($id)
    {
        $this->id = new UserId($id);
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }

    public static function create(
        UserName $name,
        UserEmail $email
    ): User
    {
        return new self($name, $email);
    }

    public function toArray(): array
    {
        $data = [];
        foreach ($this as $key => $item) {
            $data[$key] = $item->value();
        }

        return $data;
    }
}

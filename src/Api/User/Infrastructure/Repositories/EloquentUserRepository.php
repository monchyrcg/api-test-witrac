<?php
declare(strict_types=1);

namespace Src\Api\User\Infrastructure\Repositories;

use Illuminate\Support\Facades\Hash;
use App\Models\User as EloquentUserModel;
use Src\Api\User\Domain\Contract\UserRepositoryContract;
use Src\Api\User\Domain\User;
use Src\Api\User\Domain\UserLogin;
use Src\Api\User\Domain\ValueObjects\UserEmail;
use Src\Api\User\Domain\ValueObjects\UserId;
use Src\Api\User\Domain\ValueObjects\UserName;

class EloquentUserRepository implements UserRepositoryContract
{
    private EloquentUserModel $eloquentUserModel;

    public function __construct()
    {
        $this->eloquentUserModel = new EloquentUserModel;
    }

    public function update(UserId $userId, User $user): User
    {
        $updateUser = $this->eloquentUserModel;

        $data = [
            'name' => $user->name()->value(),
            'email' => $user->email()->value()
        ];

        $model = $updateUser->findOrFail($userId->value());
        $model->update($data);

        return $user;
    }

    public function login(UserLogin $login) : string|null
    {
        $loginUser = $this->eloquentUserModel;

        $isLogging = $loginUser::where('email', $login->email()->value())->first();

        if (!$isLogging || ! Hash::check($login->password()->value(), $isLogging->password)) {
            return null;
        } else {
            return $isLogging->createToken($login->email()->value())->plainTextToken;
        }
    }

    public function findById(UserId $userId): User
    {
        $model = $this->eloquentUserModel->findOrFail($userId->value());

        $user = User::create(
            new UserName ($model->name),
            new UserEmail ($model->email)
        );

        $user->setId($model->id);

        return $user;
    }
}

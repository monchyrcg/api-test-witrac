<?php
declare(strict_types=1);

namespace Src\Api\User\Infrastructure;

use Illuminate\Http\JsonResponse;
use Src\Api\User\Infrastructure\Requests\UpdateUserRequest;
use Src\Api\User\Application\UpdateUserUseCase;
use Src\Api\User\Infrastructure\Repositories\EloquentUserRepository;
use Src\Shared\Infrastructure\Controller;

final class UpdateUserController extends Controller
{

    public function __construct(private EloquentUserRepository $userRepository)
    {
    }

    public function __invoke(UpdateUserRequest $updateUserRequest): JsonResponse
    {
        $updateUserCase = new UpdateUserUseCase($this->userRepository);

        $user = $updateUserCase(
            (int) $updateUserRequest->input('id'),
            $updateUserRequest->input('name'),
            $updateUserRequest->input('email')
        );

        return $this->showOneObject($user);
    }
}

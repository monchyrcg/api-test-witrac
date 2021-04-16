<?php
declare(strict_types=1);

namespace Src\Api\User\Infrastructure;

use Illuminate\Http\JsonResponse;
use Src\Api\User\Application\LoginUserUseCase;
use Src\Api\User\Infrastructure\Requests\LoginRequest;
use Src\Api\User\Infrastructure\Repositories\EloquentUserRepository;
use Src\Shared\Infrastructure\Controller;

final class LoginController extends Controller
{
    public function __construct(private EloquentUserRepository $userRepository)
    {
    }

    public function __invoke(LoginRequest $loginRequest): JsonResponse
    {
        $loginUserCase = new LoginUserUseCase($this->userRepository);

        $user = $loginUserCase(
            $loginRequest->input('email'),
            $loginRequest->input('password'),
        );

        if($user === null)
            return $this->errorResponse('Unauthorized', 401);

        return $this->showOneData ([
            'token' => $user
        ]);
    }
}

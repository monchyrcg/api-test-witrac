<?php
declare(strict_types=1);

namespace Tests\Unit;

use Src\Api\User\Application\LoginUserUseCase;
use Src\Api\User\Infrastructure\Repositories\EloquentUserRepository;
use Tests\TestCase;


class SanctumTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_no_authorized()
    {
        $response = $this->get('api/user',['Accept' => 'application/json']);

        $response->assertUnauthorized();
    }

    public function test_useCase_login()
    {
        $createUser = \App\Models\User::factory()->create();

        $loginUseCase = new LoginUserUseCase(new EloquentUserRepository());
        $bearer = $loginUseCase($createUser->email, 'password');

        $this->assertIsString($bearer);
    }

    public function test_user()
    {
        $createUser = \App\Models\User::factory()->create();
        $bearer = $createUser->createToken('token-name')->plainTextToken;

        $response = $this->get('api/user',
            [
                'authorization' => 'Bearer '.$bearer
            ]
        );

        $response->assertSuccessful();
    }
}

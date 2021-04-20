<?php
declare(strict_types=1);

namespace Tests\Unit;

use Src\Api\Asset\Application\ListAssetUseCase;
use Src\Api\Asset\Infrastructure\Repositories\EloquentAssetRepository;
use Tests\TestCase;

class AssetTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_useCase_asset()
    {
        $assetListUseCase = new ListAssetUseCase(new EloquentAssetRepository());
        $assetlist = $assetListUseCase();

        $this->assertIsArray($assetlist);
    }


    public function test_list_asset()
    {
        $createUser = \App\Models\User::factory()->create();
        $bearer = $createUser->createToken('token-name')->plainTextToken;

        $response = $this->get('api/assets',
            [
                'authorization' => 'Bearer '.$bearer
            ]
        );

        $response->assertOk();
    }
}

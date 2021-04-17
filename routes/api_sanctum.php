<?php


/*
|--------------------------------------------------------------------------
| API Routes Sanctum
|--------------------------------------------------------------------------
|
*/

use Illuminate\Support\Facades\Route;
use Src\Api\Asset\Infrastructure\ListAssetController;
use Src\Api\User\Infrastructure\GetUserController;
use Src\Api\User\Infrastructure\UpdateUserController;

Route::get('user', GetUserController::class);
Route::put('profile/{id}', UpdateUserController::class);

Route::get('assets', ListAssetController::class);

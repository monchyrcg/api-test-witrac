<?php


/*
|--------------------------------------------------------------------------
| API Routes Sanctum
|--------------------------------------------------------------------------
|
*/

use Illuminate\Support\Facades\Route;
use Src\Api\Asset\Infrastructure\ListAssetController;
use Src\Api\Asset\Infrastructure\SaveAssetController;
use Src\Api\Library\Infrastructure\ListLibraryController;
use Src\Api\User\Infrastructure\GetUserController;
use Src\Api\User\Infrastructure\UpdateUserController;

Route::get('user', GetUserController::class);
Route::put('profile/{id}', UpdateUserController::class);

Route::get('assets', ListAssetController::class);
Route::post('assets', SaveAssetController::class);

Route::get('libraries', ListLibraryController::class);

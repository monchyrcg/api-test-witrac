<?php
declare(strict_types=1);

namespace Src\Api\User\Infrastructure;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Shared\Infrastructure\Controller;

final class GetUserController extends Controller
{
    public function __construct()
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        return $this->showOne(request()->user());
    }
}

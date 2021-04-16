<?php

namespace Src\Shared\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Src\Shared\Domain\Domain;

trait ResponseTrait
{
    function successResponse($data, $code = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json($data, $code);
    }

    function errorResponse($message, $code = 400): \Illuminate\Http\JsonResponse
    {
        return response()->json(
            [
                'error' =>
                [
                    'message' => $message,
                    'code' => $code
                ]
            ], $code
        );
    }

    function showAll($collection, $code = 200)
    {
        // if ($collection instanceof Collection)
        // {
        //  return $this->paginateCollection($collection)->response()->setStatuscode($code);
        // }

        return $collection->response()->setStatuscode($code);

    }

    function paginateCollection(Collection $collection): LengthAwarePaginator
    {
        $perPage = $this->determinePageSize();

        $page = LengthAwarePaginator::resolveCurrentPage();

        $results = $collection->slice((($page-1) * $perPage), $perPage)->values();

        $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, [
            'page' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        $paginated->appends(request()->query());

        return $paginated;
    }

    function determinePageSize()
    {
        $perPage = request()->validate([
            'per_page' => 'integer|min:1|max:999'

        ]);

        return !empty($perPage) ? $perPage['per_page'] : 15;
    }

    function showOne(Model $instance, $code = 200): \Illuminate\Http\JsonResponse
    {
        return $this->successResponse(['data' => $instance], $code);
    }

    function showOneObject(Domain $instance, $code = 200): \Illuminate\Http\JsonResponse
    {
        return $this->successResponse(['data' => $instance->toArray()], $code);
    }

    function showOneData(Array $instance, $code = 200): \Illuminate\Http\JsonResponse
    {
        return $this->successResponse(['data' => $instance], $code);
    }

    function showMessage($message, $code = 200): \Illuminate\Http\JsonResponse
    {
        return $this->successResponse(['data' => $message], $code);
    }
}

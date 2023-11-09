<?php

namespace App\Services;



use App\Http\Requests\PostListRequest;
use Illuminate\Pagination\LengthAwarePaginator;


class PostManagementService
{
    public function getPosts ($user, PostListRequest $request) : LengthAwarePaginator
    {
        $query = $user->posts();

        return $query->paginate($request->per_page ?? config('terra.pagination.per_page'));

    }
}

<?php

namespace App\Services;

use App\Http\Requests\PostListRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;

class PostManagementService
{
    public function getPosts($user, PostListRequest $request): LengthAwarePaginator
    {
        return $user->posts()->paginate($request->per_page ?? config('terra.pagination.per_page'));
    }

    public function save($user, $request): RedirectResponse
    {
        $user->posts()->create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'author' => $request->input('author')
        ]);

        return redirect(route('posts.index'));
    }

    public function update($data, $post): RedirectResponse
    {
        $post->update($data);
        return redirect(route('posts.index'));
    }

    public function delete($post) : RedirectResponse
    {
        $post->delete();
        return redirect(route('posts.index'));
    }
}

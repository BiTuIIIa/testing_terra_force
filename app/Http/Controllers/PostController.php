<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostListRequest;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use App\Services\PostManagementService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    private PostManagementService $postManagementService;

    public function __construct(PostManagementService $postManagementService)
    {
        $this->postManagementService = $postManagementService;
    }

    public function index(PostListRequest $request): View
    {
        return view('posts.index', [
            'posts' => $this->postManagementService->getPosts(Auth::user(), $request),
            'params' => $request->all()
        ]);
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(PostStoreRequest $request): RedirectResponse
    {
        $user = Auth::user();

        return $this->postManagementService->save($user, $request);
    }

    public function show(Post $post): View
    {
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post): View
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(PostStoreRequest $request, Post $post): RedirectResponse
    {
        $validateData = $request->validated();

        return $this->postManagementService->update($validateData, $post);
    }

    public function destroy(Post $post): RedirectResponse
    {
        return $this->postManagementService->delete($post);
    }
}

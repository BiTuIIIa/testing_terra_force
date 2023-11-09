<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostListRequest;
use App\Services\PostManagementService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class XhrPostController extends Controller
{

    private PostManagementService $postManagementService;

    public function __construct(PostManagementService $postManagementService)
    {
        $this->postManagementService = $postManagementService;
    }
    public function index(PostListRequest $request) : JsonResponse
    {
        $view = view('posts.components.list', ['posts' => $this->postManagementService->getPosts(Auth::user(),$request)])->render();

        return response()->json(['success' => true, 'data' => $view]);

    }
}

<?php

namespace App\Http\Controllers\Api;

use App\ApiHelper\Facades\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Interfaces\PostRepositoryInterface;

class PostController extends Controller
{
    public function __construct(private PostRepositoryInterface $postRepository)
    {
    }

    public function store(StorePostRequest $request)
    {
        $post = $this->postRepository->create($request, auth()->user());

        return ResponseHelper::json(true, 'Post erfolgreich erstellt', ['post' => $post]);
    }
}

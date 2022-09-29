<?php

namespace App\Interfaces;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;

interface PostRepositoryInterface
{
    public function create(StorePostRequest $request, User $user): Post;
}

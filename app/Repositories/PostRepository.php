<?php

namespace App\Repositories;

use App\Events\PostCreated;
use App\Http\Requests\StorePostRequest;
use App\Interfaces\PostRepositoryInterface;
use App\Jobs\CreatePostPdfJob;
use App\Listeners\SendPostCreatedMail;
use App\Models\Post;
use App\Models\User;

class PostRepository implements PostRepositoryInterface
{
    public function create(StorePostRequest $request, User $user): Post
    {
        $post = Post::create(['user_id' => auth()->id(), ...$request->validated()]);
        $post->tags()->syncWithoutDetaching($request->tags);
        $post->save();

        event(new PostCreated($post));
        CreatePostPdfJob::dispatch($post)->onQueue('pdfs');

        return $post;
    }
}

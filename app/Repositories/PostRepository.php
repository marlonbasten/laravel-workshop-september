<?php

namespace App\Repositories;

use App\Events\PostCreated;
use App\Http\Requests\StorePostRequest;
use App\Interfaces\PostRepositoryInterface;
use App\Jobs\CreatePostPdfJob;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostRepository implements PostRepositoryInterface
{
    public function create(StorePostRequest $request, User $user): Post
    {
        $post = Post::create(['user_id' => auth()->id(), ...$request->validated()]);
        $post->tags()->syncWithoutDetaching($request->tags);

        if ($request->thumbnail !== null) {
            $path = 'uploads/'.Str::uuid().'.'.$request->thumbnail->getClientOriginalExtension();
            if(Storage::disk('public')->put($path, $request->thumbnail->getContent())) {
                $image = new Image();
                $image->disk = 'public';
                $image->path = $path;
                $image->imageable()->associate($post);
                $image->save();
            }
        }

        $post->save();

        event(new PostCreated($post));
        CreatePostPdfJob::dispatch($post)->onQueue('pdfs');

        return $post;
    }
}

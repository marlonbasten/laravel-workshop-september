<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('post.index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(StorePostRequest $request)
    {
        // $post = new Post($request->validated());
        // $post->save();

        Post::create($request->validated());

        return redirect()->back()->with('message', 'Post erfolgreich erstellt!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // Post::updateOrCreate(
        //     ['id' => 3],
        //     $request->validated()
        // );
    }

    public function destroy($id)
    {
        // Post::destroy($posts->pluck('id')->toArray());
    }
}

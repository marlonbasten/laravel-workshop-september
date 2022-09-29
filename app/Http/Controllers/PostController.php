<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Interfaces\PostRepositoryInterface;
use App\Mail\PostCreatedMail;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function __construct(private PostRepositoryInterface $postRepository)
    {
        // Middleware für den kompletten Controller:
        // $this->middleware('auth');
        $this->middleware('checkSuperadmin:1')->only('index');
    }

    public function index(Request $request)
    {
        // $tags = [1,3];
        // $post = Post::find(110);

        // $post->tags()->syncWithoutDetaching($tags);

        $withTrashed = $request->trashed;

        $posts = Post::query();

        if ($withTrashed) {
            $posts->onlyTrashed();
        }

        return view('post.index', [
            'posts' => $posts->paginate(5),
            'withTrashed' => $withTrashed
        ]);
    }

    public function create()
    {
        $categories = Category::where('active', true)->get();
        $tags = Tag::all();
        return view('post.create', [
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $this->postRepository->create($request, auth()->user());

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

    public function destroy(Post $post)
    {
        if (Gate::denies('destroy-post', $post)) {
            abort(403);
        }

        $post->delete();

        return redirect()->back();
    }

    public function forceDelete($id)
    {
        $post = Post::onlyTrashed()->find($id);
        $post->forceDelete();

        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->find($id);
        $post->restore();

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('post.create');
    }

    public function store(StorePostRequest $request)
    {
        // session()->flash('message', 'Post erfolgreich gespeichert!');

        return redirect()->back()->with('message', 'Post erfolgreich gespeichert');
    }
}

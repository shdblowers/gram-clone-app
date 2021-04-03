<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(): Renderable
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        auth()->user()->posts()->create($data);



    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use \App\Models\User;

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
        /** @var User $user */
        $user = auth()->user();

        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = (request('image')->store('uploads', 'public'));

        $user->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

        return redirect('/profile/' . $user->id);

    }
}

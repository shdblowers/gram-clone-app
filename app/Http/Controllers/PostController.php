<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use \App\Models\User;
use \App\Models\Post;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('posts.create');
    }

    /**
     * Show a Post
     *
     * @param Post $post
     * @return Renderable
     */
    public function show(Post $post): Renderable
    {
        return view('posts.show', compact('post'));
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

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        $user->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

        return redirect('/profile/' . $user->id);

    }
}

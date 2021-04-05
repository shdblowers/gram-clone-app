<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;

class ProfileController extends Controller
{
    /**
     * Show the user profile.
     *
     * @param User $user
     * @return Renderable
     */
    public function show(User $user): Renderable
    {
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user): Renderable
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update()
    {
        /** @var User $user */
        $user = auth()->user();

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url'
        ]);

        $user->profile()->update($data);

        return redirect('/profile/' . $user->id);
    }
}

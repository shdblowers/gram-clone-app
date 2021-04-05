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
}

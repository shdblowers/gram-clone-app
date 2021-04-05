<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;

class ProfileController extends Controller
{
    /**
     * Show the user profile.
     *
     *
     * @param string userId
     * @return Renderable
     */
    public function show(string $userId): Renderable
    {
        /**
         * @var User
         */
        $user = User::findOrFail($userId);

        return view('profiles.index', ['user' => $user]);
    }
}

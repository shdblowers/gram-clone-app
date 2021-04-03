<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the user profile.
     * 
     * 
     * @param string userId
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(string $userId)
    {
        /**
         * @var User
         */
        $user = User::findOrFail($userId);

        return view('profile', ['user' => $user]);
    }
}

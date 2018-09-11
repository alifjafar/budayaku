<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Auth;
use Session;

class ProfileController extends Controller
{
    /**
     * Enforce middleware.
    */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }
    public function index($username)
    {
        $user = User::where('username', $username)->first();
        return view('budayaku.user.profile.index', compact('user'));
    }

    public function edit($username)
    {
        $user = User::where('username', $username)->first();

        return view('budayaku.user.profile.edit-bio', [
            'user' => $user,
        ]);
    }

    public function editPassword($username)
    {
        $user = User::where('username', $username)->first();

        return view('budayaku.user.profile.edit-password', [
            'user' => $user,
        ]);
    }
}

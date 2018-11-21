<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backoffice.user.index', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        Session::flash('success', 'Berhasil Menghapus User');

        return route('users.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('role')->orderBy('id')->get();
        return view('users.index', compact('users'));
    }
    public function changeRole($id,$role)
    {
        $user = User::findOrFail($id);
        $user->role = $role;
        $user->save();
        return redirect()->route('users.index');
    }
}

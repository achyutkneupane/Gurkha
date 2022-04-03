<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'user')->get();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function create_submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);
        User::create($validated);
        return redirect()->route('students.index');
    }
}

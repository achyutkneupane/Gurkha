<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = User::where('role', 'staff')->get();
        return view('staff.index', compact('staffs'));
    }

    public function create()
    {
        return view('staff.create');
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('index',compact('user'));
    }

    /**
     * Show the user profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $user = Auth::user();
        return view('profile',compact('user'));
    }

    /**
     * Edit the user profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit_profile()
    {
        $user = Auth::user();
        return view('edit-profile',compact('user'));
    }

    /**
     * Edit the user profile.
     *
     * @return redirection
     */
    public function edit_profile_submit(Request $request)
    {
        $request->merge([
            'dob' => Carbon::parse($request->dob),
        ]);
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'see_school' => 'required',
            'see_year' => 'required',
            'see_gpa' => 'required',
            'document_link' => ''
        ]);
        Auth::user()->update($validated);
        return redirect()->route('profile');
    }
}

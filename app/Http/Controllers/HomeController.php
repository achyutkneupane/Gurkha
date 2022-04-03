<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    public function profile($id = NULL)
    {
        $user = $id ? User::findOrFail($id) : Auth::user();

        $profile = asset(Storage::url($user->profile_picture));
        $document = asset(Storage::url($user->document_link));
        return view('profile',compact('user','profile','document'));
    }

    /**
     * Edit the user profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit_profile()
    {
        $user = Auth::user();
        $profile = asset(Storage::url($user->profile_picture));
        $document = asset(Storage::url($user->document_link));
        return view('edit-profile',compact('user','profile','document'));
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
            'profile_picture' => 'nullable',
            'address' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'see_school' => 'required',
            'see_year' => 'required',
            'see_gpa' => 'required',
            'document_link' => 'nullable',
        ]);
        if($request->hasFile('profile_picture')){
            // store file in profile_picture and set the file name as profile_picture.auth()->id()
            // file extension
            $extension = $request->file('profile_picture')->getClientOriginalExtension();
            $validated['profile_picture'] = $request->file('profile_picture')->storeAs('public/profile_pictures', Auth::id().'_pp_'.time().'.'.$extension);
        }
        if($request->hasFile('document_link')){
            $extension = $request->file('document_link')->getClientOriginalExtension();
            $validated['document_link'] = $request->file('document_link')->storeAs('public/documents', Auth::id().'_doc_'.time().'.'.$extension);
        }
        Auth::user()->update($validated);
        return redirect()->route('profile.index');
    }
}

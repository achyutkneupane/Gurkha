<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
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
     * Show the appllication landing page
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function landing()
    {
        $contactNumber = Detail::where('key','contact_number')->first();
        $contactEmail = Detail::where('key','contact_email')->first();
        $carousels = Detail::where('key','like','carousel%')->get();
        $armyDetails = Detail::where('key','like','%_army')->get();
        $about_us = Detail::where('key','about_us')->first();
        $socialDetails = Detail::where('key','like','social_%')->get()->map(function($item) {
            $item->key = str_replace('social_','',$item->key);
            return $item;
        });
        $location = Detail::where('key','map_link')->first();
        return view('landing',compact('carousels','armyDetails','about_us','contactNumber','contactEmail','socialDetails','location'));
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
        return view('users.profile',compact('user','profile','document'));
    }

    /**
     * Edit the user profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit_profile($id = NULL)
    {
        $user = $id ? User::findOrFail($id) : Auth::user();
        $profile = asset(Storage::url($user->profile_picture));
        $document = asset(Storage::url($user->document_link));
        return view('users.edit-profile',compact('user','profile','document'));
    }

    /**
     * Edit the user profile.
     *
     * @return redirection
     */
    public function edit_profile_submit(Request $request,$id = NULL)
    {
        $user = $id ? User::findOrFail($id) : Auth::user();
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
            $extension = $request->file('profile_picture')->getClientOriginalExtension();
            $validated['profile_picture'] = $request->file('profile_picture')->storeAs('public/profile_pictures', $user->id.'_pp_'.time().'.'.$extension);
        }
        if($request->hasFile('document_link')){
            $extension = $request->file('document_link')->getClientOriginalExtension();
            $validated['document_link'] = $request->file('document_link')->storeAs('public/documents', $user->id.'_doc_'.time().'.'.$extension);
        }
        $user->update($validated);
        return redirect()->route('profile.index');
    }

    public function delete_user($from,$id)
    {
        if($from == 'staffs'){
            if(auth()->user()->role == 'admin') {
                $user = User::findOrFail($id);
                $user->delete();
            }
            return redirect()->route('staffs.index');
        }
        if($from == 'students'){
            if(auth()->user()->role == 'staff') {
                $user = User::findOrFail($id);
                $user->delete();
            }
            return redirect()->route('students.index');
        }
    }
}

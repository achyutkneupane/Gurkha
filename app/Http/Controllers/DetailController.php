<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index() {
        $contactDetails = Detail::where('key','like','contact_%')->get();
        $carousels = Detail::where('key','like','carousel%')->get();
        $armyDetails = Detail::where('key','like','%_army')->get();
        $about_us = Detail::where('key','about_us')->first();
        $socialDetails = Detail::where('key','like','social_%')->get();
        $location = Detail::where('key','map_link')->first();
        return view('details.index',compact('contactDetails','carousels','armyDetails','about_us','socialDetails','location'));
    }
    public function update(Request $request) {
        $validated = $request->validate([
            'key' => 'required|exists:details,key',
            'image' => 'nullable',
            'value' => 'required'
        ]);
        $detail = Detail::where('key',$request->key)->firstOrFail();
        if($request->hasFile('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $validated['image'] = $request->file('image')->storeAs('public/site_images', 'image_'.$detail->key.'_'.time().'.'.$extension);
        }
        $detail->update(collect($validated)->except('_token')->toArray());
        return redirect()->route('settings.index');
    }
}

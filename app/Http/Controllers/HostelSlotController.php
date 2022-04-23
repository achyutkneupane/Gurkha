<?php

namespace App\Http\Controllers;

use App\Models\HostelSlot;
use Illuminate\Http\Request;

class HostelSlotController extends Controller
{
    public function index()
    {
        $hostels = HostelSlot::withCount('bookings')->get();
        return view('hostel.index',compact('hostels'));
    }
    public function create() {
        return view('hostel.create');
    }
    public function store(Request $request) {
        $request->validate([
            'from_date' => 'required',
            'to_date' => 'required',
            'form_close_time' => 'required',
            'capacity' => 'required',
        ]);
        HostelSlot::create($request->except('_token'));
        return redirect()->route('hostel.index');
    }
    public function close($id) {
        $hostel = HostelSlot::find($id);
        $hostel->open = false;
        $hostel->form_close_time = now();
        $hostel->save();
        return redirect()->route('hostel.index');
    }
    public function show($id) {
        $hostel = HostelSlot::with('bookings')->withCount('bookings')->find($id);
        return view('hostel.show',compact('hostel'));
    }
    public function delete($id) {
        HostelSlot::find($id)->delete();
        return redirect()->route('hostel.index');
    }
}

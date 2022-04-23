<?php

namespace App\Http\Controllers;

use App\Models\HostelSlot;
use Illuminate\Http\Request;

class HostelBookingController extends Controller
{
    public function create($id) {
        if(auth()->user()->isFilled()) 
            return redirect()->route('profile.edit',auth()->id());
        $slot = HostelSlot::find($id);
        if($slot->open) {
            $slot->bookings()->create([
                'user_id' => auth()->id(),
            ]);
            return redirect()->route('hostel.index');
        }
        else
            return redirect()->route('hostel.index');
    }
}

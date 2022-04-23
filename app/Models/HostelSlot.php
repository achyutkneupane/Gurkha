<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostelSlot extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function bookings() {
        return $this->hasMany(HostelBooking::class, 'hostel_slot_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostelBooking extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function slots() {
        return $this->belongsTo(HostelSlot::class, 'hostel_slot_id');
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}

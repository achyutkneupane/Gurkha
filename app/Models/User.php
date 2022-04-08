<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function news()
    {
        return $this->hasMany(Update::class);
    }

    public function isFilled()
    {
        return $this->name && $this->email && $this->phone && $this->email_verified_at && $this->profile_picture && $this->address && $this->dob && $this->father_name && $this->mother_name && $this->see_school && $this->see_year && $this->see_gpa && $this->document_link;
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function unreadNotificationsCount()
    {
        return $this->notifications()->whereNull('seen_at')->count();
    }
}

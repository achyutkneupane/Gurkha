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
    public function chatsSent() {
        return $this->hasMany(Chat::class, 'from_user_id');
    }
    public function chatsReceived() {
        return $this->hasMany(Chat::class, 'to_user_id');
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
    public function chats() {
        return Chat::where('from_user_id',$this->id)->orWhere('to_user_id',$this->id);
    }
    public function allChats() {
        $endUser = NULL;
        $chats = $this->chats()->get()->map(function ($chat,$key) use ($endUser) {
            if($chat->from_user_id == auth()->id()) {
                $endUser = User::find($chat->to_user_id);
            } else {
                $endUser = User::find($chat->from_user_id);
            }
            return $endUser;
        })->filter(function ($user) {
            return ($user->id != auth()->id());
        })->unique();
        return $chats;
    }
    public function chatsWith($id) {
        $senderId = $this->id;
        $receiverId = $id;
        $chats = Chat::where(function($chat) use($senderId,$receiverId) {
            return $chat->where('from_user_id',$senderId)->where('to_user_id',$receiverId);
        })->orWhere(function($chat) use($senderId,$receiverId){
            return $chat->where('from_user_id',$receiverId)->where('to_user_id',$senderId);
        });
        return $chats;
    }
}

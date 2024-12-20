<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'lastname',
        'firstname',
        'birthdate',
        'profile_status',
        'email',
        'password',
        'job',
        'picture',
    ];
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function hobbies()
    {
        return $this->belongsToMany(Hobby::class, 'hobbies_users', 'user_id', 'hobby_id');
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isLikedByAuthUser()
    {
        return $this->hasMany(Like::class, 'receiver_id')
            ->where('sender_id', auth()->id())
            ->exists();
    }
}

<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Hobby;
use App\Models\Message;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'lastname',
        'first_name',
        'birthdate',
        'status',
        'email',
        'password',
        'job',
        'photo',
    ];

    protected $dates = [
        'birthdate',
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
        return $this->belongsToMany(Hobby::class, 'hobbies_user', 'user_id', 'hobby_id');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}

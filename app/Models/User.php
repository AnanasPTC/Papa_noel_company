<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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

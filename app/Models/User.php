<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'lastname',
        'firstname',
        'old',
        'email',
        'password',
        'gender',
        'job',
        'picture',
        'like_count',
    ];

    public function likesGiven()
    {
        return $this->hasMany(Like::class, 'user_id');
    }

    public function likesreceived()
    {
        return $this->hasMany(Like::class, 'recipient_id');
    }

    public function messagesSend()
    {
        return $this->hasMany(Message::class, 'user_id');
    }

    public function messagesreveived()
    {
        return $this->hasMany(Message::class, 'recipient_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}

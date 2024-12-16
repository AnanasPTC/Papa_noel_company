<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'recipient_id',
    ];

    public function sender()
    {
        return $this->belongsTo(user::class, 'user_id');
    }

    public function recipient()
    {
        return $this->belongsTo(user::class, 'recipient_id');
    }
}

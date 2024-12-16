<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{

    use HasFactory;

    protected $table = 'messages';
    
    protected $fillable = [
        'user_id',
        'recipient_id',
        'content',
        'date_time',
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type'
    ];

    public function user(){
        return $this->belongsToMany(User::class, 'hobbies_user' , 'hobby_id', 'user_id');
    }
}

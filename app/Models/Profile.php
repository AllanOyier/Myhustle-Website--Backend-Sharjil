<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'profile',
        'logo',
        'background',
        'about',
        'tagline',
        'profile_status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

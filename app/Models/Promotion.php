<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'user_id',
        'image',
        'name',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

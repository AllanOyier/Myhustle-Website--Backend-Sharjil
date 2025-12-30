<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    protected $fillable = ['user_id', 'image', 'product', 'description', 'content'];

    protected $casts = [
        'content' => 'array',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

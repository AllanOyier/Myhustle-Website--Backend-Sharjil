<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCatalogue extends Model
{
    protected $fillable = ['user_id', 'product', 'description', 'content' , 'special_product'];

    protected $casts = [
        'content' => 'array',
        'special_product' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

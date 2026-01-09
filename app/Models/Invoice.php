<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'user_id',
        'reciver_id',
        'description',
        'status',
        'invoice_type',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    protected $attributes = [
    'status' => 'unpaid',
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reciver()
    {
        return $this->belongsTo(User::class);
    }
}

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
        'e_wallet_number',
        'bank_account_holder_name',
        'bank_name',
        'bank_account_number',
        'bank_branch_number',
        'bank_swift_code',
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

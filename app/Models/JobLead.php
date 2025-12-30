<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobLead extends Model
{
    protected $fillable = [
        'user_id',
        'to_name',
        'to_mobile',
        'to_email',
        'from_name',
        'from_mobile',
        'from_email',
        'title',
        'date',
        'time',
        'location',
        'description',
        'rate',
        'image1',
        'image2',
        'from_time',
        'to_time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

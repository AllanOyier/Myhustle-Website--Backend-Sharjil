<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationDetail extends Model
{
     protected $fillable = [
        'user_id',
        'cooperative',
        'sub_cooperative',
        'contract',
        'sub_contract',
        'area_of_focous',
        'industry_activity_survey_detail',
        'industry_activity_survey_vision',
        'referal',
        'referal_number',
        'data_use'
    ];

    protected $casts = [
        'data_use' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

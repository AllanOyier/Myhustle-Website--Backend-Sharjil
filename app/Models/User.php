<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'email',
        'password',
        'country',
        'region',
        'area',
        'type_of_enterprice',
        'mobile_number',
        'whatsapp_number',
        'physical_address',
        'postal_address',
        'gender',
        'type_of_user',

        // Individual user fields
        'name',
        'surname',
        'national_id',
        'national_id_number',

        // Organization fields
        'org_name',
        'org_type',
        'registration_document',
        'registration_number',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function OrganizationDetail()
    {
        return $this->hasOne(OrganizationDetail::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
    public function JobLeads()
    {
        return $this->hasMany(JobLead::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}

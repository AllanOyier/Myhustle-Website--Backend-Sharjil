<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\Service;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthService extends Service
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }


    public function register(array $data): User
    {

        if (!Str::startsWith($data['password'], '$2y$')) {
            $data['password'] = Hash::make($data['password']);
        }


        return $this->create($data);
    }
}

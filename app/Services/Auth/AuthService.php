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


    public function register(array $data)
    {

        if (!Str::startsWith($data['password'], '$2y$')) {
            $data['password'] = Hash::make($data['password']);
        }


        /** @var User $user */
        $user = $this->create($data);

        $token = $user->createToken('auth_token')->plainTextToken;
        return [
            'user' => $user,
            'token' => $token
        ];
    }
    public function login(array $data)
    {
        /** @var User $user */
        $user = $this->query()
            ->where('email', $data['email'])
            ->firstOrFail();

        if (!Hash::check($data['password'], $user->password)) {
            abort(401, 'Invalid credentials');
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }
    public function getUser($userId)
    {
        /** @var User $user */
        $user = $this->query()->find($userId)->load([
            'profile',
            'products',
            'promotions',
            'certificates'
        ]);
        return $user;
    }
}

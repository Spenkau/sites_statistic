<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Error;

class AuthRepository
{
    public function register(array $data): array
    {
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return $this->createPassportToken($user);
    }

    public function login(array $data): array
    {
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $user = Auth::user();

            return $this->createPassportToken($user);
        }

        return throw new Error('Credentials are incorrect!');
    }

    private function createPassportToken(User|Authenticatable|null $user): array
    {
        $success['token'] = $user->createToken('sitesdata')->accessToken;
        $success['name'] = $user->name;

        return $success;
    }
}

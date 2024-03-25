<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(LoginRequest $request)
    {
        $request->validated($request->all());
        if (!Auth::attempt($request->only('username', 'password'))) {
            return $this->error(data: [], message: 'Login failed');
        }

        $user = User::where('email', $request->email)->first();
        return $this->success(data: [
            'user' => $user,
            'token' => $user->createToken('TOKEN ' . $user->email)->plainTextToken
        ]);
    }

    public function logout()
    {
        return $this->success(data: ['user' => 'logout']);
    }
}

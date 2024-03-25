<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    use HttpResponses;
    public function register(RegisterRequest $request)
    {
        $request->validated($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        return $this->success([
            'user' => $user,
            'token' => $user->createToken('Token ' . $user->email)->plainTextToken
        ]);
    }
    public function login(LoginRequest $request)
    {
        $request->validated($request->all());
        if (!Auth::attempt($request->only('email', 'password'))) {
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

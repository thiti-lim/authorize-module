<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Requests\LoginRequest;
use Nwidart\Modules\Facades\Module;
use App\Http\Resources\UserResource;
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

        $user = User::where('username', $request->username)->first();
        $token = $user->createToken('TOKEN ' . $user->username)->plainTextToken;
        return response()->json(data: ['user' => $user, 'token' => $token]);
    }

    public function logout()
    {
        return $this->success(data: ['user' => 'logout']);
    }

    public function user()
    {
        return response()->json(['user' => new UserResource(Auth::user())]);
    }
}

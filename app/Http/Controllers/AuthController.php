<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\RoleResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\ModuleResource;
use App\Http\Resources\ModuleCollection;
use App\Http\Resources\PermissionResource;

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
        $token = $user->createToken('TOKEN ' . $user->username, ['*'], now()->addWeek())->plainTextToken;
        return response()->json(data: ['user' => $user, 'token' => $token]);
    }

    public function logout()
    {
        return $this->success(data: ['user' => 'logout']);
    }

    public function user()
    {
        return response()->json(data: ['user' => new UserResource(Auth::user())]);
    }
    public function modules()
    {
        return response()->json(data: ['modules' => new ModuleCollection(Auth::user()->role->modules)]);
    }
    public function module(Module $module)
    {
        return response()->json(data: ['module' => new ModuleResource($module)]);
    }

}

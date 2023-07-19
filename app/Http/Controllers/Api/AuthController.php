<?php

namespace App\Http\Controllers\Api;

use App\Models\User;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Requests\LoginAuthRequest;
use App\Http\Requests\StoreAuthRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function register(StoreAuthRequest $request)
    {
        $request->validated($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $response = [
            'user' => $user,
        ];

        return $this->sendResponse($response, 'User register successfully', 201);
    }

    public function login(LoginAuthRequest $request)
    {
        $request->validated($request->all());

        $remember = $request->has('remember') ? true : false;

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return $this->sendError('', 'Credentials do not match', 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $response = [
            'user' => $user,
        ];

        return $this->sendResponse($response, 'User login successfully');
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        $response = [];

        return $this->sendResponse($response, 'User logout successfully');
    }
}

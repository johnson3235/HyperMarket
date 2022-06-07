<?php

namespace App\Http\Controllers\Api\user;

use App\Models\Admin;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $admin = Admin::where('email',$request->email)->first();
        if(!Hash::check($request->password,$admin->password)){
            return ApiTrait::errorMessage([ 'password' => __('message.login.password')],__('message.login.faild'),401);
        }
        $token = "Bearer ". $admin->createToken($request->device_type)->plainTextToken;
        $admin->token = $token;
        if(! $admin->email_verified_at){
            return ApiTrait::data(compact('admin'),__('message.login.notverified'),401);
        }
        return ApiTrait::data(compact('admin'),__('message.login.success'),200);

    }

    public function logout(Request $request)
    {
        $admin = Auth::guard('sanctum')->user();
        $admin->currentAccessToken()->delete();
        return ApiTrait::successMessage('You Have logged out successfully');

    }

    public function logoutAll()
    {
        $admin = Auth::guard('sanctum')->user();
        $admin->tokens()->delete();
        return ApiTrait::successMessage('You Have logged out successfully form all devices');
    }
}

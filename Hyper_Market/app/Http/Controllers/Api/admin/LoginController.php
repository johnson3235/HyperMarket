<?php

namespace App\Http\Controllers\Api\user;

use App\Models\user;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function showLoginForm(LoginRequest $request)
    {

         return view('user.auth.login');
    }


    public function login(LoginRequest $request)
    {
        $user = user::where('email',$request->email)->first();
        if(!Hash::check($request->password,$user->password)){
            return ApiTrait::errorMessage([ 'password' => __('message.login.password')],__('message.login.faild'),401);
        }
        $token = "Bearer ". $user->createToken($request->device_type)->plainTextToken;
        $user->token = $token;
        if(! $user->email_verified_at){
            return ApiTrait::data(compact('user'),__('message.login.notverified'),401);
        }
        return ApiTrait::data(compact('user'),__('message.login.success'),200);

    }

    public function logout(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $user->currentAccessToken()->delete();
        return ApiTrait::successMessage('You Have logged out successfully');

    }

    public function logoutAll()
    {
        $user = Auth::guard('sanctum')->user();
        $user->tokens()->delete();
        return ApiTrait::successMessage('You Have logged out successfully form all devices');
    }
}

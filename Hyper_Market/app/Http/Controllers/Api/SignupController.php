<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SignupRequest $request)
    {
        $data = $request->safe()->except('password_confirmation','password');
        $data['password'] = Hash::make($request->password);
        try{
            $user = Admin::create($data);
        }catch(\Exception $e){
            return ApiTrait::errorMessage([],"something went wrong",500);
        }
        $token = 'Bearer '.$user->createToken($request->phone_type)->plainTextToken;
        $user->token = $token;
        return ApiTrait::data(compact('user'),"user Created Successfully",201);
    }
}

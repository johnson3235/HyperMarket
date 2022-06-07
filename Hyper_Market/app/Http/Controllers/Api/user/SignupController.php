<?php

namespace App\Http\Controllers\Api\user;

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
            $admin = Admin::create($data);
        }catch(\Exception $e){
            return ApiTrait::errorMessage([],"something went wrong",500);
        }
        $token = 'Bearer '.$admin->createToken($request->phone_type)->plainTextToken;
        $admin->token = $token;
        return ApiTrait::data(compact('admin'),"Admin Created Successfully",201);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CodeRequest;
use Illuminate\Support\Facades\Auth;

class EmailVerification extends Controller
{
    public function send(Request $request)
    {
        $user = (Auth::guard('sanctum')->user());
        $token = $request->header('Authorization');
        $code = rand(10000,99999);
        $user->code = $code;
        $user->code_expired_at = date('Y-m-d H:i:s',strtotime('+ '.config('auth.code_timeout').' seconds'));
        $user->save();

        // send mail
        $user->token = $token;
        return ApiTrait::data(compact('user'),"Mail Sent Successfully",200);

    }

    public function verify(CodeRequest $request)
    {
        $user = (Auth::guard('sanctum')->user());
        $token = $request->header('Authorization');
        $now = date('Y-m-d H:i:s');
        if($user->code != $request->code){
            return ApiTrait::errorMessage(['code'=>'Wrong Code'],"Invalid Code",422);
        }
        if($now > $user->code_expired_at){
            return ApiTrait::errorMessage(['code'=>'Expired Code'],"Invalid Code",422);
        }

        $user->email_verified_at = $now;
        $user->save();
        $user->token = $token;
        return ApiTrait::data(compact('user'),"Correct Code",200);

    }
}

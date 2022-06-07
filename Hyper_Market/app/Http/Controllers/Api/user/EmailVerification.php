<?php

namespace App\Http\Controllers\Api\user;

use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CodeRequest;
use Illuminate\Support\Facades\Auth;

class EmailVerification extends Controller
{
    public function send(Request $request)
    {
        $admin = (Auth::guard('sanctum')->user());
        $token = $request->header('Authorization');
        $code = rand(10000,99999);
        $admin->code = $code;
        $admin->code_expired_at = date('Y-m-d H:i:s',strtotime('+ '.config('auth.code_timeout').' seconds'));
        $admin->save();

        // send mail
        $admin->token = $token;
        return ApiTrait::data(compact('admin'),"Mail Sent Successfully",200);

    }

    public function verify(CodeRequest $request)
    {
        $admin = (Auth::guard('sanctum')->user());
        $token = $request->header('Authorization');
        $now = date('Y-m-d H:i:s');
        if($admin->code != $request->code){
            return ApiTrait::errorMessage(['code'=>'Wrong Code'],"Invalid Code",422);
        }
        if($now > $admin->code_expired_at){
            return ApiTrait::errorMessage(['code'=>'Expired Code'],"Invalid Code",422);
        }

        $admin->email_verified_at = $now;
        $admin->save();
        $admin->token = $token;
        return ApiTrait::data(compact('admin'),"Correct Code",200);

    }
}

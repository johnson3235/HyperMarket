<?php

namespace App\Http\Controllers\User;

use App\Traits\Media;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserPassRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Http\Requests\UpdateEmployeePassRequest;

class UserController extends Controller
{


    public function MainHome(Request $request)
    {
        $categories = DB::table('Categories')->get();
        return view('user.index',compact('categories'));
    }


    public function aboutUserPage(Request $request)
    {

        return view('user.about');
    }

    public function MainHomeWithoutLogin(Request $request)
    {
        $categories = DB::table('Categories')->get();
        return view('user.index',compact('categories'));
    }

    public function profileUserPage($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $address=DB::table('addresses')->join('regions','regions.id','=','addresses.region_id')->join('cities','cities.region_id','=','regions.id')->where('user_id',$id)->first();
        return view('user.setting', compact('user','address'));
    }


    public function register(Request $request)
    {
        return view('user.auth.register');
    }

    public function login(Request $request)
    {
        return view('user.login');
    }

    public function reset($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        // return view('employee.auth.passwords.reset', compact('employee'));

        return view('user.reset', compact('user'));
    }

    public function updateUserInformation(UpdateUserProfileRequest $request, $id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $data = $request->except('_token', '_method', 'submit', 'image','email');

        if ($request->has('image')) {
            $newPhotoName = Media::upload($request->file('image'),'users');
            if($user->image !='default.png')
            {
            Media::delete("images/users/{$user->image}");
        }
            $data['image'] = $newPhotoName;
        }

        DB::table('users')->where('id', $id)->update($data);
        return redirect()->route('user.profile',$user->id)->with('success', 'Operation Successfull');
    }

    public function updatePasswordUser(UpdateUserPassRequest $request,$id,$email)
    {
        $user = DB::table('users')->where('email', $email)->first();
        $data = $request->except('_token','token','_method', 'submit','password_confirmation');
        $pass=Hash::make($data['password']);
        $data['password']=$pass;
        DB::table('users')->where('id',$id)->where('email', $email)->update($data);
        return redirect()->route('user.profile',$id)->with('success', 'Operation Successfull');
    }
}

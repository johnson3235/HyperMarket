<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $num_order = DB::table('Orders')->count();
        $num_product = DB::table('Products')->count();
        $num_user = DB::table('Users')->count();
        $num_employee = DB::table('employees')->count();
        $user_image = DB::table('Users')->select('image');
        return view('dashboard.dashboard',compact('num_order','num_product','num_user','num_employee','user_image'));
    }
}

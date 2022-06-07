<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\updateCartRequest;

class CartController extends Controller
{
    public function ShowCart($id)
    {
        $carts=DB::table('carts')->leftjoin('products','products.id','=','carts.product_id')->select('carts.*','products.name_en','products.name_en','products.image','products.price')->groupBy('product_id')->where('user_id', $id)->get();
        return view('user.cart', compact('carts','id'));
    }

    public function storeCartProduct(StoreCartRequest $request)
    {
        $data = $request->safe()->except(['_token']);
        $carts=DB::table('carts')->where('user_id', '=', $data['user_id'])->where('product_id', '=', $data['product_id'])->first();
        if(!$carts)
        {
            DB::table('carts')->insert($data);
            return redirect()->route('user.cart.showCart',$data['user_id']);
        }
        else
        {
            $data['quantity']=$data['quantity']+$carts->quantity;
            DB::table('carts')->where('user_id', '=', $data['user_id'])->where('product_id', '=', $data['product_id'])->update(['quantity' => $data['quantity']]);
            return redirect()->route('user.cart.showCart',$data['user_id'])->with('success', 'Update Cart');
        }


    }

    public function updateCartInformation(updateCartRequest $request)
    {
        $data = $request->safe()->except(['_token']);
        DB::table('carts')->where('user_id', '=',  $data['user_id'])->where('product_id', '=',$data['product_id'])->update(['quantity' => $data['quantity']]);
        return redirect()->route('user.cart.showCart',$data['user_id'])->with('success', 'Operation Successfull');
    }


    public function DeleteCart($userid,$productid)
    {
        DB::table('carts')->where('user_id', '=', $userid)->where('product_id', '=',$productid)->delete();
        return redirect()->back()->with('success', 'Operation Successfull');
    }



}

<?php

namespace App\Http\Controllers\User;

use App\Mail\OrderMail;
use Illuminate\Http\Request;
use App\Mail\OrderCancelMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreOrderRequest;
use App\Notifications\OrderNotification;

class OrderController extends Controller
{

    public function OrderPage($id)
    {
        $orders=DB::table('order_products')->join('users','users.id','=','order_products.user_id')->join('orders','orders.id','=','order_products.order_id')->where('order_products.user_id', $id)->groupBy('orders.id')->orderBy('orders.id')->get();

        return view('user.orderlist', compact('orders'));
    }


    public function ShowCartOrder($id)
    {
        $user=DB::table('users')->where('id',$id)->first();
        $address=DB::table('addresses')->join('regions','regions.id','=','addresses.region_id')->join('cities','cities.region_id','=','regions.id')->where('user_id',$id)->first();
        $carts=DB::table('carts')->leftjoin('products','products.id','=','carts.product_id')->select('carts.*','products.name_en','products.name_en','products.image','products.price')->groupBy('product_id')->where('user_id', $id)->get();
        return view('user.checkout', compact('carts','id','user','address'));
    }

    public function Orderdetail($id,$order_id)
    {
        $order_products=DB::table('order_products')->join('products','products.id','=','order_products.product_id')->join('orders','orders.id','=','order_products.order_id')->where('order_products.user_id', $id)->where('order_products.order_id', $order_id)->orderBy('orders.id')->get();
        return view('user.orderdetail', compact('order_products'));
    }



    public function makeOrder(StoreOrderRequest $request)
    {
        $id=$request->safe()->except(['_token']);
        $user=DB::table('users')->where('id',$id['id'])->first();

        $address=DB::table('addresses')->join('regions','regions.id','=','addresses.region_id')->join('cities','cities.region_id','=','regions.id')->where('user_id',$id['id'])->first();
        $carts=DB::table('carts')->leftjoin('products','products.id','=','carts.product_id')->select('carts.*','products.name_en','products.name_en','products.image','products.price')->groupBy('product_id')->where('user_id', $id['id'])->get();
        if(!isset($carts[0]))
        {
            return redirect()->route('user.cart.showCart',$id['id'])->with('danger', 'Cart Empty');
        }
        else
        {
            $data=insertDatainOrder($id['id'] ,$carts,$address);
            DB::table('orders')->insert($data);

            $order_id= DB::table('orders')->select('id')->orderByDesc('created_at')->limit(1)->first();
            $totalprice=GetTotalPrice($id['id'],$carts);
            $data2=[
                'user_id'=>$id['id'],
                'order_id'=>$order_id->id,
                'price'=>$totalprice,
                'product_id'=>'',
                'quantity'=>''

            ];
            foreach($carts as $cart)
            {
                $data2['product_id']=$cart->product_id;
                $data2['quantity']=$cart->quantity;
              DB::table('order_products')->insert($data2);
            }

            DB::table('carts')->where('user_id',$id['id'])->delete();

             Mail::to($user->email)->send(new OrderMail($user,$order_id));

            return redirect()->route('user.cart.showCart',$id['id'])->with('success', 'Order Confirmed');

        }

    }

    public function DeleteOrder($id,$order_id)
    {
        DB::table('order_products')->where('user_id', '=', $id)->where('order_id', '=',$order_id)->delete();
        DB::table('orders')->where('id', '=',$order_id)->delete();
        $user=DB::table('users')->where('id',$id)->first();
        Mail::to($user->email)->send(new OrderCancelMail($user,$order_id));
        return redirect()->route('user.order.listes',$id)->with('success', 'Cancel Order Successfull');
    }


}

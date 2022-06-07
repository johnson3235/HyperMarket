<?php

use Illuminate\Support\Facades\DB;


function returnRedirectAccordingToBtn($request) {
    if ($request->has('submit') && $request->submit === 'index') {
        return redirect()->route('dashboard.products.index')->with('success', 'Operation Successfull');
    } else {
        return redirect()->back()->with('success', 'Operation Successfull');
    }
}

function returnRedirectempToBtn($request) {
    if ($request->has('submit') && $request->submit === 'index') {
        return redirect()->route('employee.products.index')->with('success', 'Operation Successfull');
    } else {
        return redirect()->back()->with('success', 'Operation Successfull');
    }
}

function returnRedirectAccordingToemp($request) {
    if ($request->has('submit') && $request->submit === 'index') {
        return redirect()->route('dashboard.employees.index')->with('success', 'Operation Successfull');
    } else {
        return redirect()->back()->with('success', 'Operation Successfull');
    }
}


function returnRedirectempToemp($request) {
    if ($request->has('submit') && $request->submit === 'index') {
        return redirect()->route('employee.employees.index')->with('success', 'Operation Successfull');
    } else {
        return redirect()->back()->with('success', 'Operation Successfull');
    }
}


 function GetTotalPrice($id,$carts)
{   $total=0;
    $shiping =20;

    foreach($carts as $cart)
    {
        $price=$cart->quantity*$cart->price;
        $total=$total+$price;
    }
    return $total+$shiping;
}

function insertDatainOrder($id ,$carts,$address)
{
    $totalprice=GetTotalPrice($id,$carts);
    $data =[
        'statuses'=>0,
        'total_price'=>$totalprice,
        'address_id' =>$address->id,
    ];
    return $data;
}

<?php

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('user')->user();

    //dd($users);

    return view('user.index');
})->name('home');


<?php
use App\Http\Controllers\Api\admin\SignupController as AdminSignupController ;
use App\Http\Controllers\Api\admin\LoginController as AdminLoginController ;
use App\Http\Controllers\Api\admin\EmailVerification as AdminEmailVerification ;
use App\Http\Controllers\Api\user\SignupController as UserSignupController;
use App\Http\Controllers\Api\user\LoginController as UserLoginController;
use App\Http\Controllers\Api\user\EmailVerification as UserEmailVerification;
use App\Http\Controllers\Api\ProductController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::prefix('admins')->group(function () {
//     Route::post('/signup', AdminSignupController::class); // guest

//     Route::group(['controller' => AdminEmailVerification::class, 'middleware' => 'auth:sanctum'], function () {
//         Route::get('/send-mail', 'send'); //auth
//         Route::post('/check-code', 'verify'); //auth
//     });
//     Route::controller(AdminLoginController::class)->group(function () {
//         Route::middleware('auth:sanctum')->group(function () {
//             Route::get('/logout', 'logout'); //auth
//             Route::get('/logout-all', 'logoutAll'); //auth
//         });

//         Route::post('/login', 'login'); // guest
//     });
// });

// Route::prefix('users')->group(function () {
//     Route::post('/signup', UserSignupController::class); // guest

//     Route::group(['controller' => UserEmailVerification::class, 'middleware' => 'auth:sanctum'], function () {
//         Route::get('/send-mail', 'send'); //auth
//         Route::post('/check-code', 'verify'); //auth
//     });
//     Route::controller(UserLoginController::class)->group(function () {
//         Route::middleware('auth:sanctum')->group(function () {
//             Route::get('/logout', 'logout'); //auth
//             Route::get('/logout-all', 'logoutAll'); //auth
//         });

//         Route::post('/logins', 'login'); // guest
//     });
// });

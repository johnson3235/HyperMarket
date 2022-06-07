<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Employee\Inventory\EmployeeController as MainEmployeeController;
use App\Http\Controllers\Employee\Marketing\EmployeeController as MarketEmployeeController;
use App\Http\Controllers\Dashboard\UserController as DashboardUserController;
use App\Http\Controllers\Employee\ProductController as EmployeeProductController;
use App\Http\Controllers\Employee\Marketing\OfferController as MarketOfferController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminAuthLoginController ;
use App\Http\Controllers\Admin\Auth\RegisterController as AdminAuthRegisiterController ;
use App\Http\Controllers\Admin\Auth\ResetPasswordController  as AdminAuthResetController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController  as AdminAuthForgetController;
use App\Http\Controllers\Employee\Auth\LoginController as EmployeeAuthLoginController ;
use App\Http\Controllers\Employee\Auth\RegisterController as EmployeeAuthRegisiterController ;
use App\Http\Controllers\Employee\Auth\ResetPasswordController  as EmployeeAuthResetController;
use App\Http\Controllers\Employee\Auth\ForgotPasswordController  as EmployeeAuthForgetController;
use App\Http\Controllers\User\Auth\LoginController as UserAuthLoginController ;
use App\Http\Controllers\User\Auth\RegisterController as UserAuthRegisiterController ;
use App\Http\Controllers\User\Auth\ResetPasswordController  as UserAuthResetController;
use App\Http\Controllers\User\Auth\ForgotPasswordController  as UserAuthForgetController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\CartController as UserCartController;
use App\Http\Controllers\User\OrderController as UserOrderController;

use App\Http\Controllers\Api\admin\SignupController as AdminSignupController ;
use App\Http\Controllers\Api\admin\LoginController as AdminLoginController ;
use App\Http\Controllers\Api\admin\EmailVerification as AdminEmailVerification ;
use App\Http\Controllers\Api\user\SignupController as UserSignupController;
use App\Http\Controllers\Api\user\LoginController as UserLoginController;
use App\Http\Controllers\Api\user\EmailVerification as UserEmailVerification;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'user.guest'], function () {
Route::get('/', [UserController::class,'MainHomeWithoutLogin'])->name('indexs');
});

Route::group(['prefix' => 'user','as' => 'user.', 'middleware' => ['auth:user']], function () {
    Route::get('/home', [UserController::class,'MainHome'])->name('index');
    Route::get('/about', [UserController::class,'aboutUserPage'])->name('about');
    Route::get('/profile/{id}', [UserController::class,'profileUserPage'])->name('profile');
    Route::put('/updates/{id}', [UserController::class, 'updateUserInformation'])->name('updates');
    Route::get('/reset/{id}', [UserController::class, 'reset'])->name('resets');
    Route::post('/updated/{id}/{email}', [UserController::class, 'updatePasswordUser'])->name('updatePasses');

    Route::group(['prefix' => 'products'], function () {
    Route::get('/shop', [UserProductController::class,'shop'])->name('shop');
    Route::get('/shop/product/{id}',[UserProductController::class,'ProductDetails'])->name('details');
    Route::get('/shop/product/{id}/{quantity}', [UserProductController::class,'ProductDetailwithquantity'])->name('details2');
    Route::get('/shop/list/{id}', [UserProductController::class,'ShopList'])->name('shoplist');
    });
    Route::group(['prefix' => 'cart' ,'as' => 'cart.'], function () {
    Route::get('/{id}', [UserCartController::class,'ShowCart'])->name('showCart');
    Route::post('/store', [UserCartController::class,'storeCartProduct'])->name('StoreCart');
    Route::post('/update', [UserCartController::class, 'updateCartInformation'])->name('update');
    Route::delete('/destroy/{userid}/{productid}', [UserCartController::class, 'DeleteCart'])->name('destroy');
    });

    Route::group(['prefix' => 'order' ,'as' => 'order.'], function () {
        Route::get('/list/{id}', [UserOrderController::class,'OrderPage'])->name('listes');
        Route::get('/{id}', [UserOrderController::class,'ShowCartOrder'])->name('showcheckout');
        Route::post('/store', [UserOrderController::class,'makeOrder'])->name('makeOrder');
        Route::get('/Details/{id}/{order_id}', [UserOrderController::class, 'Orderdetail'])->name('Details');
        Route::delete('/Destroy/{userid}/{order_id}', [UserOrderController::class, 'DeleteOrder'])->name('destroyOrder');
        });

});

Route::group(['prefix' => 'employees','as' => 'employee.', 'middleware' => (['auth:employee','is_Inventory'])], function () {
    Route::get('/{id}', [MainEmployeeController::class,'profileEmployee'])->name('profiles');
    Route::get('/edit/{id}', [MainEmployeeController::class, 'editEmployeePage'])->name('edits');
    Route::put('/update/{id}', [MainEmployeeController::class, 'updateEmployeeInformation'])->name('updates');
    Route::get('/reset/{id}', [MainEmployeeController::class, 'resetPasswordEmployee'])->name('resets');
    Route::post('/updated/{id}/{email}', [MainEmployeeController::class, 'updatePasswordEmployee'])->name('updatePasses');

});

Route::group(['prefix' => 'market/employees','as' => 'EmpMakreting.', 'middleware' => (['auth:employee','is_Marketing'])], function () {
    Route::get('/{id}', [MarketEmployeeController::class,'profileEmployee'])->name('profiles');
    Route::get('/edit/{id}', [MarketEmployeeController::class, 'editEmployeePage'])->name('edits');
    Route::put('/update/{id}', [MarketEmployeeController::class, 'updateEmployeeInformation'])->name('updates');
    Route::get('/reset/{id}', [MarketEmployeeController::class, 'resetPasswordEmployee'])->name('resets');
    Route::post('/updated/{id}/{email}', [MarketEmployeeController::class, 'updatePasswordEmployee'])->name('updatePasses');

});


Route::group(['prefix' => 'employee','as' => 'employee.', 'middleware' => (['auth:employee','is_Inventory'])], function () {

    Route::get('/homes', [MainEmployeeController::class,'MainPageEmployee'])->name('index');
    Route::get('/mark/{id}', [MainEmployeeController::class,'markReadNotification'])->name('mark');

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/pro', [EmployeeProductController::class, 'ProductDetailsList'])->name('index');
        Route::get('/create', [EmployeeProductController::class, 'createProductDetails'])->name('create');
        Route::post('/store', [EmployeeProductController::class, 'storeProductDetails'])->name('store');
        Route::get('/edit/{id}', [EmployeeProductController::class, 'editProductDetails'])->name('edit');
        Route::put('/update/{id}', [EmployeeProductController::class, 'updateProductDetails'])->name('update');
        Route::delete('/destroy/{id}', [EmployeeProductController::class, 'DeleteProductDetails'])->name('destroy');
        Route::patch('/status/toggle/{id}', [EmployeeProductController::class, 'statusToggle'])->name('toggle');
        Route::get('/offers', [EmployeeProductController::class, 'Offers'])->name('offers');
        Route::patch('/status/toggles/{offer_id}/{product_id}', [EmployeeProductController::class, 'OfferstatusToggle'])->name('offertoggle');
    });
});

Route::group(['prefix' => 'employee','as' => 'EmpMarketing.', 'middleware' => (['auth:employee','is_Marketing'])], function () {
    Route::get('/home', [MarketEmployeeController::class,'index'])->name('index');
    Route::group(['prefix' => 'Reports', 'as' => 'reports.'], function () {
        Route::get('/products', [MarketEmployeeController::class, 'productsReport'])->name('products');
        Route::get('/mostwanted', [MarketEmployeeController::class, 'MostWantedReport'])->name('MostWanted');
        Route::get('/orders', [MarketEmployeeController::class, 'OrdersReport'])->name('orders');

    });
    Route::group(['prefix' => 'Offers', 'as' => 'offers.'], function () {
        Route::get('/products', [MarketEmployeeController::class, 'Offers'])->name('products');
        Route::get('/create', [MarketOfferController::class, 'createOffer'])->name('create');
        Route::post('/store', [MarketOfferController::class, 'storeOfferInformation'])->name('store');
        Route::get('/edit/{id}', [MarketOfferController::class, 'editOfferPage'])->name('edit');
        Route::put('/update/{id}', [MarketOfferController::class, 'updateOfferInformation'])->name('update');
        Route::delete('/destroy/{product_id}/{offer_id}', [MarketOfferController::class, 'DeleteOffer'])->name('destroy');



    });

});



Route::group(['prefix' => 'admin' ], function () {
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard','middleware' => 'auth:admin'], function () {
    Route::get('/', DashboardController::class);

    Route::group(['prefix' => 'admins', 'as' => '.admins.'], function () {
        Route::get('/{id}', [AdminController::class,'DetailsPageAdmin'])->name('profile');
        Route::get('/edit/{id}', [AdminController::class, 'editInformationAdminPage'])->name('edit');
        Route::put('/update/{id}', [AdminController::class, 'updateInformationAdmin'])->name('update');
        Route::get('/reset/{id}', [AdminController::class, 'resetPasswordPage'])->name('reset');
        Route::put('/updated/{id}/{email}', [AdminController::class, 'updatePasswordAdmin'])->name('updatePass');
    });

    Route::group(['prefix' => 'products', 'as' => '.products.'], function () {
        Route::get('/', [ProductController::class, 'MainPage'])->name('index');
        Route::get('/create', [ProductController::class, 'createProduct'])->name('create');
        Route::post('/store', [ProductController::class, 'storeInformationProduct'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'editProductPage'])->name('edit');
        Route::put('/update/{id}', [ProductController::class, 'updateInformationProduct'])->name('update');
        Route::delete('/destroy/{id}', [ProductController::class, 'DeleteProduct'])->name('destroy');
        Route::patch('/status/toggle/{id}', [ProductController::class, 'statusToggle'])->name('toggle');
    });

    Route::group(['prefix' => 'users', 'as' => '.users.'], function () {
        Route::get('/', [DashboardUserController::class, 'UserDetailsList'])->name('index');
    });

    Route::group(['prefix' => 'employees', 'as' => '.employees.'], function () {
        Route::get('/', [EmployeeController::class, 'EmployeeDetailsList'])->name('index');
        Route::get('/create', [EmployeeController::class, 'createEmployeePage'])->name('create');
        Route::post('/store', [EmployeeController::class, 'storeEmployeeInformation'])->name('store');
        Route::get('/edit/{id}', [EmployeeController::class, 'editEmployeePage'])->name('edit');
        Route::put('/update/{id}', [EmployeeController::class, 'updateEmployeeInformation'])->name('update');
        Route::delete('/destroy/{id}', [EmployeeController::class, 'DeleteEmployee'])->name('destroy');
    });
});
});
//Admin

Route::prefix('dashboard')->group(function(){
    Auth::routes(['verify' => true,'register' => false]);
});

Route::prefix('user')->group(function(){
    Auth::routes(['verify' => true,'register' => true]);
});

Route::prefix('admin')->group(function(){
    Auth::routes(['verify' => true,'register' => false]);
});

Auth::routes();

Route::group(['prefix' => 'admin','as' => 'admin.',['middleware' => 'admin.guest']], function () {
  Route::get('/login', [AdminAuthLoginController::class, 'showLoginForm'])->name('login');
  Route::post('/login', [AdminAuthLoginController::class, 'login']);
  Route::post('/logout',  [AdminAuthLoginController::class, 'logout'])->name('logout');

  Route::get('/register', [AdminAuthRegisiterController::class, 'showRegistrationForm'])->name('register');
  Route::post('/register', [AdminAuthRegisiterController::class, 'register']);

  Route::post('/password/email',[AdminAuthForgetController::class, 'sendResetLinkEmail'])->name('password.request');
  Route::post('/password/reset', [AdminAuthResetController::class, 'reset'])->name('password.email');
  Route::get('/password/reset', [AdminAuthForgetController::class, 'showLinkRequestForm'])->name('password.reset');
  Route::get('/password/reset/{token}',[AdminAuthResetController::class, 'showResetForm']);
});


Route::group(['prefix' => 'employee','as' => 'employee.',['middleware' => 'employee.guest']], function () {
  Route::get('/login', [EmployeeAuthLoginController::class, 'showLoginForm'])->name('login');
  Route::post('/login', [EmployeeAuthLoginController::class, 'login'] );
  Route::post('/logout', [EmployeeAuthLoginController::class, 'logout'])->name('logout');

  Route::get('/register',[EmployeeAuthRegisiterController::class, 'showRegistrationForm'])->name('register');
  Route::post('/register',[EmployeeAuthRegisiterController::class, 'register'] );

  Route::post('/password/email',[EmployeeAuthForgetController::class, 'sendResetLinkEmail'])->name('password.request');
  Route::post('/password/reset',[EmployeeAuthResetController::class, 'reset'])->name('password.email');
  Route::get('/password/reset',[EmployeeAuthForgetController::class, 'showLinkRequestForm'])->name('password.reset');
  Route::get('/password/reset/{token}',[EmployeeAuthResetController::class, 'showResetForm']);
});

Route::group(['prefix' => 'user','as' => 'users.',['middleware' => 'user.guest']], function () {
    Route::get('/login', [UserAuthLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserAuthLoginController::class, 'login'] );
    Route::post('/logout', [UserAuthLoginController::class, 'logout'])->name('logout');

    Route::get('/register',[UserAuthRegisiterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register',[UserAuthRegisiterController::class, 'register'] );

    Route::post('/password/email',[UserAuthForgetController::class, 'sendResetLinkEmail'])->name('password.request');
    Route::post('/password/reset',[UserAuthResetController::class, 'reset'])->name('password.email');
    Route::get('/password/reset',[UserAuthForgetController::class, 'showLinkRequestForm'])->name('password.reset');
    Route::get('/password/reset/{token}',[UserAuthResetController::class, 'showResetForm']);
  });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Models\Permission;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Menus\MenuController;
use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\Users\LoginController;
use App\Http\Controllers\Admin\Role\RoleController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Users\VerificationController;
use App\Http\Controllers\Admin\Sliders\SliderController;
use App\Http\Controllers\Admin\Message\MessageController;
use App\Http\Controllers\Admin\Product\ProductController;

use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Permission\PermissionController;

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
// Route::get('/', function () {
//     return redirect()->view('home');
// });

Route::get('/', function () {
    return redirect()->route('login.index');
})->name('login');
Route::get('/home', function () {
    return view('home');
})->name('home');


Route::prefix('admin/users')->group(function() {
        #LoginController
        Route::controller(LoginController::class)->group(function () {
                Route::get('login','index')->name('login.index');
                Route::post('login/store', 'store')->name('login.store');
                #forgot password
                Route::get('users/forgot-password', 'forgotPassword')->name('users.forgot-password');
                Route::post('users/forgot-password','postForgotPass')->name('forgot-password');
                Route::get('users/forgot-password/search-success','searchSuccess')->name('search-success');
                Route::get('get-password/{customer}/{token}','getPass')->name('users.change-password');
                Route::post('get-password/{customer}/{token}','postGetPass');
        #register
        Route::controller(AuthController::class)->group(function () {
            Route::get('/index',  'index')->name('users.index');
            Route::post('/register',  'register')->name('register');
            Route::post('/re_register',  're_register');
            
        });
        Route::controller(VerificationController::class)->group(function () {
            Route::get('email/verify/{id}', 'verify')->name('verification.verify');
            Route::post('email/verify_OTP', 'verify_OTP')->name('verification.verify_OTP');
            Route::post('email/logout_OTP', 'logout_OTP');
        });
    });
});

Route::middleware(['auth'])
    ->group(function () {
        Route::prefix('admin')->name('admin.')->group(function () {
            #Category
            Route::controller(CategoryController::class)->name('categories.')->prefix('categories')->group(function () {
                Route::get('/', 'index')->name('index')->middleware('can:category-list');

                Route::get('/create', 'create')->name('create')->middleware('can:category-add');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{id}', 'edit')->name('edit')->middleware('can:category-edit');
                Route::post('/update/{id}', 'update')->name('update');
                Route::get('/delete/{id}', 'delete')->name('delete')->middleware('can:category-delete');
            });
            #Menus
            Route::controller(MenuController::class)->name('menus.')->prefix('menus')->group(function () {
                Route::get('/', 'index')->name('index')->middleware('can:menu-list');

                Route::get('/create', 'create')->name('create')->middleware('can:menu-add');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{id}', 'edit')->name('edit')->middleware('can:menu-edit');
                Route::post('/update/{id}', 'update')->name('update');
                Route::get('/delete/{id}', 'delete')->name('delete')->middleware('can:menu-delete');
            });
            #Product 
            Route::controller(ProductController::class)->name('products.')->prefix('products')->group(function () {
                Route::get('/', 'index')->name('index')->middleware('can:product-list');
                Route::get('/create', 'create')->name('create')->middleware('can:product-add');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{id}', 'edit')->name('edit')->middleware('can:product-edit,id');
                Route::post('/update/{id}', 'update')->name('update');
                Route::get('/delete/{id}', 'delete')->name('delete')->middleware('can:product-delete,id');

            });
            #Slider
            Route::controller(SliderController::class)->name('sliders.')->prefix('sliders')->group(function () {
                Route::get('/', 'index')->name('index')->middleware('can:slider-list');
                Route::get('/create', 'create')->name('create')->middleware('can:slider-add');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{id}', 'edit')->name('edit')->middleware('can:slider-edit');
                Route::post('/update/{id}', 'update')->name('update');
                Route::get('/delete/{id}', 'delete')->name('delete')->middleware('can:slider-delete');

            });
            #Setting
            Route::controller(SettingController::class)->name('settings.')->prefix('settings')->group(function () {
                Route::get('/', 'index')->name('index')->middleware('can:setting-list');
                Route::get('/create', 'create')->name('create')->middleware('can:setting-add');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{id}', 'edit')->name('edit')->middleware('can:setting-edit');
                Route::post('/update/{id}', 'update')->name('update');
                Route::get('/delete/{id}', 'delete')->name('delete')->middleware('can:setting-delete');

            });
            #User
            Route::controller(UserController::class)->name('users.')->prefix('users')->group(function () {
                Route::get('/', 'index')->name('index')->middleware('can:user-list');
                Route::get('/create', 'create')->name('create')->middleware('can:user-add');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{id}', 'edit')->name('edit')->middleware('can:user-edit');
                Route::post('/update/{id}', 'update')->name('update');
                Route::get('/delete/{id}', 'delete')->name('delete')->middleware('can:user-delete');
            });
            #Role
            Route::controller(RoleController::class)->name('roles.')->prefix('roles')->group(function () {
                Route::get('/', 'index')->name('index')->middleware('can:role-list');
                Route::get('/create', 'create')->name('create')->middleware('can:role-add');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/update/{id}', 'update')->name('update');
                Route::get('/delete/{id}', 'delete')->name('delete')->middleware('can:role-delete');
            });
            #permision
            Route::controller(PermissionController::class)->name('permissions.')->prefix('permissions')->group(function () {
                Route::get('/create', 'create')->name('create')->middleware('can:permission-add');
                Route::post('/store', 'store')->name('store');
            });
            #message
            Route::controller(MessageController::class)->name('message.')->prefix('message')->group(function () {

                Route::get('/message', 'index')->name('view');
                Route::get('/messages', 'fetchMessages')->name('fetch');
                Route::post('/messages', 'sendMessage')->name('send');
            });

            #logout
            Route::get('/logout', [LoginController::class, 'logout'])->name('users.logout');
        });
    });
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
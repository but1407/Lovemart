<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\Users\LoginController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Users\VerificationController;




// Route::prefix('admin/users')->group(function() {
//         #LoginController
//         Route::controller(LoginController::class)->group(function () {
//                 Route::get('login','index')->name('login.index');
//                 Route::post('login/store', 'store')->name('login.store');
//                 #forgot password
//                 Route::get('users/forgot-password', 'forgotPassword')->name('users.forgot-password');
//                 Route::post('users/forgot-password','postForgotPass')->name('forgot-password');
//                 Route::get('users/forgot-password/search-success','searchSuccess')->name('search-success');
//                 Route::get('get-password/{customer}/{token}','getPass')->name('users.change-password');
//                 Route::post('get-password/{customer}/{token}','postGetPass');
//         #register
//         Route::controller(AuthController::class)->group(function () {
//             Route::get('/index',  'index')->name('users.index');
//             Route::post('/register',  'register')->name('register');
//             Route::post('/re_register',  're_register');
            
//         });
//         Route::controller(VerificationController::class)->group(function () {
//             Route::get('email/verify/{id}', 'verify')->name('verification.verify');
//             Route::post('email/verify_OTP', 'verify_OTP')->name('verification.verify_OTP');
//             Route::post('email/logout_OTP', 'logout_OTP');
//         });
//     });
// });
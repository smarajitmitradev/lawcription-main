<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SubscriptionController;
use App\Http\Controllers\Frontend\RazorpayController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ProfileController;

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
//     return view('welcome');
// });

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');

Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('send.otp');

Route::get('/verify-otp', [AuthController::class, 'verifyOtpPage'])
        ->name('verify.otp.page');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify.otp');

Route::get('/complete-profile', [AuthController::class, 'completeProfilePage'])
        ->name('complete.profile');

Route::post('/complete-profile', [AuthController::class, 'saveProfile'])
        ->name('save.profile');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about_us'])->name('about-us');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/subscription', [SubscriptionController::class, 'index'])

        ->name('subscription.index');


Route::middleware('auth')->group(function () {
        Route::post('/create-order', [RazorpayController::class, 'createOrder']);
        Route::post('/verify-payment', [RazorpayController::class, 'verify']);
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/avatar/update', [ProfileController::class, 'update_avatr'])->name('avatar.update');
});

// webhook

Route::post('/razorpay/webhook', [RazorpayController::class, 'webhook'])->name('razorpay.webhook');

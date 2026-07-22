<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SubscriptionController;
use App\Http\Controllers\Frontend\RazorpayController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Frontend\UserPageController;
use App\Http\Controllers\AccountDeletionController;

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
Route::get('/home', [HomeController::class, 'index_new'])->name('home.new');
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

        Route::delete('/account/delete', [ProfileController::class, 'deleteAccount'])->name('account.delete');
});



// Public — no auth middleware. This is the URL you give Google Play.
Route::middleware('throttle:5,1')->group(function () {
        Route::get('/delete-account', [AccountDeletionController::class, 'show'])
                ->name('account-deletion.show');

        Route::post('/delete-account', [AccountDeletionController::class, 'destroy'])
                ->name('account-deletion.destroy');

        Route::get('/delete-account/otp', [AccountDeletionController::class, 'showOtp'])
                ->name('account-deletion.otp');

        Route::post('/delete-account/otp', [AccountDeletionController::class, 'verifyOtp'])
                ->name('account-deletion.otp.verify');
});

// webhook

Route::post('/razorpay/webhook', [RazorpayController::class, 'webhook'])->name('razorpay.webhook');

Route::get('/about', [UserPageController::class, 'about'])->name('user.about');
Route::get('/terms', [UserPageController::class, 'terms'])->name('user.terms');

Route::get('/privacy', [UserPageController::class, 'privacy'])->name('user.privacy');

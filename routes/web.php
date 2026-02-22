<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::post('/signup', [AuthController::class, 'register'])->name('signup.post');
Route::post('/logins', [AuthController::class, 'login'])->name('login.post');
Route::post('forgotpw', [AuthController::class, 'forgotpw'])->name('forgotpw.post');
Route::post('/password.reset', [AuthController::class, 'passwordReset'])->name('password.reset');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

// Route::post('/login', function () {
//     return redirect()->route('dashboard');
// })->name('login.submit');


Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/seller-address', function () {
    return view('seller-address');
})->name('seller-address');

Route::get('/plans', function () {
    return view('plans');
})->name('plans');

Route::get('/forgot-pw', function () {
    return view('forgot-pw');
})->name('forgot-pw');

Route::get('/reset-pw', function () {
    return view('reset-pw');
})->name('reset-pw');

Route::get('/logout', function () {
    return view('logout');
})->name('logout');

Route::get('/plans', function () {
    return view('plans');
})->name('plans');

Route::get('/seller-address', function () {
    return view('seller-address');
})->name('seller-address');

Route::get('plan-subscribe', function () {
    return view('plan-subscribe');
})->name('plan-subscribe');

Route::get('my-plan', function () {
    return view('my-plan');
})->name('my-plan');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/orders', function () {
    return view('orders');
})->name('orders');

Route::get('/returns', function () {
    return view('returns');
})->name('returns');

Route::get('/shipments', function () {
    return view('shipments');
})->name('shipments');

Route::get('settlements', function () {
    return view('settlements');
})->name('settlements');

Route::get('products', function () {
    return view('products');
})->name('products');

Route::get('inventory', function () {
    return view('inventory');
})->name('inventory');

Route::get('grievances', function () {
    return view('grievances');
})->name('grievances');

Route::get('manage-users', function () {
    return view('manage-users');
})->name('manage-users');

Route::get('bank-details', function () {
    return view('bank-details');
})->name('bank-details');

Route::get('profile-page', function () {
    return view('profile-page');
})->name('profile-page');

Route::get('ondc-policy', function () {
    return view('ondc_policy');
})->name('ondc-policy');

Route::get('success-stories', function () {
    return view('success_stories');
})->name('success-stories');


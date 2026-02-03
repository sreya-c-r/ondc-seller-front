<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {
    return redirect()->route('dashboard');
})->name('login.submit');


Route::get('/register', function () {
    return view('register');
})->name('register');

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

Route::get('settlements', function(){
    return view('settlements');
})->name('settlements');

Route::get('products', function(){
    return view('products');
})->name('products');

Route::get('inventory', function(){
    return view('inventory');
})->name('inventory');
    
Route::get('grievances', function(){
    return view('grievances');
})->name('grievances');
    
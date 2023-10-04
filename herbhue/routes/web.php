<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Clear All cache:
/*Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Cache::flush();
    return 'Route, Config and View cache has been cleared';
});
*/
Route::get('/cacheclear', function(){
Artisan::Call('config:cache');
Artisan::Call('view:cache');
Artisan::Call('route:cache');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/signup', function () {
    return view('signup');
});

Route::get('/registrationsuccessfull', function () {
    return view('registrationsuccessfull');
});



Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/productpage', function () {
    return view('frontend.productpage');
});


Route::get('/cart', function () {
    return view('frontend.cart');
});

Route::get('/checkoutpage', function () {
    return view('frontend.checkoutpage');
});

Route::get('/order', function () {
    return view('frontend.order');
});
Route::get('/personalized', function () {
    return view('frontend.personalized');
});
Route::get('/shipping', function () {
    return view('frontend.shipping');
});


Route::get('/shop', function () {
    return view('frontend.shop');
});



Route::get('/wishlist', function () {
    return view('frontend.wishlist');
});


Route::get('/accountpage', function () {
    return view('frontend.accountpage');
});


Route::get('/contact-us', function () {
    return view('frontend.contact-us');
});


Route::get('/about-us', function () {
    return view('frontend.about-us');
});



 

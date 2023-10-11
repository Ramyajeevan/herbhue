<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DeliveryController;
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

Route::get('/cacheclear', function(){
Artisan::Call('config:cache');
Artisan::Call('view:cache');
Artisan::Call('route:cache');
});

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('login', [HomeController::class, 'login'])->name('login');

Route::post('login',[HomeController::class, 'doLogin'])->name('login');
Route::get('logout',[HomeController::class, 'logout'])->name('logout');

Route::get('register',[HomeController::class, 'register'])->name('register');

Route::post('register',[HomeController::class, 'doRegister'])->name('register');
Route::get('registrationsuccessfull',[HomeController::class, 'registrationsuccessfull'])->name('registrationsuccessfull');
Route::get('forgotpassword',[HomeController::class, 'forgotpassword'])->name('forgotpassword');
Route::get('myaccount',[HomeController::class, 'myaccount'])->name('myaccount');
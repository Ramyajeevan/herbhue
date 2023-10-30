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
//Artisan::Call('route:cache');
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
Route::post('forgotpasswordlink',[HomeController::class, 'forgotpasswordlink'])->name('forgotpasswordlink');

Route::get('myaccount',[HomeController::class, 'myaccount'])->name('myaccount');
Route::post('myaccountsettings',[HomeController::class, 'myaccountsettings'])->name('myaccountsettings');
Route::get('products/{category_id?}/{subcategory_id?}',[HomeController::class, 'products'])->name('products');
Route::get('productdetail/{id}',[HomeController::class, 'productdetail'])->name('productdetail');

Route::post('deletewishlist',[HomeController::class, 'deletewishlist'])->name('deletewishlist');
Route::get('myorders',[HomeController::class, 'myorders'])->name('myorders');
Route::get('mywishlist',[HomeController::class, 'mywishlist'])->name('mywishlist');
Route::get('resetpassword',[HomeController::class, 'resetpassword'])->name('resetpassword');
Route::post('updatepassword',[HomeController::class, 'updatepassword'])->name('updatepassword');
Route::get('vieworder/{id}',[HomeController::class, 'vieworder'])->name('vieworder');

Route::get('search',[HomeController::class, 'searchproducts'])->name('search');
Route::get('privacy',[HomeController::class, 'privacy'])->name('privacy');
Route::get('terms',[HomeController::class, 'terms'])->name('terms');
Route::get('refund',[HomeController::class, 'refund'])->name('refund');

Route::get('faq',[HomeController::class, 'faq'])->name('faq');
Route::get('contact',[HomeController::class, 'contact'])->name('contact');
Route::get('aboutus',[HomeController::class, 'aboutus'])->name('aboutus');
Route::post('contactus',[HomeController::class, 'contactus'])->name('contactus');


Route::post('addtowishlist',[HomeController::class, 'addtowishlist'])->name('addtowishlist');
Route::post('checkpincode',[HomeController::class, 'checkpincode'])->name('checkpincode');

Route::post('subscribe',[HomeController::class, 'subscribe'])->name('subscribe');
Route::post('addrating',[HomeController::class, 'addrating'])->name('addrating');

Route::post('addtocart',[CartController::class, 'addtocart'])->name('addtocart');
Route::post('incrementvalue',[CartController::class, 'incrementvalue'])->name('incrementvalue');
Route::post('decrementvalue',[CartController::class, 'decrementvalue'])->name('decrementvalue');
Route::delete('deletecart',[CartController::class, 'deletecart'])->name('deletecart');
Route::get('viewcart',[CartController::class, 'viewcart'])->name('viewcart');
Route::post('applycoupon',[CartController::class, 'applycoupon'])->name('applycoupon');
Route::get('checkout',[CartController::class, 'checkout'])->name('checkout');
Route::post('movetocart',[CartController::class, 'movetocart'])->name('movetocart');

Route::post('placeorder',[OrderController::class, 'placeorder'])->name('placeorder');
Route::get('thankyou/{order_id}',[OrderController::class, 'thankyou'])->name('thankyou');
Route::get('payment',[OrderController::class, 'payment'])->name('payment');
Route::post('placeorder1',[OrderController::class, 'placeorder1'])->name('placeorder1');


// added on 30-10-2023

Route::get('/personalized',[HomeController::class, 'personalized'])->name('personalized');
?>
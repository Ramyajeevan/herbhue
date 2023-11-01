<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\TicketController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
   // return view('welcome');
   return view('auth/login');
})->name('/');

//Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test',function(){
    return view('test');
});
Route::get('/cacheclear', function(){
Artisan::Call('config:cache');
Artisan::Call('view:cache');
Artisan::Call('route:cache');
});

Route::get('login', function () {   return view('auth/login'); })->name('login');
Route::post('dologin', [LoginController::class, 'dologin'])->name('dologin');
Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::post('logoutform', [HomeController::class, 'logoutform'])->name('logoutform');


Route::get('banner',[BannerController::class, 'index'])->name('banner.index');
Route::get('banner/create',[BannerController::class, 'create'])->name('banner.create');
Route::post('banner/create',[BannerController::class, 'store'])->name('banner.store');
Route::delete('banner/{id}',[BannerController::class, 'destroy'])->name('banner.destroy');
Route::get('banner/update/{id}',[BannerController::class, 'edit'])->name('banner.edit');
Route::post('banner/update/{id}',[BannerController::class, 'update'])->name('banner.update');


Route::get('category',[CategoryController::class, 'index'])->name('category.index');
Route::get('category/create',[CategoryController::class, 'create'])->name('category.create');
Route::post('category/create',[CategoryController::class, 'store'])->name('category.store');
Route::delete('category/{id}',[CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('category/update/{id}',[CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/update/{id}',[CategoryController::class, 'update'])->name('category.update');


Route::get('subcategory',[SubCategoryController::class, 'index'])->name('subcategory.index');
Route::get('subcategory/create',[SubCategoryController::class, 'create'])->name('subcategory.create');
Route::post('subcategory/create',[SubCategoryController::class, 'store'])->name('subcategory.store');
Route::delete('subcategory/{id}',[SubCategoryController::class, 'destroy'])->name('subcategory.destroy');
Route::get('subcategory/update/{id}',[SubCategoryController::class, 'edit'])->name('subcategory.edit');
Route::post('subcategory/update/{id}',[SubCategoryController::class, 'update'])->name('subcategory.update');

Route::get('product',[ProductController::class, 'index'])->name('product.index');
Route::get('product/create',[ProductController::class, 'create'])->name('product.create');
Route::post('product/create',[ProductController::class, 'store'])->name('product.store');
Route::delete('product/{id}',[ProductController::class, 'destroy'])->name('product.destroy');
Route::get('product/update/{id}',[ProductController::class, 'edit'])->name('product.edit');
Route::post('product/update/{id}',[ProductController::class, 'update'])->name('product.update');
Route::post('showsubcategory',[ProductController::class, 'showsubcategory'])->name('showsubcategory');

Route::get('user',[UserController::class, 'index'])->name('user.index');
Route::delete('user/{id}',[UserController::class, 'destroy'])->name('user.destroy');
Route::get('user/update/{id}',[UserController::class, 'edit'])->name('user.edit');
Route::post('user/update/{id}',[UserController::class, 'update'])->name('user.update');

Route::get('order',[OrderController::class, 'index'])->name('order.index');
Route::delete('order/{id}',[OrderController::class, 'destroy'])->name('order.destroy');
Route::get('order/update/{id}',[OrderController::class, 'edit'])->name('order.edit');
Route::post('order/update/{id}',[OrderController::class, 'update'])->name('order.update');

Route::get('coupon',[CouponController::class, 'index'])->name('coupon.index');
Route::get('coupon/create',[CouponController::class, 'create'])->name('coupon.create');
Route::post('coupon/create',[CouponController::class, 'store'])->name('coupon.store');
Route::delete('coupon/{id}',[CouponController::class, 'destroy'])->name('coupon.destroy');
Route::get('coupon/update/{id}',[CouponController::class, 'edit'])->name('coupon.edit');
Route::post('coupon/update/{id}',[CouponController::class, 'update'])->name('coupon.update');
Route::post('coupon/status',[CouponController::class, 'changestatus'])->name('coupon.status');

Route::get('brand',[BrandController::class, 'index'])->name('brand.index');
Route::get('brand/create',[BrandController::class, 'create'])->name('brand.create');
Route::post('brand/create',[BrandController::class, 'store'])->name('brand.store');
Route::delete('brand/{id}',[BrandController::class, 'destroy'])->name('brand.destroy');
Route::get('brand/update/{id}',[BrandController::class, 'edit'])->name('brand.edit');
Route::post('brand/update/{id}',[BrandController::class, 'update'])->name('brand.update');

Route::get('ticket',[TicketController::class, 'index'])->name('ticket.index');
Route::delete('ticket/{id}',[TicketController::class, 'destroy'])->name('ticket.destroy');
Route::get('ticket/update/{id}',[TicketController::class, 'edit'])->name('ticket.edit');
Route::post('ticket/update/{id}',[TicketController::class, 'update'])->name('ticket.update');

Route::get('ratings',[ProductController::class, 'ratings'])->name('ratings.index');
Route::delete('ratings/{id}',[ProductController::class, 'ratingsdestroy'])->name('ratings.destroy');
?>

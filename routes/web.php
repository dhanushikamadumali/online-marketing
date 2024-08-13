<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerOrderController;

Route::get('/', function () {
    return view('home');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/home/dresses', 'dress')->name('dress');
Route::view('/home/toys', 'toys')->name('toys');
Route::view('/home/cosmetics', 'cosmetics')->name('cosmetics');
Route::view('/home/gift-items', 'gifts')->name('gifts');
Route::view('/home/school_equipments', 'school_equipments')->name('school_equipments');
Route::view('/home/phone_Accessories', 'phone_Accessories')->name('phone_Accessories');
Route::view('/home/baby_things', 'baby_things')->name('baby_things');
Route::view('/home/house_hold_goods', 'house_hold_goods')->name('house_hold_goods');
Route::view('/home/food', 'food')->name('food');


Route::view('/home/product', 'single_product_page')->name('single_product_page');
Route::view('/home/shopping-cart', 'shopping_cart')->name('shopping_cart');
Route::view('/home/shopping-cart/checkout', 'checkout')->name('checkout');

Route::view('/home/affiliate/register', 'aff_reg')->name('aff_reg');
Route::view('/home/affiliate/login', 'aff_login')->name('aff_login');
Route::view('/home/affiliate/all', 'aff_all')->name('aff_all');
Route::view('/home/affiliate/single', 'aff_single')->name('aff_single');
Route::view('/cart/payment', 'payment')->name('payment');


//member dashboard
Route::get('home/My-Account', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('home/My-Account/edit-profile', function () {
    return view('edit-profile');
})->name('edit-profile');

Route::get('home/My-Account/order-history', function () {
    return view('order-history');
})->name('order-history');

Route::get('home/My-Account/order-details', function () {
    return view('order-details');
})->name('order-details');

Route::get('home/My-Account/change-password', function () {
    return view('change-password');
})->name('change-password');

Route::get('home/My-Account/points', function () {
    return view('points');
})->name('points');

Route::get('home/My-Account/addresses', function () {
    return view('addresses');
})->name('addresses');

Route::get('home/My-Account/logout', function () {
    return view('logout');
})->name('logout');
Auth::routes();




Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('shopping_cart');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/delete/{index}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');

Route::get('/product', [ProductController::class, 'show'])->name('single_product_page');

Route::post('/order/store', [CustomerOrderController::class, 'store'])->name('order.store');


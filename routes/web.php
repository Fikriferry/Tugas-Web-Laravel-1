<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CartController;


use App\Models\Product;
use Illuminate\Http\Request;


Route::get('/p', function () {
    return view('welcome');
})->name('home');

Route::get('/',[HomepageController::class,'index']);
Route::get('products', [HomepageController::class, 'products']);
Route::get('product/{slug}', [HomepageController::class, 'product'])->name(name:'product.show');
Route::get('categories',[HomepageController::class, 'categories']);
Route::get('category/{slug}', [HomepageController::class, 'category']);
Route::get('cart', [HomepageController::class, 'cart']);
Route::get('checkout', [HomepageController::class, 'checkout']);

Route::get('cart', [HomepageController::class, 'cart'])->name('cart.index');
Route::get('checkout', [HomepageController::class, 'checkout'])->name('checkout.index');

// Route::group(['middleware'=>['is_customer_login']], function(){
    Route::controller(CartController::class)->group(function () {
        Route::post('cart/add', 'add')->name('cart.add');
        Route::delete('cart/remove/{id}', 'remove')->name('cart.remove');
        Route::patch('cart/update/{id}', 'update')->name('cart.update');
    });
// });

Route::group(['prefix'=>'dashboard'], function(){
    Route::get('/', [HomepageController::class, 'index'])->name('web.homepage');
    Route::resource('posts', PostController::class);
    Route::resource('products', ProductController::class);
    Route::resource('categories', ProductCategoryController::class);
   })->middleware(['auth', 'verified']);

Route::group(['prefix'=>'customer'], function(){
    Route::controller(CustomerAuthController::class)->group(function(){
        //tampilkan halaman login
        Route::get('login','login')->name('customer.login');
        //aksi login
        Route::post('login','store_login')->name('customer.store_login');
        //tampilkan halaman register
        Route::get('register','register')->name('customer.register');
        //aksi register
        Route::post('register','store_register')->name('customer.store_register');
        //aksi logout
        Route::post('logout','logout')->name('customer.logout');
 });
});


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

__DIR__.'/auth.php';
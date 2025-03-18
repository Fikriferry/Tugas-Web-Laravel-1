<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/produk', function () {
    $produk = [
        ['nama' => 'Laptop', 'harga' => 15000000],
        ['nama' => 'Smartphone', 'harga' => 5000000],
        ['nama' => 'Tablet', 'harga' => 3000000]
    ];
    return view('produk', ['produk' => $produk]);
});

Route::get('/keranjang', function () {
    // Logika untuk menampilkan keranjang belanja
    return "Halaman keranjang belanja";
});

Route::get('/checkout', function () {
    // Logika untuk melakukan checkout
    return "Halaman checkout";
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('home');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
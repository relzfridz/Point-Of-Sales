<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

 

 
Route::get('/warung-sembako', function () {return view ('layouts/template', ['title' => 'Template']);})->name('template');
Route::get('/', function () {
        return view ('login', ['title' => 'Login']);
})->name('penggunas');


Route::group(['middleware' => 'role:admin'], function () {
        // Definisikan rute Anda di sini

        Route::resource('mereks', MerekController::class)->middleware('auth');
        Route::resource('distributors', DistributorController::class)->middleware('auth');
        Route::resource('penggunas', PenggunaController::class)->middleware('auth');
});
Route::group(['middleware' => 'role:admin|kasir'], function () {
        // Definisikan rute Anda di sini
        Route::resource('barangs', BarangController::class)->middleware('auth');
        Route::resource('transaksis', TransaksiController::class)->middleware('auth');
        Route::get('/get-harga', [TransaksiController::class, 'getHarga'])->name('getHarga');
        Route::get('items', [TransaksiController::class, 'cart'])->name('cart.items');
                Route::post('cart', [TransaksiController::class, 'addToCart'])->name('cart.store');
                Route::post('update-cart', [TransaksiController::class, 'updateCart'])->name('cart.update');
                Route::post('update-all-cart', [TransaksiController::class, 'updateAllCart'])->name('cart.update-all');
                Route::post('remove', [TransaksiController::class, 'removeCart'])->name('cart.remove');
                Route::post('clear', [TransaksiController::class, 'clearAllCart'])->name('cart.clear');
                Route::post('pay', [TransaksiController::class, 'payCart'])->name('cart.pay');
    });
Route::get('register', [UserController::class, 'register'])->name('register');
Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');


// Route::get('distributors/{distributor}/edit', [DistributorController::class, 'edit'])->name('distributors.edit');
// Route::get('distributors', [DistributorController::class, 'index'])->name('distributors.index');
// Route::get('distributors/{distributor}', [DistributorController::class, 'show'])->name('distributors.show');
// Route::put('distributors/{distributor}', [DistributorController::class, 'update'])->name('distributors.update');
// Route::get('distributors/{distributor}', [DistributorController::class, 'create'])->name('distributors.create');
// Route::get('distributors/{distributor}', [DistributorController::class, 'destroy'])->name('distributors.destroy');
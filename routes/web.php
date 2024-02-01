<?php

use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Orders;
use App\Http\Livewire\Admin\Product;
use App\Http\Livewire\Admin\Table;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Client\Cart;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Client\Home;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('client.')->group(function() {
    Route::get('/', Home::class)->name('home');
    Route::get('/auth/login', Login::class)->name('login');
    Route::get('/cart', Cart::class,)->name('cart');
});

Route::name('admin.')->group(function() {
    Route::middleware(['auth'])->group(function() {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        Route::get('/dashboard/table', Table::class)->name('table');
        Route::get('/dashboard/products', Product::class)->name('products');
        Route::get('/dashboard/orders', Orders::class)->name('orders');
    });
});

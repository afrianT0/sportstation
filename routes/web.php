<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RentalController;

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
    return redirect()->route('login');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index', [
            'title' => 'Home'
        ]);
    })->name('dashboard');
    Route::resource('/dashboard/items', ItemController::class);
    Route::get('/dashboard/items/{item}/json', [
        ItemController::class, 'json'
    ])->name('dashboard.items.json');
    Route::resource('/dashboard/orders', OrderController::class);
    Route::resource('/dashboard/rentals', RentalController::class);
});

Route::group(['middleware' => ['can:isAdmin']], function () {
    Route::resource('/dashboard/users', UserController::class);
});

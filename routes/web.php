<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dinner');
});

Route::get('/app', function () {
    return view('layouts.app');
});

Route::get('/login', function () {
    return view('layouts.login');
});

Route::get('/register', function () {
    return view('auth.register');
});


Auth::routes();

Route::post('/dinner', [App\Http\Controllers\DinnerController::class, 'store'])->name('dinner.store');
Route::get('/dinner', [App\Http\Controllers\DinnerController::class, 'create'])->name('dinner.create');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
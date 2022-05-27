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

Auth::routes();

// dinnerコントローラー

Route::get('/', [App\Http\Controllers\DinnerController::class, 'index'])->name('dinner.index');
Route::post('/create', [App\Http\Controllers\DinnerController::class, 'store'])->name('dinner.store');
Route::get('/create', [App\Http\Controllers\DinnerController::class, 'create'])->name('dinner.create');

// groupコントローラー

Route::get('/list_group', [App\Http\Controllers\GroupController::class, 'index'])->name('group.index')->middleware('auth'); //middlewareを付けることによって未ログイン時は自動的にログイン画面に遷移
Route::get('/create_group', [App\Http\Controllers\GroupController::class, 'create'])->name('group.create');
Route::post('/create_group', [App\Http\Controllers\GroupController::class, 'store'])->name('group.store');

// ログイン時のみ働くコントローラー
Route::group(['middleware' => 'auth'], function()
{  
    Route::get('/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
    Route::post('/edit', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
    // dinnerコントローラー
    Route::get('/dinner.edit/{id}', [App\Http\Controllers\DinnerController::class, 'edit'])->name('dinner.edit');
    Route::post('/dinner.edit/{id}', [App\Http\Controllers\DinnerController::class, 'update'])->name('dinner.update');
    Route::get('/dinner.del/{id}', [App\Http\Controllers\DinnerController::class, 'destroy'])->name('dinner.destroy');
    // groupコントローラー
    Route::get('/group_show/{id}', [App\Http\Controllers\GroupController::class, 'show'])->name('group.show');
    Route::get('/group-edit/{id}', [App\Http\Controllers\GroupController::class, 'edit'])->name('group.edit');
    Route::post('/group-edit/{id}', [App\Http\Controllers\GroupController::class, 'update'])->name('group.update');
    Route::get('/group-del/{id}', [App\Http\Controllers\GroupController::class, 'destroy'])->name('group.destroy');

});

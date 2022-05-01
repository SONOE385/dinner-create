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

Route::get('/editmenu', function () {
    return view('edit_menu');
});

Route::get('/pick', function () {
    return view('group_pick');
});

Route::get('/show', function () {
    return view('group_show');
});



Auth::routes();

// dinnerコントローラー

Route::get('/dinner', [App\Http\Controllers\DinnerController::class, 'index'])->name('dinner.index');
Route::post('/create', [App\Http\Controllers\DinnerController::class, 'store'])->name('dinner.store');
Route::get('/create', [App\Http\Controllers\DinnerController::class, 'create'])->name('dinner.create');
Route::get('/dinner.edit', [App\Http\Controllers\DinnerController::class, 'edit'])->name('dinner.edit');
Route::post('/dinner.edit', [App\Http\Controllers\DinnerController::class, 'update'])->name('dinner.update');

// groupコントローラー

Route::get('/list_group', [App\Http\Controllers\GroupController::class, 'index'])->name('group.index')->middleware('auth'); //middlewareを付けることによって未ログイン時は自動的にログイン画面に遷移
Route::get('/create_group', [App\Http\Controllers\GroupController::class, 'create'])->name('group.create');
Route::post('/create_group', [App\Http\Controllers\GroupController::class, 'store'])->name('group.store');
Route::get('/group-edit', [App\Http\Controllers\GroupController::class, 'edit'])->name('group.edit');
Route::post('/group-edit', [App\Http\Controllers\GroupController::class, 'update'])->name('group.update');

// userコントローラー
Route::group(['middleware' => 'auth'], function()
{  
   Route::get('/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
   Route::post('/edit', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
});

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
    return view('website/welcome');
});
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/perguruan-tinggi', [App\Http\Controllers\HomeController::class, 'perguruan'])->name('perguruan-tinggi');
Route::get('/json-perguruan-tinggi', [App\Http\Controllers\HomeController::class, 'json'])->name('json-data');
Route::get('/peta', [App\Http\Controllers\HomeController::class, 'peta'])->name('peta');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/perguruan-tinggi', [App\Http\Controllers\PerguruanTinggiController::class, 'index'])->name('perguruan-tinggi');
    Route::get('/json-perguruan-tinggi', [App\Http\Controllers\PerguruanTinggiController::class, 'json'])->name('json-data');
    Route::get('/perguruan-tinggi/form', [App\Http\Controllers\PerguruanTinggiController::class, 'create'])->name('create');
    Route::post('/perguruan-tinggi-store', [App\Http\Controllers\PerguruanTinggiController::class, 'store'])->name('store');
    Route::get('/perguruan-tinggi/{id}', [App\Http\Controllers\PerguruanTinggiController::class, 'edit'])->name('edit');
    Route::post('/perguruan-tinggi-update/{id}', [App\Http\Controllers\PerguruanTinggiController::class, 'update'])->name('update');
    Route::get('/perguruan-tinggi-delete/{id}', [App\Http\Controllers\PerguruanTinggiController::class, 'delete'])->name('delete');

    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('/json-user', [App\Http\Controllers\UserController::class, 'json'])->name('json-data');
    Route::get('/user/form', [App\Http\Controllers\UserController::class, 'create'])->name('create');
    Route::post('/user-store', [App\Http\Controllers\UserController::class, 'store'])->name('store');
    Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
    Route::post('/user-update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update');
    Route::get('/user-delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('delete');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/perguruan-tinggi', [App\Http\Controllers\PerguruanTinggiController::class, 'index'])->name('perguruan-tinggi');
    Route::get('/json-perguruan-tinggi', [App\Http\Controllers\PerguruanTinggiController::class, 'json'])->name('json-data');
    Route::get('/perguruan-tinggi/form', [App\Http\Controllers\PerguruanTinggiController::class, 'create'])->name('create');
    Route::post('/perguruan-tinggi-store', [App\Http\Controllers\PerguruanTinggiController::class, 'store'])->name('store');
    Route::get('/perguruan-tinggi/{id}', [App\Http\Controllers\PerguruanTinggiController::class, 'edit'])->name('edit');
    Route::post('/perguruan-tinggi-update/{id}', [App\Http\Controllers\PerguruanTinggiController::class, 'update'])->name('update');
    Route::get('/perguruan-tinggi-delete/{id}', [App\Http\Controllers\PerguruanTinggiController::class, 'delete'])->name('delete');
});

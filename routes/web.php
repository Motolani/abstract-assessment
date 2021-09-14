<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//MULTIUSERS
//ADMIN
Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/user/{user}', [App\Http\Controllers\AdminController::class, 'activateUser'])->name('user.status.update');
    Route::post('/user/update-user-status/{user}', [App\Http\Controllers\AdminController::class, 'updateStatus'])->name('user.status.updating');
});

//RandomUsers
Route::group(['prefix' => 'user', 'middleware' => ['isActive', 'auth']], function () {
    Route::get('/active/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('users.dashboard');
});

//inactive users
Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    Route::get('/inactive/dashboard', [App\Http\Controllers\UserController::class, 'inactive'])->name('users.inactive');
});

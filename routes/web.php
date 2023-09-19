<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::prefix('admin')
    ->middleware(['auth', 'role:superadmin'])
    ->name('admin.')
    ->namespace('App\Http\Controllers\Admin')
    ->group(function () {
        Route::resource('user', 'UserController');
        Route::resource('permission', 'PermissionController');
        Route::resource('role', 'RoleController');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

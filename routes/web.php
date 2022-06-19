<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::get('admin', [DashboardController::class, 'index'])->name('admin.dashboard');

//Route::get('admin/users', [\App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');
//Route::get('admin/users/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('admin.users.edit');
//Route::patch('admin/users/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('admin.users.update');

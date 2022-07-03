<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
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

Route::redirect('/', '/login')->name('home');

Auth::routes();

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard')
        ->middleware(['patient']);

    Route::get('profile/{user}/edit', [UserController::class, 'edit'])->name('profile.edit');

    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.delete');
    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    // Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('users', [UserController::class, 'store'])->name('admin.users.store');
    Route::patch('users/{user}', [UserController::class, 'update'])->name('admin.users.update');

    Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.delete');
    Route::get('services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::get('services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::get('services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::post('services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::patch('services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');

    Route::delete('schedules/{schedule}', [ScheduleController::class, 'destroy'])->name('admin.schedules.delete');
    Route::get('schedules', [ScheduleController::class, 'index'])->name('admin.schedules.index');
    Route::get('schedules/create', [ScheduleController::class, 'create'])->name('admin.schedules.create');
    Route::get('schedules/{schedule}/edit', [ScheduleController::class, 'edit'])->name('admin.schedules.edit');
    Route::post('schedules', [ScheduleController::class, 'store'])->name('admin.schedules.store');
    Route::patch('schedules/{schedule}', [ScheduleController::class, 'update'])->name('admin.schedules.update');

    Route::delete('appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('admin.appointments.delete');
    Route::get('appointments', [AppointmentController::class, 'index'])->name('admin.appointments.index');
    Route::get('appointments/create', [AppointmentController::class, 'create'])->name('admin.appointments.create');
    Route::get('appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('admin.appointments.edit');
    Route::post('appointments', [AppointmentController::class, 'store'])->name('admin.appointments.store');
    Route::patch('appointments/{appointment}', [AppointmentController::class, 'update'])->name('admin.appointments.update');

    Route::delete('sales/{sale}', [SaleController::class, 'destroy'])->name('admin.sales.delete');
    Route::get('sales', [SaleController::class, 'index'])->name('admin.sales.index');
    Route::get('sales/create', [SaleController::class, 'create'])->name('admin.sales.create');
    Route::get('sales/{sale}/edit', [SaleController::class, 'edit'])->name('admin.sales.edit');
    Route::post('sales', [SaleController::class, 'store'])->name('admin.sales.store');
    Route::patch('sales/{sale}', [SaleController::class, 'update'])->name('admin.sales.update');
});

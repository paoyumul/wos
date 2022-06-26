<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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
    Route::get('admin', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::delete('admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.delete');
    Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::get('admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::patch('admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');

    Route::delete('admin/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.delete');
    Route::get('admin/services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::get('admin/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::get('admin/services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::post('admin/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::patch('admin/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');

    Route::delete('admin/schedules/{schedule}', [ScheduleController::class, 'destroy'])->name('admin.schedules.delete');
    Route::get('admin/schedules', [ScheduleController::class, 'index'])->name('admin.schedules.index');
    Route::get('admin/schedules/create', [ScheduleController::class, 'create'])->name('admin.schedules.create');
    Route::get('admin/schedules/{schedule}/edit', [ScheduleController::class, 'edit'])->name('admin.schedules.edit');
    Route::post('admin/schedules', [ScheduleController::class, 'store'])->name('admin.schedules.store');
    Route::patch('admin/schedules/{schedule}', [ScheduleController::class, 'update'])->name('admin.schedules.update');

    Route::delete('admin/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('admin.appointments.delete');
    Route::get('admin/appointments', [AppointmentController::class, 'index'])->name('admin.appointments.index');
    Route::get('admin/appointments/create', [AppointmentController::class, 'create'])->name('admin.appointments.create');
    Route::get('admin/appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('admin.appointments.edit');
    Route::post('admin/appointments', [AppointmentController::class, 'store'])->name('admin.appointments.store');
    Route::patch('admin/appointments/{appointment}', [AppointmentController::class, 'update'])->name('admin.appointments.update');
});

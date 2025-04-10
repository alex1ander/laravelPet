<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlanController;

Route::get('/', function () {
    return view('app');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout', function () {
    Auth::logout(); // выходим
    return redirect('/'); // редирект на главную или куда надо
})->name('logout');




Route::get('/users', [UserController::class, 'getAllUsers']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/dashboard', [DashboardController::class, 'save'])->name('dashboard.save');
Route::put('/dashboard/update/{id}', [DashboardController::class, 'update'])->name('dashboard.update');
Route::post('/dashboard/delete/{id}', [DashboardController::class, 'delete'])->name('dashboard.delete');

Route::get('/plans', [PlanController::class, 'index'])->name('plans');
Route::post('/plans/{planId}/buy', [PlanController::class, 'buyPlan'])->name('plans.buy');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// # ROUTE MENAMPILKAN HALAMAN LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

// # ROUTE MEMPROSES LOGIN
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// # ROUTE LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// # ROUTE HALAMAN ADMIN
Route::get('/admin', function () {
    return 'Halaman Admin NetSpace';
})->middleware(['auth', 'role:admin'])->name('admin.home');

// # ROUTE HALAMAN CUSTOMER
Route::get('/customer', function () {
    return 'Halaman Customer NetSpace';
})->middleware(['auth', 'role:customer'])->name('customer.home');

// # ROUTE MENAMPILKAN HALAMAN REGISTRASI
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

// # ROUTE MEMPROSES REGISTRASI
Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

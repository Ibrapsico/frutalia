<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\CustomerController;




// ======================
// === RUTAS PÚBLICAS ===
// ======================

// - Home:
Route::get('/', [HomeController::class, 'index'])->name('home');




// ==========================
// === RUTAS CON REGISTRO ===
// ==========================

// - Rutas de autenticación (usamos el middleware "guest" que ya trae por defecto Laravel):
Route::middleware('guest')->group(function () {
    
    // - Registro:
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    
    // - Login:
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    // - Contraseña olvidada:
    Route::get('/forgot-password', [ForgotPasswordController::class, 'show'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    
    // - Resetear contraseña:
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'show'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});


// - Logout (requiere autenticación. Usamos middleware "auth" de Laravel):
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');



// ========================
// === RUTAS PARA ADMIN ===
// ========================

// - Protegemos las rutas del Admin meiante middleware: 
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/users', [AdminController::class, 'users']);
    Route::get('/reports', [AdminController::class, 'reports']);
});



// =========================
// === RUTAS PARA SELLER ===
// =========================

// - Protegemos las rutas del Admin meiante middleware: 
Route::middleware(['auth', 'role:seller'])->prefix('seller')->group(function () {
    Route::get('/dashboard', [SellerController::class, 'dashboard']);
    Route::resource('/products', SellerController::class);
    Route::get('/orders', [SellerController::class, 'orders']);
});



// ==========================
// === RUTAS PARA CUTOMER ===
// ==========================

// - Protegemos las rutas del Admin meiante middleware: 
Route::middleware(['auth', 'role:customer'])->prefix('customer')->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'dashboard']);
    Route::get('/orders', [CustomerController::class, 'orders']);
    Route::get('/profile', [CustomerController::class, 'profile']);
});

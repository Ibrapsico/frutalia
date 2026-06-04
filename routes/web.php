<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;






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


// Rutas protegidas (temporales, las completarás después)
Route::middleware('auth')->group(function () {
    Route::get('/profile', function () { return "Perfil - Próximamente"; })->name('profile.show');
    Route::get('/products', function () { return "Mis Productos - Próximamente"; })->name('products.index');
});




<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;


// use App\Http\Controllers\CartController;
// use App\Http\Controllers\WishlistController;





// ======================
// === RUTAS PÚBLICAS ===
// ======================

// - Home:
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', function() {return view('pages.products');})->name('products');


// - Footer:
Route::get('/legal/condiciones', function() {return "<h1>En mantenimiento.</h1>";})->name('legal.condiciones');
Route::get('/legal/privacidad', function() {return "<h1>En mantenimiento.</h1>";})->name('legal.privacidad');
Route::get('/legal/cookies', function() {return "<h1>En mantenimiento.</h1>";})->name('legal.cookies');


// - Mantenimiento:
Route::get('/mantenimiento', function () {return view('errors.503');})->name('mantenimiento');







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








// ==================
// === RUTAS AUTH ===
// ==================

// - Rutas comunes:
// ----------------
Route::middleware(['auth'])->group(function () {
    
    // - Perfil:
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    

    // - Lista de desos:
    // Route::get('/wishlist', [WhishlistController::class, 'show'])->name('wishlist.show');
    // Route::post('/wishlist/{product}', [WhishlistController::class, 'add'])->name('wishlist.add');
    // Route::delete('/wishlist/{product}', [WhishlistController::class, 'remove'])->name('wishlist.remove');

    // - Carrito:
    // Route::get('/wishlist', [CartController::class, 'show'])->name('wishlist.show');
    // Route::post('/wishlist/{product}', [CartController::class, 'add'])->name('wishlist.add');
    // Route::delete('/wishlist/{product}', [CartController::class, 'remove'])->name('wishlist.remove');

    // - Pedidos:
    // Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    // Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});




// - Rutas Seller:
// ----------------
Route::middleware(['auth', 'role:seller|admin'])->prefix('seller')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('seller.dashboard');
    Route::resource('/products', ProductController::class);
    
    // - Pedidos:
    // Route::get('/orders', [OrderController::class, 'orders'])->name('seller.orders');
});


// - Rutas Admin:
// ----------------
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'show'])->name('admin.panel');
});

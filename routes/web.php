<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;



use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\GuestController;


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


// use App\Http\Controllers\CartController;
// use App\Http\Controllers\WishlistController;





// ======================
// === RUTAS PÚBLICAS ===
// ======================

// - Home:
Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/products', [GuestController::class, 'get_prodcuts'])->name('products');
Route::get('/products/{product}', [GuestController::class, 'show_product'])->name('products.show');



// - Footer:
Route::get('/legal/condiciones', function() {return view('errors.503');})->name('legal.condiciones');
Route::get('/legal/privacidad', function() {return view('errors.503');})->name('legal.privacidad');
Route::get('/legal/cookies', function() {return view('errors.503');})->name('legal.cookies');


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
Route::middleware(['auth', 'role:seller'])->prefix('seller')->group(function () {
    
    // - Dashboard:
    Route::get('/dashboard', [SellerController::class, 'get_dashboard'])->name('seller.dashboard');
    

    // - CRUD (manual) productos de vendedor:
    Route::get('/products', [SellerController::class, 'index'])->name('seller.products.index');
    Route::get('/products/create', [SellerController::class, 'create'])->name('seller.products.create');
    Route::post('/products', [SellerController::class, 'store'])->name('seller.products.store');
    Route::get('/products/{product}', [SellerController::class, 'show'])->name('seller.products.show');
    Route::get('/products/{product}/edit', [SellerController::class, 'edit'])->name('seller.products.edit');
    Route::put('/products/{product}', [SellerController::class, 'update'])->name('seller.products.update');
    Route::delete('/products/{product}', [SellerController::class, 'destroy'])->name('seller.products.destroy');
    

});


// - Rutas Admin:
// ----------------
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/seller-products', [AdminController::class, 'get_seller_products'])->name('admin.products.seller');
    Route::get('/admin', [AdminController::class, 'get_admin_panel'])->name('admin.panel');


    
    // - CRUD de los usuarios:
    Route::resource('admin/users', UserController::class)
        ->names([
            'index' => 'admin.users.index',
            'create' => 'admin.users.create',
            'store' => 'admin.users.store',
            'show' => 'admin.users.show',
            'edit' => 'admin.users.edit',
            'update' => 'admin.users.update',
            'destroy' => 'admin.users.destroy',
        ]);


    // - CRUD de los productos:
    Route::resource('admin/products', ProductController::class)
        ->names([
            'index' => 'admin.products.index',
            'create' => 'admin.products.create',
            'store' => 'admin.products.store',
            'show' => 'admin.products.show',
            'edit' => 'admin.products.edit',
            'update' => 'admin.products.update',
            'destroy' => 'admin.products.destroy',
        ]);
    
});

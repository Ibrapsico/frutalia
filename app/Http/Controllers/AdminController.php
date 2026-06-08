<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Zone;
use App\Models\Product;

class AdminController extends Controller
{
    /**
     * - Muestra la el panelAdmin con los totales de las tablas.
     */
    public function get_admin_panel()
    {
        // - Guardamos datos en variables;
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalZones = Zone::count();

        // - Pasamos las var. a la vista de dashboard del admin:
        return view('admin.panel', compact('totalUsers', 'totalProducts', 'totalCategories', 'totalZones'));
    }



    /**
     * - Obtiene los productos subidos como vendedor.
     * @return \Illuminate\Contracts\View\View
     */
    public function get_seller_products()
    {
        // Obtener productos del usuario actual
        $products = Product::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')  // Opcional pero recomendado
            ->simplePaginate(20)
            ->withQueryString();  // Para mantener filtros en paginación

        return view('seller.products.index', compact('products'));
    }



}

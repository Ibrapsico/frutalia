<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class GuestController extends Controller
{
    // - Controlador sencillo paar mostrar el home pasando imágenes:
    public function index()
    {
        // - Imágenes para home:
        $images = [
            'hero' => asset('images/pages/pages_index--hero.jpg'),
            'apoyo02' => asset('images/pages/pages_index02.jpg'),
            'apoyo01' => asset('images/pages/pages_index01.jpg'),
            'apoyo03' => asset('images/pages/pages_index03.jpg'),
            'apoyo04' => asset('images/pages/pages_index04.jpg'),
            'apoyo05' => asset('images/pages/pages_index05.jpg'),
            'apoyo06' => asset('images/pages/pages_index06.jpg'),
            'apoyo07' => asset('images/pages/pages_index07.jpg'),
        ];
        
        return view('pages.index', compact('images'));
    }





    /**
     * - Muestra los productos con condicional de filtrado.
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function get_prodcuts(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // - Mantenemos filtro en paginación:
        $products = $query->simplePaginate(8)->withQueryString();

        return view('pages.products', compact('products'));

    }



    /**
     * - Muestra un producto específico:
     */
    public function show_product(Product $product)
    {
        return view('seller.products.show', compact('product'));
    }



}
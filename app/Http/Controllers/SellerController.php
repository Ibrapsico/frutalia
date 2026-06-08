<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SellerController extends Controller
{
    
    // =====================
    // === OTROS MÉTODOS ===
    // =====================


    /**
     * - Obtener Dashboard de Vendedor.
     * @return \Illuminate\Contracts\View\View
     */
    public function get_dashboard()
    {
        return view('seller.dashboard');
    }

    


    // ============
    // === CRUD ===
    // ============

    /**
     * - Obtener productos del usuario actual.
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')  
            ->simplePaginate(20)
            ->withQueryString();  // Para mantener filtros en paginación

        return view('seller.products.index', compact('products'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seller.products.create');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // - Normalizamos precio (coma a punto):
        $request->merge([
            'price' => str_replace(',', '.', $request->price),
        ]);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // - Añadimos el usuario autenticado
        $validated['user_id'] = auth()->id();

        Product::create($validated);

        return redirect()->route('seller.products.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('seller.products.show', compact('product'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('seller.products.edit', compact('product'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // - Normalizamos precio (coma a punto):
        $request->merge([
            'price' => str_replace(',', '.', $request->price),
        ]);

        $product->update($request->all());
        return redirect()
            ->route('seller.products.index')
            ->with('success', 'Actualización realizada correctamente');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('seller.products.index');
    }




}

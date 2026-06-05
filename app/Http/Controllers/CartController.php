<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Muestra el contenido del carrito
     */
    public function index()
    {
        $cart = Session::get('cart', []);
        $total = $this->calculateTotal($cart);
        $cartCount = $this->countItems($cart);
        
        return view('cart.index', compact('cart', 'total', 'cartCount'));
    }

    /**
     * Añade un producto al carrito
     */
    public function add(Request $request, Product $product)
    {
        $cart = Session::get('cart', []);
        
        $quantity = $request->input('quantity', 1);
        
        if (isset($cart[$product->id])) {
            // Si ya existe, incrementamos la cantidad
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            // Si no existe, lo añadimos
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->image ?? null
            ];
        }
        
        Session::put('cart', $cart);
        Session::put('cart_count', $this->countItems($cart));
        
        return redirect()->back()->with('success', 'Producto añadido al carrito');
    }

    /**
     * Actualiza la cantidad de un producto en el carrito
     */
    public function update(Request $request, $itemId)
    {
        $cart = Session::get('cart', []);
        
        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity'] = $request->input('quantity', 1);
            
            // Si la cantidad es 0 o menor, eliminamos el producto
            if ($cart[$itemId]['quantity'] <= 0) {
                unset($cart[$itemId]);
            }
        }
        
        Session::put('cart', $cart);
        Session::put('cart_count', $this->countItems($cart));
        
        return redirect()->back()->with('success', 'Carrito actualizado');
    }

    /**
     * Elimina un producto del carrito
     */
    public function remove($itemId)
    {
        $cart = Session::get('cart', []);
        
        if (isset($cart[$itemId])) {
            unset($cart[$itemId]);
        }
        
        Session::put('cart', $cart);
        Session::put('cart_count', $this->countItems($cart));
        
        return redirect()->back()->with('success', 'Producto eliminado del carrito');
    }

    /**
     * Vacía todo el carrito
     */
    public function clear()
    {
        Session::forget('cart');
        Session::put('cart_count', 0);
        
        return redirect()->back()->with('success', 'Carrito vaciado');
    }

    /**
     * Calcula el total del carrito
     */
    private function calculateTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    /**
     * Cuenta el número total de items (sumando cantidades)
     */
    private function countItems($cart)
    {
        $count = 0;
        foreach ($cart as $item) {
            $count += $item['quantity'];
        }
        return $count;
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    /**
     * Muestra la lista de deseos
     */
    public function index()
    {
        $wishlist = Session::get('wishlist', []);
        $wishlistCount = count($wishlist);
        
        return view('wishlist.index', compact('wishlist', 'wishlistCount'));
    }

    /**
     * Añade un producto a la lista de deseos
     */
    public function add(Product $product)
    {
        $wishlist = Session::get('wishlist', []);
        
        // Verificar si ya existe
        if (!isset($wishlist[$product->id])) {
            $wishlist[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image ?? null,
                'added_at' => now()
            ];
            
            Session::put('wishlist', $wishlist);
            Session::put('wishlist_count', count($wishlist));
            
            return redirect()->back()->with('success', 'Producto añadido a tu lista de deseos');
        }
        
        return redirect()->back()->with('info', 'El producto ya está en tu lista de deseos');
    }

    /**
     * Elimina un producto de la lista de deseos
     */
    public function remove($productId)
    {
        $wishlist = Session::get('wishlist', []);
        
        if (isset($wishlist[$productId])) {
            unset($wishlist[$productId]);
        }
        
        Session::put('wishlist', $wishlist);
        Session::put('wishlist_count', count($wishlist));
        
        return redirect()->back()->with('success', 'Producto eliminado de tu lista de deseos');
    }

    /**
     * Mueve un producto de la wishlist al carrito
     */
    public function moveToCart($productId)
    {
        $wishlist = Session::get('wishlist', []);
        
        if (isset($wishlist[$productId])) {
            $product = Product::find($productId);
            
            if ($product) {
                // Añadir al carrito
                $cart = Session::get('cart', []);
                
                if (isset($cart[$productId])) {
                    $cart[$productId]['quantity'] += 1;
                } else {
                    $cart[$productId] = [
                        'id' => $product->id,
                        'name' => $product->name,
                        'price' => $product->price,
                        'quantity' => 1,
                        'image' => $product->image ?? null
                    ];
                }
                
                Session::put('cart', $cart);
                Session::put('cart_count', $this->countCartItems($cart));
                
                // Eliminar de wishlist
                unset($wishlist[$productId]);
                Session::put('wishlist', $wishlist);
                Session::put('wishlist_count', count($wishlist));
                
                return redirect()->back()->with('success', 'Producto movido al carrito');
            }
        }
        
        return redirect()->back()->with('error', 'No se pudo mover el producto');
    }

    /**
     * Vacía toda la lista de deseos
     */
    public function clear()
    {
        Session::forget('wishlist');
        Session::put('wishlist_count', 0);
        
        return redirect()->back()->with('success', 'Lista de deseos vaciada');
    }

    /**
     * Cuenta los items del carrito (auxiliar)
     */
    private function countCartItems($cart)
    {
        $count = 0;
        foreach ($cart as $item) {
            $count += $item['quantity'];
        }
        return $count;
    }
}
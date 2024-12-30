<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
    
        if (isset($cart[$productId])) {
            // Update the product quantity
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Add a new product
            $cart[$productId] = [
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'image' => $request->input('image'),
                'quantity' => $quantity,
            ];
        }
    
        session()->put('cart', $cart);  
    
        return response()->json(['message' => 'Product added to cart successfully', 'cart' => $cart]);
    }
    
    public function getCart()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function cartCount()
    {
        $cart = session()->get('cart', []);
        $totalQuantity = array_sum(array_column($cart, 'quantity'));
        return response()->json(['count' => $totalQuantity]);
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->input('product_id');

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return response()->json(['message' => 'Product removed from cart successfully']);
    }
}

<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $productId = $request->input('productId');
        $quantity = $request->input('quantity', 1);

        // Initialize cart if not present in the session
        $cart = session()->get('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Add new item to the cart
            $cart[$productId] = [
                'id' => $productId,
                'quantity' => $quantity,
            ];
        }

        // Save the cart to the session
        session()->put('cart', $cart);

        return back()->with('success', 'Product added to cart!');
    }

     // Show cart items
     public function showCart(){
         $cart = session()->get('cart', []);
         
         // Assuming you have a method to get product details by ID
         $products = collect([]); // Retrieve product details based on $cart
         
         foreach ($cart as $item) {
            $product = Product::find($item['id']);
            $product->quantity = $item['quantity'];
            $products->push($product);
         }
 
         return view('cart', compact('cart', 'products'));
     }
 
     // Remove item from cart
     public function removeFromCart(Request $request)
     {
         $productId = $request->input('productId');   
         $cart = session()->get('cart', []);
 
         if (isset($cart[$productId])) {
             unset($cart[$productId]);
         }
 
         // Update the cart in the session
         session()->put('cart', $cart);
 
         return redirect()->back()->with('success', 'Product removed from cart!');
     }

    public function remove(int $id){

        $cart = session('cart', []);

        $cart = array_filter($cart, function ($item) use ($id) {
            return $item['id'] != $id;
        });

        $cart = array_values($cart);

        session(['cart' =>$cart]);

        return redirect()->back()->with('success', 'Proizvod je uklonjen iz korpe.');
    }

     

}

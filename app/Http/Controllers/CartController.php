<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $pedidos = Cart::JOIN('products as p','p.id_product','cart.id_product')->where('cart.id_user',$id)->get();

        // Validations
        if($id == null) return redirect()->route('login')->with('login','ok');

        // Math Operations
        $subtotal = Cart::WHERE('id_user',$id)->sum('cart_price');

        $taxes = ($subtotal*19)/100;
        $total_price = $subtotal + $taxes;

        return view('FrontEnd.cart',compact('pedidos','subtotal','taxes','total_price'));
    }

    public function add($id_product)
    {
        $id = Auth::id();
        $product = Products::FindOrFail($id_product);

        if ($product->stock <= 0) return redirect()->route('home')->with('no_stock','ok');

        $product_exist = Cart::WHERE(['id_user' => $id, 'id_product' => $id_product])->exists();

        // Validations
        if($id == null) return redirect()->route('login')->with('login','ok');

        if($product_exist){
            $dates = Cart::WHERE(['id_user' => $id, 'id_product' => $id_product])->first();
            Cart::WHERE(['id_user' => $id, 'id_product' => $id_product])->update(['cart_quantity' => $dates->cart_quantity + 1, 'cart_price' => $dates->cart_price + $product->price]);
            return redirect()->route('cart.show')->with('added','ok');
        } 

        Cart::create([
            'id_product' => $id_product,
            'cart_quantity' => 1,
            'cart_price' => $product->price,
            'id_user' => $id
        ]);

        return redirect()->route('cart.show')->with('added','ok');

    }

    public function sum($id_cart)
    {
        $unitary_price = Cart::JOIN('products as p','p.id_product','cart.id_product')->WHERE('cart.id_cart',$id_cart)->first();

        $product = Cart::FindOrFail($id_cart);
        $product->cart_quantity = $product->cart_quantity + 1;
        $product->cart_price = $product->cart_price + $unitary_price->price;
        $product->save();

        return redirect()->route('cart.show')->with('plus','ok');

    }
    public function rest($id_cart)
    {
        $unitary_price = Cart::JOIN('products as p','p.id_product','cart.id_product')->WHERE('cart.id_cart',$id_cart)->first();

        $product = Cart::FindOrFail($id_cart);
        
        $product->cart_quantity = $product->cart_quantity - 1;
        $product->cart_price = $product->cart_price - $unitary_price->price;
        $product->save();
        
        if ($product->cart_quantity === 0) {
            $product->delete();
            return redirect()->route('cart.show')->with('deleted','ok');
        }

        return redirect()->route('cart.show')->with('deleted','ok');

    }
}

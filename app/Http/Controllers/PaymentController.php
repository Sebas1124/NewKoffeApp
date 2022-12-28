<?php

namespace App\Http\Controllers;

use App\Mail\PaymentEmail;
use App\Models\Cart;
use App\Models\Products;
use App\Models\User;
use MercadoPago\SDK;
use App\Models\Sales;
use MercadoPago\Item;
use MercadoPago\Payment;
use MercadoPago\Preference;
use Illuminate\Http\Request;
use App\Models\sales_details;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $pedidos = Cart::JOIN('products as p','p.id_product','cart.id_product')->where('cart.id_user',$id)->get();

        require base_path('vendor/autoload.php');

            SDK::setAccessToken(config('services.mercadopago.token')); 

            $preference = new Preference();

            // Crea un ítem en la venta
            foreach ($pedidos as $pedido) {
                $item = new Item();
                $item->id = $pedido->plu;
                $item->title = $pedido->name;
                $item->picture_url = asset("img/productos/$pedido->image");
                $item->quantity = $pedido->cart_quantity;
                $item->unit_price = $pedido->price;
                $item->description = $pedido->description;
                $item->category_id = $pedido->category;
                $item->currency_id = "COP";
                $products[] = $item;
            }

            try {
                $preference->back_urls = array(
                    "success" => route('order.pay'),
                    "failure" => route('order.reject'),
                    "pending" => "http://www.tu-sitio/pending"
                );
            } catch (\Throwable $th) {
                return redirect(route('cart.show'));
            }

            $preference->auto_return = "approved";
            $preference->items = $products;
            $preference->binary_mode = true;
            $preference->statement_descriptor = "KONECTA KOFFE COLOMBIA";
            $preference->save();

        //    -------------agregar preference payer para datos del comprador-----
            
        // ---------------------------------------------------------------------------

            // dd($preference);
            
            return view('FrontEnd.mercadopago', compact('pedidos',
            'preference'));

    }

    public function pay(Request $request)
    {
        
        $id = Auth::id();

        $pedidos = Cart::JOIN('products as p','p.id_product','=','cart.id_product')->WHERE('id_user',$id)->get();

        $suma = Cart::JOIN('products as p','p.id_product','=','cart.id_product')->WHERE('cart.id_user',$id)->sum('cart_price');

        $email = User::SELECT('email')->where('id',$id)->first();


        $productosinfo = '';

        $products = [];

        foreach ($pedidos as $pedido => $values) {
            $productosinfo .= "Nombre: ". $values[""."name".""].", ";
            $productosinfo .= "Cantidad x". $values[""."cart_quantity".""].", ";
            $productosinfo .= "Referencia:". $values[""."plu".""].", ";
            $productosinfo .= "Precio_venta_sin_iva:". $values[""."cart_price".""].", ";

            array_push(
                $products,
                (object)[
                    'id' => $values['id_product'],
                    'nombre' => $values['name'],
                    'cantidad' => $values['cart_quantity'],
                    'precio' => $values['cart_price'],
                    'stock' => $values['stock'],
                ]
            );
        }

        $payment_id =  $request->get('payment_id');
        $status =  $request->get('status');
        $order_id =  $request->get('merchant_order_id');

        // dd($status);

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=TEST-6333382921803612-082922-d84a3d2e9cbd62f5248dd272cb11d9d0-1127517445");

       $response = json_decode($response);


        if ($status == 'approved') {
            Sales::create([
                'no_ticket' => $order_id,
                'total_price' => ($suma*19/100)+$suma,
                'status' => $status,
                'id_user' => $id,
            ]);

            $id_venta = Sales::WHERE('no_ticket',$order_id)->first()->id_sale;

            foreach ($products as $product) {
                sales_details::create([
                    'id_sale' => $id_venta,
                    'products' => $product->id,
                    'quantity' => $product->cantidad,
                    'unitary_price' => $product->precio,
                ]);

                Products::WHERE('id_product',$product->id)->update([ 'stock' => $product->stock - $product->cantidad ]);
            }

            Cart::WHERE('id_user',$id)->delete();

        }

       return redirect(route('home'))->with('payed','ok');

    }

    public function reject()
    {

        return redirect()->route('home')->with('no_payed','ok');

    }
}

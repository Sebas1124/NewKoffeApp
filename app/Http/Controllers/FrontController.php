<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $snacks = Products::WHERE('category',3)->ORDERBY('id_product', 'desc')->get();
        $drinks = Products::WHERE('category',2)->ORDERBY('id_product', 'desc')->get();
        $cakes = Products::WHERE('category',1)->ORDERBY('id_product', 'desc')->get();

        $most_sales = Products::
        SELECTRAW('sum(s.quantity) AS quantity, products.name, products.id_product, products.price,products.stock, products.description, products.image')
            ->JOIN('sales_detail as s','s.products','products.id_product')
            ->GROUPBY('name', 'id_product','price','stock','description','image')
            ->ORDERBY('quantity', 'desc','limit',1)
            ->first();

        $most_stock = Products::
        SELECTRAW('sum(stock) AS quantity_stock, products.name, products.id_product, products.price,products.stock, products.description, products.image')
            ->GROUPBY('name', 'id_product','price','stock','description','image')
            ->ORDERBY('quantity_stock', 'desc')
            ->first();


        return view('FrontEnd.Index', compact('snacks','drinks','cakes','most_sales','most_stock'));
    }
}

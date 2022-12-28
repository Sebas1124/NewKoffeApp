<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\sales_details;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::all();
        return view('Backend.sales.index',compact('sales'));
    }

    public function details($id_sale)
    {
        $details = sales_details::JOIN('products as p','p.id_product','sales_detail.products')
        ->WHERE('id_sale',$id_sale)
        ->get();
        return view('Backend.sales.details', compact('details'));
    }
}

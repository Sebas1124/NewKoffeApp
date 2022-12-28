<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::ORDERBY('id_product','desc')->get();

        return view('Backend.products.index', compact('products'));
    }

    public function shop()
    {
        $categories = categories::all();
        return view('Backend.products.create', compact('categories'));
    }

    public function create(Request $request)
    {

        if ($request->hasFile('product_image')) {
            $img = $request->file('product_image');
            $url = public_path('img\products');
            copy($img->getRealPath(), $url."/".$request->plu_product.".".$img->guessExtension());
            $save = $request->plu_product.".".$img->guessExtension();

            $plu_exists = Products::where('plu',$request->plu_product)->exists();

            if ($plu_exists) return redirect()->route('products.index')->with('exists','ok');

            $request->validate([
                'name_product' => 'required|min:1',
                'plu_product' => 'required|min:1',
                'price_product' => 'required|min:1|numeric',
                'stock_product' => 'required|min:1|numeric',
                'weight_product' => 'required|min:1|',
                'description_product' => 'required|min:1',
                'product_category' => 'required|numeric',
                'product_image' => 'required',
            ]);

            Products::create([
                'image' => $save,
                'name' => $request->name_product,
                'plu' => $request->plu_product,
                'price' => $request->price_product,
                'stock' => $request->stock_product,
                'weight' => $request->weight_product,
                'description' => $request->description_product,
                'category' => $request->product_category,
            ]);

            return redirect()->route('products.index')->with('created','ok');

        }

    }


    public function edit($id_product)
    {
        $categories = categories::all();

        $product = Products::FindOrFail($id_product);

        $product_cateogorie = Products::JOIN('categories','id_category','category')->where('id_product',$id_product)->select('categories.name as name_category','id_category')->first();

        // dd($product_cateogorie);

        return view('Backend.products.edit', compact('product','categories','product_cateogorie'));
    }

    public function update($id_product,Request $request)
    {

        if ($request->hasFile('product_image')) {
            $img = $request->file('product_image');
            $url = public_path('img\products');
            copy($img->getRealPath(), $url."/".$request->plu_product.".".$img->guessExtension());
            $save = $request->plu_product.".".$img->guessExtension();
        
            $update = Products::FindOrFail($id_product);
            $update->image = $save;
            $update->name = $request->input('name_product');
            $update->plu = $request->input('plu_product');
            $update->price = $request->input('price_product');
            $update->stock = $request->input('stock_product');
            $update->weight = $request->input('weight_product');
            $update->description = $request->input('description_product');
            $update->category = $request->input('product_category');
            $update->save();

            return redirect()->route('products.edit',$id_product)->with('updated','ok');
         }else{
            $WithOutPhoto = Products::FindOrFail($id_product);
            $WithOutPhoto->name = $request->input('name_product');
            $WithOutPhoto->plu = $request->input('plu_product');
            $WithOutPhoto->price = $request->input('price_product');
            $WithOutPhoto->stock = $request->input('stock_product');
            $WithOutPhoto->weight = $request->input('weight_product');
            $WithOutPhoto->description = $request->input('description_product');
            $WithOutPhoto->category = $request->input('product_category');
            $WithOutPhoto->save();

            return redirect()->route('products.edit',$id_product)->with('updated','ok');
         }

    }

    public function delete($id_product)
    {

        $eliminar = Products::FindOrFail($id_product);
        $imagen = public_path("img\products\\").$eliminar->image;

        if (File::exists($imagen)) {
            File::delete($imagen);
        }

        $eliminar->delete();

        return redirect()->route('products.index')->with('deleted','ok');

    }
}

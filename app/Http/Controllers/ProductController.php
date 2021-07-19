<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        if ($request->file('image')){
            $imageName = time().'_'.'.'. $request->image->extension();
            $request->image->move(public_path('image'), $imageName);
        }
        $product = new Product();
        $product->name = $request->name;
        $product->cat_id = $request->cat_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->image = url('image/'.$imageName);
        $product->save();
        return redirect()->back()->with('success', 'Product Inserted');
    }

    public function getProducts()
    {
        return Product::with('category', 'brand')->paginate(8);
    }

    public function getSearchProducts(Request $request)
    {
        $getSearchProducts = Product::with('category', 'brand')->take(10)->where('name', 'LIKE','%'.$request->search.'%')->get();
        return response()->json([
            'search_products' => $getSearchProducts
        ]);
    }
}

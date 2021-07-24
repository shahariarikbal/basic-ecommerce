<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->cat_id = $request->cat_id;
        $brand->name = $request->name;
        $brand->save();
        return redirect()->back()->with('success', 'Brand inserted');
    }

    public function getBrands()
    {
        $brands = Brand::with('products', 'category')->latest()->get();
        return response()->json($brands);
    }
}

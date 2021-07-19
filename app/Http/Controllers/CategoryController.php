<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('success', 'Category Inserted');
    }

    public function getCategory()
    {
        return Category::get();
    }

    public function filtaringProduct($id)
    {
        return Product::with('category', 'brand')->where('cat_id', $id)->get();
    }

    public function getCategoryProducts(Request $request)
    {
        //dd($request->all());
        $products = Product::with('category', 'brand')->where(function($cat) use ($request){
            if($request->category_ids){
                $cat->whereIn('cat_id', $request->category_ids);
            }
        })->where(function($brand) use ($request){
            if($request->brand_ids){
                $brand->whereIn('brand_id', $request->brand_ids);
            }
        })->get();
        return $products;
    }
}

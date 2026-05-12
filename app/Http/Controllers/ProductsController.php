<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::all();
        return response()->json($products, 200);
    }
    public function store(Request $request){
        $product = Product::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'size' => $request->size]);
            return response()->json($product, 201);
    }
    public function update(Request $request, int $id){
        $product = Product::findOrFail($id);
        $product->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'size' => $request->size
            ]);
        return response()->json($product, 200);
    }
    public function destroy(int $id){
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}

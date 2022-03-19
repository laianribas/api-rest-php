<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function selectAll(){
        $product = Product::all();
        return response()->json([
            'product' => $product,
            ], 202);
    }

    public function selectOne($id){
        $product = Product::find($id);
        return response()->json([
            'product' => $product,
            ], 202);
    }

    public function insert(Request $request){
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        return response()->json([
            'product' => $product,
            ], 201);
    }

    public function update($id){
        $product = Product::find($id);
        $product->name = "desgraça enlantada";
        $product->save();
    }

    public function remove($id){
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            'product' => $product,
            ], 204);
    }
}

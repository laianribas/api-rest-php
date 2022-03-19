<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function selectAll(Request $request){
        $product = Product::all();
        if($request->Header('Accept') == 'application/json'){
            return response()->json([
                'product' => $product,
                ], 202);
        }else if($request->Header('Accept') == 'application/xml'){
            return response()->xml([
                'product' => $product,
            ], 202);
        }
    }

    public function selectOne(Request $request, $id){
        $product = Product::find($id);
        if($request->Header('Accept') == 'application/json'){
            return response()->json([
                'product' => $product,
                ], 202);
        }else if($request->Header('Accept') == 'application/xml'){
            return response()->xml([
                'product' => $product,
            ], 202);
        }
    }

    public function insert(Request $request){
        $product = Product::create($request->all());
        if($request->Header('Accept') == 'application/json'){
            return response()->json([
                'product' => $product,
                ], 201);
        }else if($request->Header('Accept') == 'application/xml'){
            return response()->xml([
                'product' => $product,
            ], 201);
        }
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        $productAlt = $request->all();
        $product->update($productAlt);
        if($request->Header('Accept') == 'application/json'){
            return response()->json([
                'product' => $product,
                ], 201);
        }else if($request->Header('Accept') == 'application/xml'){
            return response()->xml([
                'product' => $product,
            ], 201);
        }
    }

    public function remove(Request $request, $id){
        $product = Product::find($id);
        $product->delete();
        if($request->Header('Accept') == 'application/json'){
            return response()->json([
                'product' => $product,
                ], 200);
        }else if($request->Header('Accept') == 'application/xml'){
            return response()->xml([
                'product' => $product,
            ], 200);
        }
    }
}

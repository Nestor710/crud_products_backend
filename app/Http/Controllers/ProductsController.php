<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function showProducts()
    {
        $product = Products::all();
        return response()->json($product, 200);
    }

    public function getProductById( $id )
    {
        $product = Products::find($id);
        return response()->json($product, 200);
    }

    public function createProduct(Request $request)
    {
        Products::create($request->all());
        if (is_null($request)) {
            return response()->json(['message' => 'Something went wrong in the request']);
        }
        return response()->json(['message' => 'Product create successfully']);
    }

    public function deleteProduct($id)
    {
        $product = Products::find($id);
        if (is_null($product)) {
            return response()->json(['message' => 'Product not found']);
        } else {
            $product->delete();
        }
    }

    public function updateProduct(Request $request, $id)
    { 
        $product = Products::find($id);
        $product->update($request->all());  
    }

    public function showCategory($id)
    {
        $products = Category::find($id)->product;
        return response()->json($products);
    }

}

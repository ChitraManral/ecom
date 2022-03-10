<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productDetails()
    {
        $products = Product::all();

        return view('product',compact('products'));
    //    dd($product);
    }

    public function storeDetails(Request $request)
    {
       $product = Product::create([
           'product_name' => $request->product_name,
           'product_details' => $request->product_details
           
       ]);
       if ($product){
           return response()->json(['status' => 'success', 'message' => 'Product added successfully']);
        
       } else {
           return response()->json(['status' => 'error', 'message' => 'unable to add products']);
       }
    }

    public function getProductDetails(){
        $product = Product::all();
        return response()->json(['status' => 'success', 'data' => $product]);
        }

    public function deleteProductDetails(Request $request)
    {
       $product = Product::find($request->id)->delete();

       return response()->json(['status' => 'success', 'message' => 'Product Delete successfully']);
    }

    public function editProductDetails(Request $request)
    {
        // dd($request->all());
        $product = Product::find($request->id);

        return response()->json(['status' => 'success', 'message' => 'Fetch Product Details Successfully', 'data' => $product]);
    }

    public function updateProductDetails(Request $request)
    {
        // dd($request->all());
        $product = Product::find($request->productID)->update([
            'product_name' => $request->productName,
            'product_details' => $request->productDetails

        ]);

        return response()->json(['status' => 'success', 'message' => 'Products Add Successfully']);

        

        
    }
}

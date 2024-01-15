<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //

    function getAllProducts(){

        $products=Product::all();
        return response()->json($products);
    }

    function addProduct(Request $request){
        
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'user_id' => 'required'
         ]);

         $product=new Product();
         $product->title=$request->input('title');
         $product->description=$request->input('description');
         $product->price=$request->input('price');
         $product->user_id=$request->input('user_id');
         $product->save();
         return response()->json($product);
    }
    function getProductById($id){
        
        $product=Product::find($id);
        return response()->json($product);
    }

    function updateProduct(Request $request,$id){

        $product=Product::find($id);
        $product->title=$request->input('title');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->user_id=$request->input('user_id');
        $product->save();

        return response()->json($product);
    }
    public function deleteProduct($id){
        $product=Product::find($id);

        $product->delete();

        return response()->json("product deleted successfully!!");
    }

}

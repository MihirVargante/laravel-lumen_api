<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    //

    function getAllOrders(){

        $orders=Order::all();

        return response()->json($orders);
    }

    function addOrder(Request $request){

        $this->validate($request, [
            'user_id' => 'required',
            'product_id' => 'required',
            'payment_method' => 'required'
         ]);

        $orders=new Order();
        $orders->user_id=$request->input('user_id');
        $orders->product_id=$request->input('product_id');
        $orders->payment_method=$request->input('payment_method');
        $orders->save();
        
        return response()->json($orders);
    }

    function getOrderById(Request $request,$id){
        $orders=Order::find($id);
        return response()->json($orders);
    }

    function updateOrder(Request $request,$id){

        $orders=Order::find($id);
        $orders->user_id=$request->input('user_id');
        $orders->product_id=$request->input('product_id');
        $orders->payment_method=$request->input('payment_method');
        $orders->save();

        return response()->json($orders);
    }

    public function deleteOrder($id){
        $orders=Order::find($id);

        $orders->delete();

        return response()->json("order deleted successfully!!");
    }
}

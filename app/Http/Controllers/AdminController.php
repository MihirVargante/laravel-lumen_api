<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
class AdminController extends Controller
{
    //

    function getAllUsersOrders(){
        $result = User::select('users.name', 'products.title', 'orders.payment_method')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->join('products', 'products.id', '=', 'orders.product_id')
            ->get();

        return response()->json($result);
    }
    function totalPurchaseByUser($id){
        $totalPrice = Product::join('orders', 'products.id', '=', 'orders.product_id')
            ->where('orders.user_id', '=', $id)
            ->sum('products.price');

         return response()->json(['total_purchase' => $totalPrice]);
    }
}

<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller{ 
    public function index(){
        $order = Order::all();
        return response()->json($order);
    }
    public function store(Request $request){ 
        $order = Order::create([
            'user_id' => $request->user_id, 
            'nickname' => $request->nickname, 
            'total_price' => $request->total,
            'order_date' => $request->order_date,
            'status' => $request->status
        ]); 
        return response()->json($order, 201); 
    } 
    public function update(Request $request, int $id){
        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);
        return response()->json($order, 200);
    }
    public function destroy(int $id){
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json(['message' => 'Order deleted successfully'], 200);
    }
}

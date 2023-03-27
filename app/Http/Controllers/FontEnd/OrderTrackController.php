<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderTrackController extends Controller
{

    public function orderTrack(Request $request){

        $orders = Order::with('division', 'district', 'state', 'User')->where('invoice_no', $request->invoice_no)->first();

        if($orders){
            $orderItems = OrderItem::with('product')->where("order_id", $orders->id)->orderBy('id', 'DESC')->get();
            return view("user.orderTrack", compact('orders', 'orderItems'));
        }else {
            return redirect()->back()->with("fail", 'Product Not Found');
        }

    }

}

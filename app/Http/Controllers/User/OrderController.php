<?php

namespace App\Http\Controllers\User;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Carbon\Carbon;



class OrderController extends Controller
{

    public function ViewOrder($order_id){
        $orders = Order::with('division', 'district', 'state', 'User')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItems = OrderItem::with('product')->where("order_id", $order_id)->orderBy('id', 'DESC')->get();
        return view("user.orderView", compact('orders', 'orderItems'));
    }

    public function downloadInvoice($invoice_id){
        $orders = Order::with('division', 'district', 'state', 'User')->where('id', $invoice_id)->where('user_id', Auth::id())->first();
        $orderItems = OrderItem::with('product')->where("order_id", $invoice_id)->orderBy('id', 'DESC')->get();
        $pdf = PDF::loadView("user.invoice", compact('orders', 'orderItems'))->setPaper("a4")->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }

    public function returnOrder(Request $request, $order_id){

        $request->validate([
            'return_reason' => 'required',
        ]);

        Order::findOrFail($order_id)->update([
           'status' => 'Return',
           'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
        ]);
        return redirect()->route('user.dashboard')->with('success', 'Order Return successfully');
    }

    //================ admin order settings =======================

    // Pending Order
    public function pendingOrder(){
        $orders = Order::where('status', 'Pending')->orderBy('id', 'DESC')->get();
        return view('admin.order.pendingOrder', compact('orders'));
    }

    // Confirm Order
    public function confirmOrder(){
        $orders = Order::where('status', 'Confirm')->orderBy('id', 'DESC')->get();
        return view('admin.order.confirmOrder', compact('orders'));
    }

    // ProcessingOrder
    public function processingOrder(){
        $orders = Order::where('status', 'Processing')->orderBy('id', 'DESC')->get();
        return view('admin.order.processingOrder', compact('orders'));
    }

    // PickedOrder
    public function pickedOrder(){
        $orders = Order::where('status', 'Picked')->orderBy('id', 'DESC')->get();
        return view('admin.order.pickedOrder', compact('orders'));
    }

    // ShippedOrder
    public function shippedOrder(){
        $orders = Order::where('status', 'Shipped')->orderBy('id', 'DESC')->get();
        return view('admin.order.shippedOrder', compact('orders'));
    }

    // Delivered Order
    public function deliveredOrder(){
        $orders = Order::where('status', 'Delivered')->orderBy('id', 'DESC')->get();
        return view('admin.order.deliveredOrder', compact('orders'));
    }

    // Cancel Order
    public function cancelOrderView(){
        $orders = Order::where('status', 'Cancel')->orderBy('id', 'DESC')->get();
        return view('admin.order.cancelOrder', compact('orders'));
    }


    public function orderView($order_id){
        $orders = Order::with('division', 'district', 'state', 'User')->where('id', $order_id)->first();
        $orderItems = OrderItem::with('product')->where("order_id", $order_id)->orderBy('id', 'DESC')->first();

        return view('admin.order.orderView', compact('orders', 'orderItems'));
    }

    public function pendingToConfirm ($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'Confirm',
            'confirmed_date' => Carbon::now()->format('d F Y')
        ]);
        return redirect()->route("order.pending")->with("success", "Order Confirm Successfully");
    }
    public function pendingToCancel($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'Cancel',
            'cancel_date' => Carbon::now()->format('d F Y')
        ]);
        return redirect()->route("order.pending")->with("success", "Order Cancel Successfully");
    }

    public function confirmToProcessing($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'Processing',
            'processing_date' => Carbon::now()->format('d F Y')
        ]);
        return redirect()->route("order.confirm")->with("success", "Order Processing Successfully");
    }

    public function processingToPicked($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'Picked',
            'picked_date' => Carbon::now()->format('d F Y')
        ]);
        return redirect()->route("order.processing")->with("success", "Order Picked Successfully");
    }

    public function pickedToShipped($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'Shipped',
            'shipped_date' => Carbon::now()->format('d F Y')
        ]);
        return redirect()->route("order.picked")->with("success", "Order Shipped Successfully");
    }
    public function shippedToDelivered($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'Delivered',
            'delivered_date' => Carbon::now()->format('d F Y')
        ]);
        return redirect()->route("order.shipped")->with("success", "Order Delivered Successfully");
    }

    public function orderInvoiceDownload($order_id){
        $orders = Order::with('division', 'district', 'state', 'User')->where('id', $order_id)->first();
        $orderItems = OrderItem::with('product')->where("order_id", $order_id)->orderBy('id', 'DESC')->get();
        $pdf = PDF::loadView("admin.invoice", compact('orders', 'orderItems'))->setPaper("a4")->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }

}

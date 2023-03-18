<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Order;

class ReportController extends Controller
{
     public function orderReport(){
        return view("admin.report.index");
     }

     public function reportByDataTime(Request $request){
         $date = new DateTime($request->order_date);
         $formatDateTime = $date->format("d F Y");
         $orders = Order::where('order_date', $formatDateTime)->latest()->get();
         return view('admin.report.reports', compact("orders"));
     }

     public function reportByMonth(Request $request){
         $orders = Order::where('order_month', $request->order_month)->latest()->get();
         return view('admin.report.reports', compact("orders"));
     }

    public function reportByYear(Request $request){
        $orders = Order::where('order_year', $request->order_year)->latest()->get();
        return view('admin.report.reports', compact("orders"));
    }


}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\models\Shipping;
use Illuminate\Support\Facades\Auth;

class SSLHostController extends Controller
{
    public function SSLPayment(){
        if(Session::has('coupon')){
            $totalAmount = Session::get('coupon')['total_amount'];
        }else {
            $totalAmount = round(Cart::total());
        }

        $shipping = Shipping::orderBy('id', 'DESC')->first();;

        return view('layouts.fontend.payment.SSLEasyPayment', compact('totalAmount', 'shipping'));
    }
}

<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CardController extends Controller
{

    // ============= product cars view ====================

    public function productCardView($product_id){
        $product = Product::with('category')->findOrFail($product_id);

        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        return response()->json(array(
            'product' => $product,
            'size' => $product_size_en,
            'color' => $product_color_en,
        ));

    }

    public function productAddToCard(Request $request, $id){
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if($product->discount_price == NULL){
            Cart::add([
                'id' => $id,
                'name' => $request->productName,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'size' => $request->size,
                    'color' => $request->color,
                ]
            ]);
            return response()->json();
        }else {
            Cart::add([
                'id' => $id,
                'name' => $request->productName,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'size' => $request->size,
                    'color' => $request->color,
                ]
            ]);
            return response()->json();
        }
    }


    // mini card view

    public function ProductMiniCardView()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ));
    }

    public function miniCartRemove($rowId){
        $result = Cart::remove($rowId);
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        return response()->json($result);
    }






}

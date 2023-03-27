<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function productSearch(Request $request){
        $products = Product::where('product_name_en','LIKE','%'.$request->search.'%')
                              ->orWhere('product_name_bn','LIKE','%'.$request->search.'%')
                              ->orWhere('product_tags_en','LIKE','%'.$request->search.'%')
                              ->orWhere('product_tags_bn','LIKE','%'.$request->search.'%')
                              ->orWhere('product_title_en','LIKE','%'.$request->search.'%')
                              ->orWhere('product_title_bn','LIKE','%'.$request->search.'%')
                              ->orWhere('product_desc_en','LIKE','%'.$request->search.'%')
                              ->orWhere('product_desc_bn','LIKE','%'.$request->search.'%')->paginate(5);
                            return view("layouts.fontend.productSearch", compact('products'));
    }

    public function searchProductByAjax(Request $request){

        $products = Product::where('product_name_en','LIKE','%'.$request->search.'%')
                                ->orWhere('product_name_bn','LIKE','%'.$request->search.'%')
                                ->orWhere('product_tags_en','LIKE','%'.$request->search.'%')
                                ->orWhere('product_tags_bn','LIKE','%'.$request->search.'%')
                                ->orWhere('product_title_en','LIKE','%'.$request->search.'%')
                                ->orWhere('product_title_bn','LIKE','%'.$request->search.'%')
                                ->orWhere('product_desc_en','LIKE','%'.$request->search.'%')
                                ->orWhere('product_desc_bn','LIKE','%'.$request->search.'%')->take(10)->get();
        return view("layouts.fontend.productAutoSuggest", compact('products'));
    }

}

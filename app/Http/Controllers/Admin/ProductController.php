<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SubSubCategory;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\MultiImage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::latest()->get();
        return view('admin.product.all-product', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorys = Category::orderBy('id' , 'DESC')->get();
        return view('admin.product.add-new-product', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $request->validated();

        $image = $request->file('product_thumbnail');
        $img_ext = strtolower($image->getClientOriginalExtension());
        $hex_name = hexdec(uniqid());
        $img_name = $hex_name . '.' . $img_ext;
        $location = 'backend/images/product/thumbnail/';
        $last_image = $location. $img_name;
        Image::make($image)->resize(917, 1000)->save($last_image);

        $product_id = Product::insertGetId([
            "category_id" => $request->category_id,
            "subcategory_id" => $request->subcategory_id,
            "subsubcategory_id" => $request->subsubcategory_id,
            "product_name_en" => $request->product_name_en,
            "product_name_bn" => $request->product_name_bn,
            "product_slug_en" => $request->product_slug_en,
            "product_slug_bn" => $request->product_slug_bn,
            "product_tags_en" => $request->product_tags_en,
            "product_tags_bn" => $request->product_tags_bn,
            "product_title_en" => $request->product_title_en,
            "product_title_bn" => $request->product_title_bn,
            "product_desc_en" => $request->product_desc_en,
            "product_desc_bn" => $request->product_desc_bn,
            "product_size_en" => $request->product_size_en,
            "product_size_bn" => $request->product_size_bn,
            "product_color_en" => $request->product_color_en,
            "product_color_bn" => $request->product_color_bn,
            "product_code" => $request->product_code,
            "product_qty" => $request->product_qty,
            "selling_price" => $request->selling_price,
            "discount_price" => $request->discount_price,
            "product_thumbnail" => $last_image,
            "hot_deals" => $request->hot_deals,
            "featured" => $request->featured,
            "spacial_offer" => $request->spacial_offer,
            "spacial_deals" => $request->spacial_deals,
            "created_at" => Carbon::now(),

        ]);
        $multiImages = $request->file('MultiImage');
        if ($multiImages){
            foreach($multiImages as $img){
                $img_ext = strtolower($img->getClientOriginalExtension());
                $hex_name = hexdec(uniqid());
                $img_name = $hex_name . '.' . $img_ext;
                $location = 'backend/images/product/multiImage/';
                $multi_image = $location. $img_name;
                Image::make($img)->resize(917, 1000)->save($multi_image );
                MultiImage::insert([
                    'product_id' => $product_id,
                    'photo_name' => $multi_image,
                    "created_at" => Carbon::now(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $viewProducts = Product::findOrFail($id);
         return view('admin.product.product-view', compact('viewProducts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            "category_id" => "required",
            "subcategory_id" => "required",
            "subsubcategory_id" => "required",
            "product_name_en" => "required",
            "product_name_bn" => "required",
            "product_slug_en" => "required",
            "product_slug_bn" => "required",
            "product_tags_en" => "required",
            "product_tags_bn" => "required",
            "product_title_en" => "required",
            "product_title_bn" => "required",
            "product_desc_en" => "required",
            "product_desc_bn" => "required",
            "product_code" => "required",
            "product_qty" => "required",
            "selling_price" => "required",
        ],[
            "category_id.required" => "Field is required",
            "subcategory_id.required" => "Field is required",
            "subsubcategory_id.required" => "Field is required",
            "product_name_en.required" => "Field is required",
            "product_name_bn.required" => "Field is required",
            "product_slug_en.required" => "Field is required",
            "product_slug_bn.required" => "Field is required",
            "product_tags_en.required" => "Field is required",
            "product_tags_bn.required" => "Field is required",
            "product_title_en.required" => "Field is required",
            "product_title_bn.required" => "Field is required",
            "product_desc_en.required" => "Field is required",
            "product_desc_bn.required" => "Field is required",
            "product_code.required" => "Field is required",
            "product_qty.required" => "Field is required",
            "selling_price.required" => "Field is required",

        ]);


        Product::findOrFail($id)->update([
            "category_id" => $request->category_id,
            "subcategory_id" => $request->subcategory_id,
            "subsubcategory_id" => $request->subsubcategory_id,
            "product_name_en" => $request->product_name_en,
            "product_name_bn" => $request->product_name_bn,
            "product_slug_en" => $request->product_slug_en,
            "product_slug_bn" => $request->product_slug_bn,
            "product_tags_en" => $request->product_tags_en,
            "product_tags_bn" => $request->product_tags_bn,
            "product_title_en" => $request->product_title_en,
            "product_title_bn" => $request->product_title_bn,
            "product_desc_en" => $request->product_desc_en,
            "product_desc_bn" => $request->product_desc_bn,
            "product_size_en" => $request->product_size_en,
            "product_size_bn" => $request->product_size_bn,
            "product_color_en" => $request->product_color_en,
            "product_color_bn" => $request->product_color_bn,
            "product_code" => $request->product_code,
            "product_qty" => $request->product_qty,
            "selling_price" => $request->selling_price,
            "discount_price" => $request->discount_price,
            "hot_deals" => $request->hot_deals,
            "featured" => $request->featured,
            "spacial_offer" => $request->spacial_offer,
            "spacial_deals" => $request->spacial_deals,
            "created_at" => Carbon::now(),

        ]);

        return redirect()->route('products.index')->with('success', 'Product Update Successfully');

    }

    public function editFunc($id){
        $products = Product::findOrFail($id);
        $categorys = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $multiimages = MultiImage::where('product_id', $id)->latest()->get();
        return view('admin.product.edit-product', compact('products', 'categorys', 'multiimages','subcategories','subsubcategories'));
    }

    public function subCategoryIdGetByAjax($id){
        $result = SubCategory::where('category_id', $id)->orderBy('subcategory_name_en', 'ASC')->get();
        return $result;
    }
    public function SubSubCategoryIdGetByAjax($id){
        $result = SubSubCategory::where('subcategory_id', $id)->orderBy('subsubcategory_name_en', 'ASC')->get();
        return $result;
    }

    // update multiple image
    public function updateMultipleImage(Request $request){
        $imgs = $request->file('multiImage');
        if($imgs != "") {
            foreach ($imgs as $id => $img) {
                $deleteImg = MultiImage::findOrFail($id);
                if (file_exists($deleteImg->photo_name)) {
                    unlink($deleteImg->photo_name);
                }
                $img_ext = strtolower($img->getClientOriginalExtension());
                $hex_name = hexdec(uniqid());
                $img_name = $hex_name . '.' . $img_ext;
                $location = 'backend/images/product/multiImage/';
                $multi_image = $location . $img_name;
                Image::make($img)->resize(917, 1000)->save($multi_image);
                MultiImage::where('id', $id)->update([
                    'photo_name' => $multi_image,
                    "created_at" => Carbon::now(),
                ]);
            }
            return redirect()->route('products.index')->with('success', 'Product Update Successfully');
        }else {
            return redirect()->route('products.index')->with('success', 'Product Not Successfully');
        }
    }

    // update single image
    public function updateSingleImage(Request $request, $id){
        $image = $request->file('singleImage');
        if($image != ""){
            $old_img = Product::findOrFail($id);
            if(file_exists($old_img->product_thumbnail)){
                unlink($old_img->product_thumbnail);
            }
            $img_ext = strtolower($image->getClientOriginalExtension());
            $hex_name = hexdec(uniqid());
            $img_name = $hex_name . '.' . $img_ext;
            $location = 'backend/images/product/thumbnail/';
            $last_image = $location. $img_name;
            Image::make($image)->resize(917, 1000)->save($last_image);
            Product::findOrFail($id)->update([
                "product_thumbnail" => $last_image,
                "updated_at" => Carbon::now(),
            ]);
            return redirect()->route('products.index')->with('success', 'Product Thumbnail Update Successfully');
        }else {
            return redirect()->route('products.index')->with('success', 'Product Thumbnail Not Update Successfully');
        }
    }

    // multiple image delete
    public function imageDelete($id){
         MultiImage::findOrFail($id)->delete();
         return redirect()->back()->with('success', 'Product Thumbnail Delete Successfully');
    }
    // Products softDelete

    public function  ProductSoftDelete($id){
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Product Delete Successfully');
    }


    // active and inactive

    public function inactive($id){
        Product::findOrFail($id)->update(['status' => 0]);
        return redirect()->back()->with('success', 'Product Inactive');

    }
    public function active($id){
        Product::findOrFail($id)->update(['status' => 1]);
        return redirect()->back()->with('success', 'Product active');
    }

}

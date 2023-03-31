<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use App\Models\AdminBio;
use App\Models\AdminSocialLink;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\BlogcommentReply;
use App\Models\MultiImage;
use App\Models\ReviewModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\DiscountBanner;
use App\Models\DiscountBannerTwo;
use App\Models\PageBanner;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\VisitorCheck;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FontEndController extends Controller
{
    public function index()
    {

        $tabAllProducts = Product::where('status',1)->get();
        $featureds = Product::where('featured', 1)->where('status', 1)->orderBy('id', 'DESC')->get();

        $spacial_offers = Product::where('spacial_offer',1)->where('status',1)->limit(5)->orderBy('id', 'DESC')->get();
        $spacial_deals = Product::where('spacial_deals',1)->where('status',1)->limit(5)->orderBy('id', 'DESC')->get();

        $discountBanners = DiscountBanner::first();
        $discountBannerTwo = DiscountBannerTwo::first();

        $blogs = Blog::latest()->limit(2)->get();
        $socialLinks = AdminSocialLink::latest()->get();

        //visitor Check
        $ip = request()->ip();
        $visitors = VisitorCheck::where('ip_address', $ip)->exists();
        if($visitors){
            DB::table('visitor_checks')->increment('visit_count');
            $visit = VisitorCheck::where('ip_address', $ip)->first();
            $visit->updated_at = Carbon::now();
            $visit->save();
        }
        else{
            $visitor = VisitorCheck::insert([
                'ip_address' => $ip,
                'visit_count' => '1',
                'created_at' => Carbon::now(),
            ]);
        }

//        $skip_category_0 = Category::skip(0)->first();
//        $skip_category_1 = Category::skip(1)->first();

        return view('index', compact('discountBannerTwo','tabAllProducts', 'featureds', 'spacial_offers', 'spacial_deals','discountBanners','blogs', 'socialLinks'));
    }

    public function singleProduct($id, $slug){
        $product = Product::findOrFail($id);

        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        $color_bn = $product->product_color_bn;
        $product_color_bn = explode(',', $color_bn);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        $size_bn = $product->product_size_bn;
        $product_size_bn = explode(',', $size_bn);

        $cat_id = $product->category_id;

        $multiImg = MultiImage::where('product_id', $id)->get();

        $relatedProduct = Product::where("category_id", $cat_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();

        $reviewProducts = ReviewModel::with('user')->where('product_id', $id)->where('status', 'approved')->latest()->get();

        $rating = ReviewModel::where('product_id', $id)->where('status', 'approved')->avg('rating');
        $avarageRating = number_format($rating, 1);

        return view('single-page', compact('multiImg', 'product', 'product_color_en', 'product_color_bn', 'product_size_en', 'product_size_bn','relatedProduct','reviewProducts', 'avarageRating'
        ));
    }

    // tags wise product show
    public function tagWiseProductsShow(Request $request, $tag)
    {
        $pageBanner = PageBanner::first();
        $baseLink = 'product/tags';
        $categorys = Category::orderBy('id', 'DESC')->get();
        $tag_name = $tag;
        $sort = '';
        if($request->sort != ""){
            $sort = $request->sort;
        }
        if($baseLink == null ){
            return view('errors.404');
        }elseif($sort == 'lowestPrice') {
            $products = Product::where('status', 1)->where('product_tags_en', $tag)->orWhere('product_tags_bn',$tag)->orderBy('selling_price','ASC')->paginate(10);

        }elseif($sort == 'heightPrice') {
            $products = Product::where('status', 1)->where('product_tags_en', $tag)->orWhere('product_tags_bn',$tag)->orderBy('selling_price','DESC')->paginate(10);
        }elseif($sort == 'priceAToZname') {
            $products = Product::where('status', 1)->where('product_tags_en', $tag)->orWhere('product_tags_bn',$tag)->orderBy('product_name_en','ASC')->paginate(10);
        }elseif($sort == 'priceZToAname') {
            $products = Product::where('status', 1)->where('product_tags_en', $tag)->orWhere('product_tags_bn',$tag)->orderBy('product_name_en','DESC')->paginate(10);
        }else {
            $products = Product::where('status', 1)->where('product_tags_en', $tag)->orWhere('product_tags_bn',$tag)->orderBy('id','DESC')->paginate(10);
        }

        return view('layouts.fontend.products-tag-page', compact('pageBanner','products', 'categorys', 'sort','baseLink', 'tag_name'));
    }


    public function subcategoryWiseProductShow(Request $request, $id)
    {
        $pageBanner = PageBanner::first();
        $categorys = Category::orderBy('id', 'DESC')->get();
        $baseLink = 'subCategory/product';
        $product_id = $id;
        $sort = '';
        if($request->sort != ""){
            $sort = $request->sort;
        }
        if($baseLink == null || $product_id == null ){
            return view('errors.404');
        }elseif($sort == 'lowestPrice') {
            $products = Product::where(['status' => 1, 'subcategory_id' => $id])->orderBy('selling_price','ASC')->paginate(10);
        }elseif($sort == 'heightPrice') {
            $products = Product::where(['status' => 1, 'subcategory_id' => $id])->orderBy('selling_price','DESC')->paginate(10);
        }elseif($sort == 'priceAToZname') {
            $products = Product::where(['status' => 1, 'subcategory_id' => $id])->orderBy('product_name_en','ASC')->paginate(10);
        }elseif($sort == 'priceZToAname') {
            $products = Product::where(['status' => 1, 'subcategory_id' => $id])->orderBy('product_name_en','DESC')->paginate(10);
        }else {
            $products = Product::where('status', 1)->where('subcategory_id', $id)->orderBy('id','DESC')->paginate(10);
        }

        return view('layouts.fontend.subcategory-product', compact('pageBanner','products', 'categorys', 'baseLink', 'product_id', 'sort'));
    }

    // sub sub category wise product show
    public function subSubcategoryWiseProductShow(Request $request, $id)
    {
        $pageBanner = PageBanner::where('status', 'approved')->first();
        $categorys = Category::orderBy('id', 'DESC')->get();
        $baseLink = 'subSubCategory/product';
        $product_id = $id;
        $sort = '';
        if($request->sort != ""){
            $sort = $request->sort;
        }
        if($baseLink == null || $product_id == null ){
            return view('errors.404');
        }elseif($sort == 'lowestPrice') {
            $products = Product::where(['status' => 1, 'subsubcategory_id' => $id])->orderBy('selling_price','ASC')->paginate(10);
        }elseif($sort == 'heightPrice') {
            $products = Product::where(['status' => 1, 'subsubcategory_id' => $id])->orderBy('selling_price','DESC')->paginate(10);
        }elseif($sort == 'priceAToZname') {
            $products = Product::where(['status' => 1, 'subsubcategory_id' => $id])->orderBy('product_name_en','ASC')->paginate(10);
        }elseif($sort == 'priceZToAname') {
            $products = Product::where(['status' => 1, 'subsubcategory_id' => $id])->orderBy('product_name_en','DESC')->paginate(10);
        }else {
            $products = Product::where(['status' => 1, 'subsubcategory_id' => $id])->orderBy('id','DESC')->paginate(10);
        }


        return view('layouts.fontend.subcategory-product', compact('pageBanner','products', 'categorys','sort','baseLink','product_id'));
    }

    //Blog
    public function allBlog()
    {
        $blogs = Blog::latest()->paginate(5);
        return view('layouts.fontend.blog.all-blog', compact('blogs'));
    }

    public function singleBlog($id, $slug)
    {
        $blog = Blog::findOrFail($id);
        $blogcommentsall = BlogComment::where('blog_id', $blog->id)->where('status', 'approved')->get();
        $blogcomments = BlogComment::where('blog_id', $blog->id)->where('status', 'approved')->orderBy('created_at', 'desc')->take(3)->get();
        return view('layouts.fontend.blog.single-post',compact('blog', 'blogcomments','blogcommentsall'));
    }

    public function commentMore(Request $request)
    {
        $blogcomments = BlogComment::where('blog_id', $request->blog_id)->where('status', 'approved')->orderBy('created_at', 'desc')
        ->skip($request->count)->take(3)->get();

        $view = view('layouts.fontend.blog.comment-loadmore',compact('blogcomments'));

        $data = $view->render();
        $count = $request->count + 1;
        $blog_count = $blogcomments->count();

        return response()->json(['data'=>$data, 'count'=> $count,'blog_count'=>$blog_count]);
    }

}

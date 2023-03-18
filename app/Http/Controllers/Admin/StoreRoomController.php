<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
class StoreRoomController extends Controller
{
     public function StoreRoomView(){
         $brandTrashs = Brand::onlyTrashed()->get();
         $barndCount = Brand::onlyTrashed()->count();
         return view('admin.storeroom.brandstore', compact('brandTrashs', 'barndCount'));
     }
    public function brandPermanentDelete($id){
        $brandImg = Brand::onlyTrashed()->findOrFail($id);
        $img = $brandImg->brand_image;
        if (file_exists($img)){
            unlink($img);
        }
        Brand::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->back()->with('success', 'Data Delete success');
    }
    public function brandRestore($id){
        Brand::withTrashed()->findOrFail($id)->restore();
        return redirect()->back()->with('success', 'Data restore success');
    }
    // product ============================================
    public function ProductRestoreView(){
         $productCount = Product::onlyTrashed()->count();
         $productTrash = Product::onlyTrashed()->get();
         return view('admin.storeroom.product-restore', compact('productCount', 'productTrash'));
    }
    public function ProductRestore($id){
        Product::withTrashed()->findOrFail($id)->restore();
        return redirect()->back()->with('success', 'Data restore successfully');
    }
    public function ProductImagePermanentDelete($id){
        $proImg = Product::onlyTrashed()->findOrFail($id);
        if(file_exists($proImg->product_thumbnail)){
            unlink($proImg->product_thumbnail);
        }
        Product::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->back()->with('success', 'Data delete successfully');

    }
    //product ==================================================

    // multiple image settings ===============================
    public function StoreRoomController(){
        $multiImageTrashCount = MultiImage::onlyTrashed()->count();
        $multiImageTrash = MultiImage::onlyTrashed()->get();
        return view('admin.storeroom.multiple-image-store',compact('multiImageTrashCount', 'multiImageTrash'));
    }
    // multiple image permanent delete
    public function multipleImagePermanenetDelete($id){
         $multiImg = MultiImage::onlyTrashed()->findOrFail($id);
         if(file_exists($multiImg->photo_name)){
             unlink($multiImg->photo_name);
         }
         MultiImage::withTrashed()->findOrFail($id)->forceDelete();
         return redirect()->back()->with('success', 'Data delete successfully');
    }
    public function multipleImageRestore($id){
        MultiImage::withTrashed()->findOrFail($id)->restore();
        return redirect()->back()->with('success', 'Data restore successfully');
    }
    //========================================

}

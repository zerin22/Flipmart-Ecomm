<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReviewModel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function productReview($product_id){
        $id = $product_id;
        return view('layouts.fontend.productReview', compact('id'));
    }
    public function productReviewStore(Request $request){
        $request->validate([
            'comment' => 'required',
        ]);

        $checkUser = ReviewModel::where(['user_id' => Auth::id(), 'product_id' => $request->product_id])->first();
        if($checkUser)
        {
            $review = ReviewModel::findOrFail($checkUser->id);
            $review->rating = $request->rating;
            $review->comment = $request->comment;
            $review->status = 'pending';
            $review->save();
            return redirect()->back()->with("success", 'Review successfully');
        }

        ReviewModel::insert([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with("success", 'Review successfully');
    }
}

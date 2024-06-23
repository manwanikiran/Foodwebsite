<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Restaurant;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ReviewController extends Controller
{
    public function review()
    {
        $review = Review::leftjoin("tbl_restaurant", "tbl_restaurant.res_id", "=", "tbl_review.res_id")
        ->leftjoin("tbl_user", "tbl_user.user_id", "=", "tbl_review.user_id")
        ->orderBy('review_id', 'DESC')
        ->get();
        return view('admin.review.review', compact('review'));
    }

    // restaurant----------------------------------------------------------------------------------------------

    public function resreview()
    {
        $id=Session::get('restaurantid');
        $resreview = Review::leftjoin("tbl_restaurant", "tbl_restaurant.res_id", "=", "tbl_review.res_id")
            ->leftjoin("tbl_user", "tbl_user.user_id", "=", "tbl_review.user_id")
            ->where("tbl_review.res_id",$id)
            ->orderBy('review_id', 'DESC')
            ->get();
        return view('restaurant.resreview.resreview', compact('resreview'));
    }

  
    public function insertreview(Request $request)
    {    

        $userid=Session::get('userid');
        $resid=$request->restaurant;
        $order=Order::where("user_id",$userid)->where("res_id",$resid)->get();

        if (count($order) >= 1) {

        $id=$request->restaurant;
        $review = $request->review;
        $rating = $request->rating;
        $user = $request->user;

        $obj = new Review;
        $obj->review_desc = $review;
        $obj->review_datetime = now();
        $obj->res_id=$id;
        $obj->user_id=$user;
        $obj->review_star=$rating;

        $obj->save();

        return redirect('/restaurantlist');
        }
        else
        {
            return redirect('/restaurantlist')->with("error", "First you need to order from this restaurant !!!!");
        }
    }

    public function reviewisdisplay($id,$isdisplay){

        $obj=Review::where("review_id",$id)->first();
        $obj->review_is_display=$isdisplay;
        $obj->save();
        return redirect('/review');
        
    }
}

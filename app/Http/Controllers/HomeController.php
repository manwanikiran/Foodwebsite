<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use App\Models\Cart;
use App\Models\Offer;
use App\Models\Packageoreder;
use App\Models\Blog;
use App\Models\Item;
use App\Models\Review;
use App\Models\Address;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class HomeController extends Controller
{
    public function frontindex()
    {
        $restaurant = array();
        $restaurant = Restaurant::leftjoin("tbl_res_type", "tbl_res_type.res_type_id", "=", "tbl_restaurant.res_type_id")
            ->leftjoin("tbl_area", "tbl_area.area_id", "=", "tbl_restaurant.area_id")
            ->leftjoin("tbl_city", "tbl_city.city_id", "=", "tbl_restaurant.city_id")
            ->leftjoin("tbl_packageorder", "tbl_packageorder.res_id", "=", "tbl_restaurant.res_id")

            ->select("tbl_res_type.*", "tbl_area.*", "tbl_city.*", "tbl_packageorder.*", "tbl_restaurant.*", "tbl_restaurant.res_id as Resid")
            ->where("res_is_approve",'yes')->where("res_is_verify",'yes') ->where("res_is_block", 'no')
            ->where("packageorder_status",'running')

            ->orderBy('Resid', 'DESC')
            ->get();

        for ($i = 0; $i < count($restaurant); $i++) {

            $resid = $restaurant[$i]["res_id"];


            $review = Review::where("res_id", $resid)->where("review_is_display",'yes')->get();
            if ($review !== null) {

                $count = count($review);
            } else {

                $count = "No Reviews";
            }

            $restaurant[$i]["reviewcount"] = $count;
        }



        $category = Category::all();
        $offer = Offer::limit(3)->get();
        $offersecond = Offer::skip(3)->take(3)->get();
        return view('frontend.frontindex.frontindex', compact('category', 'restaurant', 'offer', 'restaurant', 'offersecond'));
    }

    public function aboutus()
    {
        return view('frontend.aboutus.aboutus');
    }


    public function blog()
    {
        $blog = Blog::leftjoin("tbl_restaurant", "tbl_restaurant.res_id", "=", "tbl_blog.res_id")
            ->leftjoin("tbl_admin", "tbl_admin.admin_id", "=", "tbl_blog.admin_id")
            ->get();
        return view('frontend.blog.blog', compact('blog'));
    }

    public function wishlist()
    {
        return view('frontend.wishlist.wishlist');
    }
    //insert order/item & frontorder page---------------------------------------------------------------------------------------------
    public function frontorder(Request $request)
    {

        $user = $request->user;
        $food = $request->food;
        $res = $request->res;
        $price = $request->price;
        $qty = $request->qty;
        // $res= $request->res;


          $address = Address::where("user_id",$user)->get();

          if(count($address)>=1){

            
            $fooddetailcart = Cart::leftjoin("tbl_food", "tbl_food.food_id", "=", "tbl_cart.food_id")
                ->leftjoin("tbl_user", "tbl_user.user_id", "=", "tbl_cart.user_id")
                ->where("tbl_cart.user_id", $user)->get();




            foreach ($fooddetailcart as $row) {

                $result = Item::where("user_id", $user)->where("item_status", 'pending')
                    ->where("item_qty",  $row->cart_qty)->where("food_id",  $row->food_id)->get();



                if (count($result) >= 1) {
                } else {
                    $obj = new Item;

                    $obj->user_id = $user;
                    $obj->food_id = $row->food_id;
                    $obj->res_id = $res;
                    $obj->item_price = $row->food_main_price;
                    $obj->item_qty = $row->cart_qty;
                    // $obj->res_id = $res;


                    $obj->save();
                }
            }



            //update cart
            $cartid = $request->cartid;
            $qty = $request->qty;

            $obj = Cart::where("cart_id", $cartid)->first();
            $obj->cart_qty = $qty;
            $obj->save();


            $id = Session::get('userid');
            $fooddetailcart = Cart::leftjoin("tbl_food", "tbl_food.food_id", "=", "tbl_cart.food_id")
                ->leftjoin("tbl_user", "tbl_user.user_id", "=", "tbl_cart.user_id")
                ->where("tbl_cart.user_id", $id)->get();

            $total = 0;
            foreach ($fooddetailcart as $row) {

                $ammount = $row->food_main_price;
                $qty = $row->cart_qty;
                $final = $ammount * $qty;

                // echo $final;

                //echo $qry;

                $total += $final;
            }

            $date =  now()->toDateString();

            //echo $date;

            $offer = Offer::whereDate('offer_end_date', '>=', $date)
                ->where("offer_min_amont", "<=", $total)
                ->where("offer_is_active", "yes")->get();


            //  $offer = Offer::where()->get();


            //echo $total;

            return view('frontend.order.order', compact('fooddetailcart', 'total', 'offer'));

          }
          else{

            return redirect('/userprofile')->with("error", "Enter your Address first ...");;
          }

      


        
    }
    public function getoffer(Request $request)
    {

        $offer = $request->offer;

        $offer = str_replace('%', '', $offer);
        // echo $offer;

        // echo $request->total;
        $total = $request->total;

        $total = str_replace('₹ ', '', $total);
        // echo $total;

        $result = $total * $offer / 100;

        // echo $result;

        $finaltotal = $total - $result;

        echo $finaltotal;



        // return response()->json($data);
    }
 

  
}

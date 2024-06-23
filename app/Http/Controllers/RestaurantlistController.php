<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Food;
use App\Models\Review;
use App\Models\Menu;
use App\Models\Cart;
use Illuminate\Http\Request;

class RestaurantlistController extends Controller
{
    public function restaurantlist(Request $request)
    {
        $restaurant = array();
        $restaurant = Restaurant::leftjoin("tbl_res_type", "tbl_res_type.res_type_id", "=", "tbl_restaurant.res_type_id")
            ->leftjoin("tbl_area", "tbl_area.area_id", "=", "tbl_restaurant.area_id")
            ->leftjoin("tbl_city", "tbl_city.city_id", "=", "tbl_restaurant.city_id")
            ->leftjoin("tbl_packageorder", "tbl_packageorder.res_id", "=", "tbl_restaurant.res_id")

            ->select("tbl_res_type.*", "tbl_area.*", "tbl_city.*", "tbl_packageorder.*", "tbl_restaurant.*", "tbl_restaurant.res_id as Resid")

            ->where("res_is_block", 'no')->where("res_is_approve", 'yes')->where("res_is_verify", 'yes')
            //->orderBy('res_id', 'DESC')
            ->where("packageorder_status",'running')
            ->get();


        // foreach($restaurant as $row){

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
        //}

        $restaurantlatest = array();
        $restaurantlatest = Restaurant::leftjoin("tbl_res_type", "tbl_res_type.res_type_id", "=", "tbl_restaurant.res_type_id")
            ->leftjoin("tbl_area", "tbl_area.area_id", "=", "tbl_restaurant.area_id")
            ->leftjoin("tbl_city", "tbl_city.city_id", "=", "tbl_restaurant.city_id")
            
            ->orderBy('res_id', 'DESC')->limit(5)
            ->get();

        for ($i = 0; $i < count($restaurantlatest); $i++) {

            $resid = $restaurantlatest[$i]["res_id"];


            $review = Review::where("res_id", $resid)->where("review_is_display",'yes')->get();
            if ($review !== null) {

                $count = count($review);
            } else {

                $count = "No Reviews";
            }

            $restaurantlatest[$i]["reviewcount"] = $count;
        }

        $restaurantcount = Restaurant::select('res_id')
        ->leftjoin("tbl_packageorder", "tbl_packageorder.res_id", "=", "tbl_restaurant.res_id")
        ->select( "tbl_packageorder.*", "tbl_restaurant.*", "tbl_restaurant.res_id as Resid")
        ->where("packageorder_status",'running')
        ->where("res_is_block", 'no')->where("res_is_approve", 'yes')->where("res_is_verify", 'yes')
        ->get();
        $countrestaurant = count($restaurantcount);

        $restaurantpopular = array();
        $restaurantpopular = Restaurant::leftjoin("tbl_res_type", "tbl_res_type.res_type_id", "=", "tbl_restaurant.res_type_id")
            ->leftjoin("tbl_area", "tbl_area.area_id", "=", "tbl_restaurant.area_id")
            ->leftjoin("tbl_city", "tbl_city.city_id", "=", "tbl_restaurant.city_id")

            ->get();

        for ($i = 0; $i < count($restaurantpopular); $i++) {

            $resid = $restaurantpopular[$i]["res_id"];


            $review = Review::where("res_id", $resid)->where("review_is_display",'yes')->get();
            if ($review !== null) {

                $count = count($review);
            } else {

                $count = "No Reviews";
            }

            $restaurantpopular[$i]["reviewcount"] = $count;
        }


        return view('frontend.restaurantlist.restaurantlist', compact('restaurant', 'restaurantlatest', 'countrestaurant', 'restaurantpopular'));
    }

    public function restaurantlistsearch(Request $request)
    {
        $restaurant = array();
        $ressearch = $request->ressearch;
        $restaurant = Restaurant::leftjoin("tbl_res_type", "tbl_res_type.res_type_id", "=", "tbl_restaurant.res_type_id")
            ->leftjoin("tbl_area", "tbl_area.area_id", "=", "tbl_restaurant.area_id")
            ->leftjoin("tbl_city", "tbl_city.city_id", "=", "tbl_restaurant.city_id")
            ->where('res_name', 'LIKE', '%' . $ressearch . '%')
            //->orderBy('res_id', 'DESC')
            ->get();


        // foreach($restaurant as $row){

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
        //}

        $restaurantlatest = array();
        $ressearch = $request->ressearch;
        $restaurantlatest = Restaurant::leftjoin("tbl_res_type", "tbl_res_type.res_type_id", "=", "tbl_restaurant.res_type_id")
            ->leftjoin("tbl_area", "tbl_area.area_id", "=", "tbl_restaurant.area_id")
            ->leftjoin("tbl_city", "tbl_city.city_id", "=", "tbl_restaurant.city_id")
            ->orderBy('res_id', 'DESC')->where('res_name', 'LIKE', '%' . $ressearch . '%')->limit(5)
            ->get();

        for ($i = 0; $i < count($restaurantlatest); $i++) {

            $resid = $restaurantlatest[$i]["res_id"];


            $review = Review::where("res_id", $resid)->where("review_is_display",'yes')->get();
            if ($review !== null) {

                $count = count($review);
            } else {

                $count = "No Reviews";
            }

            $restaurantlatest[$i]["reviewcount"] = $count;
        }

        $restaurantcount = Restaurant::select('res_id')->get();
        $countrestaurant = count($restaurantcount);

        $restaurantpopular = array();
        $ressearch = $request->ressearch;
        $restaurantpopular = Restaurant::leftjoin("tbl_res_type", "tbl_res_type.res_type_id", "=", "tbl_restaurant.res_type_id")
            ->leftjoin("tbl_area", "tbl_area.area_id", "=", "tbl_restaurant.area_id")
            ->leftjoin("tbl_city", "tbl_city.city_id", "=", "tbl_restaurant.city_id")
            ->where('res_name', 'LIKE', '%' . $ressearch . '%')
            ->get();

        for ($i = 0; $i < count($restaurantpopular); $i++) {

            $resid = $restaurantpopular[$i]["res_id"];


            $review = Review::where("res_id", $resid)->where("review_is_display",'yes')->get();

            if ($review !== null) {

                $count = count($review);
            } else {

                $count = "No Reviews";
            }

            $restaurantpopular[$i]["reviewcount"] = $count;
        }


        return view('frontend.restaurantlist.restaurantlist', compact('restaurant', 'restaurantlatest', 'countrestaurant', 'restaurantpopular'));
    }
    public function frontrestaurantdetail($id)
    {
        $restaurant = Restaurant::where("res_id", $id)
            ->leftjoin("tbl_res_type", "tbl_res_type.res_type_id", "=", "tbl_restaurant.res_type_id")
            ->leftjoin("tbl_area", "tbl_area.area_id", "=", "tbl_restaurant.area_id")
            ->leftjoin("tbl_city", "tbl_city.city_id", "=", "tbl_restaurant.city_id")

            ->first();

        $menu = Menu::where("res_id", $id)->get();

        $food = Food::where("res_id", $id)->where("food_is_active", 'yes')->where("food_is_approve", 'yes')->limit(4)
        ->get();
        $cart = Cart::leftjoin("tbl_food", "tbl_food.food_id", "=", "tbl_cart.food_id")->select("tbl_cart.cart_qty")->get();
        $foodmore = Food::where("res_id", $id)->where("food_is_active", 'yes')->where("food_is_approve", 'yes')->skip(4)->take(6)->get();

        $review = Review::leftjoin("tbl_restaurant", "tbl_restaurant.res_id", "=", "tbl_review.res_id")
            ->leftjoin("tbl_user", "tbl_user.user_id", "=", "tbl_review.user_id")
            ->where("tbl_review.res_id", $id)->where("review_is_display", "yes")->get();

        return view('frontend.restaurantlist.frontrestaurantdetail', compact('restaurant', 'cart', 'food', 'foodmore', 'review', 'menu'));
    }
    // public function getres(Request $request)


    // {

    //     $ressearch =$request->ressearch;

    //     $result = Restaurant::where('res_name', 'LIKE', '%'.$ressearch.'%')
    //         ->get();

    //          echo $result;


    // }
}

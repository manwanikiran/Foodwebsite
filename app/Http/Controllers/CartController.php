<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cart()
    {
        $cart = Cart::leftjoin("tbl_user", "tbl_user.user_id", "=", "tbl_cart.user_id")
            ->leftjoin("tbl_food", "tbl_food.food_id", "=", "tbl_cart.food_id")
            ->orderBy('cart_id', 'DESC')
            ->get();

        return view('admin.cart.cart', compact('cart'));
    }

    // restaurant-----------------------------------------------------------------------------------------------------

    public function rescart()
    {
        $id = Session::get('restaurantid');
        $rescart = Cart::leftjoin("tbl_user", "tbl_user.user_id", "=", "tbl_cart.user_id")
            ->leftjoin("tbl_food", "tbl_food.food_id", "=", "tbl_cart.food_id")
            ->leftjoin("tbl_restaurant", "tbl_restaurant.res_id", "=", "tbl_food.res_id")
            ->orderBy('tbl_cart.cart_id', 'DESC')
            ->where("tbl_restaurant.res_id", $id)
            ->get();
        return view('restaurant.rescart.rescart', compact('rescart'));
    }

    // front ----------------------------------------------------------------------------------------------------------

    public function frontcart()
    {
        $id = Session::get('userid');
        $fooddetailcart = Cart::leftjoin("tbl_food", "tbl_food.food_id", "=", "tbl_cart.food_id")
            ->leftjoin("tbl_user", "tbl_user.user_id", "=", "tbl_cart.user_id")
            ->where("tbl_cart.user_id", $id)->get();
        return view('frontend.cart.frontcart', compact('fooddetailcart'));
    }

    public function insertcart(Request $request)
    {
        // $user = Session::get('userid');


        if (session()->has('userlogin')) {

            $foodid = $request->foodid;
            $foodqty = $request->foodqty;
            $id = Session::get('userid');
            $result = Cart::where("food_id", $foodid)->where("user_id", $id)->first();

            if ($result != null) {
            

                $id = Session::get('userid');

                $foodid = $request->foodid;
                $foodqty = $request->foodqty;
                //echo $foodqty;
                $qty = $result->cart_qty;
                $total = $foodqty + $qty;


                $obj = Cart::where("cart_id",$result->cart_id)->first();
                $obj->cart_qty = $total;
                $obj->cart_added_datetime = now();

                $obj->save();
                return redirect('/frontcart')->with("error", "This item is already in your cart !!!!");
            } else {
                $user = $request->user;
                $foodqty = $request->foodqty;
                $foodid = $request->foodid;
                $obj = new Cart;
                $obj->food_id = $foodid;
                $obj->user_id = $user;
                $obj->cart_qty = $foodqty;
                $obj->cart_added_datetime = now();

                $obj->save();
               return redirect('/frontcart');
            }
        } else {
           return redirect('/userlogin');
        }
    }

    public function editcart(Request $request)
    {
        $id = $request->cartid;
        $qty = $request->qty;
        $obj  = Cart::where("cart_id", $id)->first();

        $obj->cart_qty = $qty;
        $obj->save();
        //return redirect("/frontcart");
        echo "done";
    }

    public function getcart(Request $request)
    {

        $data['qty'] = Cart::where("cart_id", $request->qty)
            ->get(["cart_qty", "cart_id"]);

        return redirect("/frontcart");
    }


    public function deletecart(Request $request)
    {
        $id = $request->deleteid;

        $result = Cart::Where("cart_id", $id)->first();

        $result->delete();

        return redirect('/frontcart');
    }
}

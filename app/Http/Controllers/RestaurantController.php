<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\City;
use App\Models\Area;
use App\Models\Users;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Cart;


use App\Models\Packageorder;

use App\Models\Restauranttype;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function restaurant()
    {
        $restaurant = Restaurant::leftjoin("tbl_area", "tbl_area.area_id", "=", "tbl_restaurant.area_id")
            ->leftjoin("tbl_city", "tbl_city.city_id", "=", "tbl_restaurant.city_id")
            ->leftjoin("tbl_res_type", "tbl_res_type.res_type_id", "=", "tbl_restaurant.res_type_id")
            ->orderBy('tbl_restaurant.res_id', 'DESC')
            ->get();

        return view('admin.restaurant.restaurant', compact('restaurant'));
    }

    public function restaurantdetail($id)
    {

        $restaurant = Restaurant::where('res_id', $id)
            ->leftjoin("tbl_area", "tbl_area.area_id", "=", "tbl_restaurant.area_id")
            ->leftjoin("tbl_city", "tbl_city.city_id", "=", "tbl_restaurant.city_id")
            ->leftjoin("tbl_res_type", "tbl_res_type.res_type_id", "=", "tbl_restaurant.res_type_id")->first();

        return view('admin.restaurant.restaurantdetail', compact('restaurant'));
    }

    public function restaurantisblock($id, $isblock)
    {

        $obj = Restaurant::where("res_id", $id)->first();
        $obj->res_is_block = $isblock;
        $obj->save();
        return redirect('/restaurant');
    }

    public function restaurantisapprove($id, $isapprove)
    {

        $obj = Restaurant::where("res_id", $id)->first();
        $obj->res_is_approve = $isapprove;
        $obj->save();
        return redirect('/restaurant');
    }

    public function restaurantisverify($id, $isverify)
    {

        $obj = Restaurant::where("res_id", $id)->first();
        $obj->res_is_verify = $isverify;
        $obj->save();
        return redirect('/restaurant');
    }

    // restaurant ---------------------------------------------------------------------------------

    public function restaurantprofile()
    {

        $id = Session::get('restaurantid');

        $restaurant = Restaurant::where('res_id', $id)
            ->leftjoin("tbl_area", "tbl_area.area_id", "=", "tbl_restaurant.area_id")
            ->leftjoin("tbl_city", "tbl_city.city_id", "=", "tbl_restaurant.city_id")
            ->leftjoin("tbl_res_type", "tbl_res_type.res_type_id", "=", "tbl_restaurant.res_type_id")

            ->first();
        $area = Area::all();
        $city = City::all();
        $restauranttype = Restauranttype::all();
        return view('restaurant.authentication.resprofile', compact('restaurant', 'area', 'city', 'restauranttype'));
    }


    public function editrestaurant(Request $request)
    {

        $id = Session::get('restaurantid');
        $restaurantname = $request->restaurantname;
        $email = $request->email;


        $phone1 = $request->phone1;
        $phone2 = $request->phone2;

        $city = $request->city;
        $area = $request->area;
        $pincode = $request->pincode;
        $landmark = $request->landmark;
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $gstnumber = $request->gstnumber;
        $video = $request->video;

        $about = $request->about;
        $pickupline = $request->pickupline;
        $restiming = $request->restiming;
        $address = $request->address;
        $restype = $request->restype;

        /////////////////////////////////////////////////////////////
        $oldimg1 = $request->oldimg1;
        if ($request->hasFile('img1')) {

            $ext = $request->img1->extension();
            $filename1 = time() . rand("1111", "9999") . "." . $ext;
            $request->img1->move(public_path("/uploads/restaurant/"), $filename1);

            unlink(public_path('/uploads/restaurant/') . $oldimg1);
        } else {
            $filename1 = $oldimg1;
        }
        /////////////////////////////////////////////////////////////
        $oldimg2 = $request->oldimg2;
        if ($request->hasFile('img2')) {


            $ext = $request->img2->extension();
            $filename2 = time() . rand("1111", "9999") . "." . $ext;
            $request->img2->move(public_path("/uploads/restaurant/"), $filename2);

            unlink(public_path('/uploads/restaurant/') . $oldimg2);
        } else {
            $filename2 = $oldimg2;
        }

        /////////////////////////////////////////////////////////////
        $oldimg3 = $request->oldimg3;
        if ($request->hasFile('img3')) {

            $ext = $request->img3->extension();
            $filename3 = time() . rand("1111", "9999") . "." . $ext;
            $request->img3->move(public_path("/uploads/restaurant/"), $filename3);

            unlink(public_path('/uploads/restaurant/') . $oldimg3);
        } else {
            $filename3 = $oldimg3;
        }

        /////////////////////////////////////////////////////////////
        $oldimg4 = $request->oldimg4;
        if ($request->hasFile('gstcerti')) {

            $ext = $request->gstcerti->extension();
            $filename4 = time() . rand("1111", "9999") . "." . $ext;
            $request->gstcerti->move(public_path("/uploads/restaurant/"), $filename4);

            unlink(public_path('/uploads/restaurant/') . $oldimg4);
        } else {
            $filename4 = $oldimg4;
        }
        /////////////////////////////////////////////////////////////
        $oldimg5 = $request->oldimg5;
        if ($request->hasFile('coverimg')) {

            $ext = $request->coverimg->extension();
            $filename5 = time() . rand("1111", "9999") . "." . $ext;
            $request->coverimg->move(public_path("/uploads/restaurant/"), $filename5);

            unlink(public_path('/uploads/restaurant/') . $oldimg5);
        } else {
            $filename5 = $oldimg5;
        }
        /////////////////////////////////////////////////////////////
        $oldimg6 = $request->oldimg6;
        if ($request->hasFile('logo')) {

            $ext = $request->logo->extension();
            $filename6 = time() . rand("1111", "9999") . "." . $ext;
            $request->logo->move(public_path("/uploads/restaurant/"), $filename6);


            unlink(public_path('/uploads/restaurant/') . $oldimg6);
        } else {
            $filename6 = $oldimg6;
        }
        //////////////////////////////////////////////////////////////


        $obj = Restaurant::where('res_id', $id)->first();

        $obj->res_name = $restaurantname;
        $obj->res_email = $email;

        $obj->res_contact1 = $phone1;
        $obj->res_contact2 = $phone2;
        $obj->city_id = $city;
        $obj->area_id = $area;
        $obj->res_pincode = $pincode;
        $obj->res_landmark = $landmark;
        $obj->res_latitude = $latitude;
        $obj->res_longitude = $longitude;
        $obj->res_gst_number = $gstnumber;
        $obj->res_web_url = $video;
        $obj->res_reg_datetime = now();
        $obj->res_about = $about;
        $obj->res_pickup_line = $pickupline;
        $obj->res_timing = $restiming;
        $obj->res_address = $address;
        $obj->res_type_id = $restype;
        $obj->res_img1 = $filename1;
        $obj->res_img2 = $filename2;
        $obj->res_img3 = $filename3;
        $obj->res_gst_certi = $filename4;
        $obj->res_coverimg = $filename5;
        $obj->res_logo = $filename6;



        $obj->save();

        return redirect('/reslogout');
    }


    public function resregistration()
    {

        $city = City::all();
        $area = Area::all();
        $restauranttype = Restauranttype::all();
        return view('restaurant.authentication.resregistration', compact('city', 'area', 'restauranttype'));
    }

    public function insertrestaurant(Request $request)
    {

        $restaurantname = $request->restaurantname;
        $email = $request->email;

        $result = Restaurant::where("res_email", $email)->get();
        if (count($result) >= 1) {
            return redirect('/resregistration')->with("error", "Email Already Exist !!!!");
        } else {
            $obj = new Restaurant;
            $obj->res_email = $email;

            $password = $request->password;


            $phone1 = $request->phone1;
            $phone2 = $request->phone2;

            $city = $request->city;
            $area = $request->area;
            $pincode = $request->pincode;
            $landmark = $request->landmark;
            $latitude = $request->latitude;
            $longitude = $request->longitude;
            $gstnumber = $request->gstnumber;
            $video = $request->video;


            $about = $request->about;
            $pickupline = $request->pickupline;
            $restiming = $request->restiming;
            $address = $request->address;
            $restype = $request->restype;

            $ext = $request->img1->extension();
            $filename1 = time() . rand("1111", "9999") . "." . $ext;
            $request->img1->move(public_path("/uploads/restaurant/"), $filename1);

            $ext = $request->img2->extension();
            $filename2 = time() . rand("1111", "9999") . "." . $ext;
            $request->img2->move(public_path("/uploads/restaurant/"), $filename2);

            $ext = $request->img3->extension();
            $filename3 = time() . rand("1111", "9999") . "." . $ext;
            $request->img3->move(public_path("/uploads/restaurant/"), $filename3);

            $ext = $request->gstcerti->extension();
            $filename4 = time() . rand("1111", "9999") . "." . $ext;
            $request->gstcerti->move(public_path("/uploads/restaurant/"), $filename4);

            $ext = $request->coverimg->extension();
            $filename5 = time() . rand("1111", "9999") . "." . $ext;
            $request->coverimg->move(public_path("/uploads/restaurant/"), $filename5);


            $ext = $request->logo->extension();
            $filename6 = time() . rand("1111", "9999") . "." . $ext;
            $request->logo->move(public_path("/uploads/restaurant/"), $filename6);

            $obj = new Restaurant;

            $obj->res_name = $restaurantname;
            $obj->res_email = $email;
            $obj->res_password = $password;
            $obj->res_contact1 = $phone1;
            $obj->res_contact2 = $phone2;

            $obj->city_id = $city;
            $obj->area_id = $area;
            $obj->res_pincode = $pincode;
            $obj->res_landmark = $landmark;
            $obj->res_latitude = $latitude;
            $obj->res_longitude = $longitude;
            $obj->res_gst_number = $gstnumber;
            $obj->res_web_url = $video;

            $obj->res_reg_datetime = now();

            $obj->res_about = $about;
            $obj->res_pickup_line = $pickupline;
            $obj->res_timing = $restiming;
            $obj->res_address = $address;
            $obj->res_type_id = $restype;
            $obj->res_img1 = $filename1;
            $obj->res_img2 = $filename2;
            $obj->res_img3 = $filename3;
            $obj->res_gst_certi = $filename4;
            $obj->res_coverimg = $filename5;
            $obj->res_logo = $filename6;



            $obj->save();
            return redirect('/resdashboard');
        }
    }

    public function getarea(Request $request)
    {

        $data['area'] = Area::where("city_id", $request->city)
            ->get(["area_name", "area_id"]);

        return response()->json($data);
    }

    //dashboard-----------------------------------------------------------------------------------------------------
    public function resdashboard()
    {
        $id = Session::get('restaurantid');
        $package = Packageorder::leftjoin("tbl_restaurant","tbl_restaurant.res_id","=","tbl_packageorder.res_id")
        ->leftjoin("tbl_package","tbl_package.package_id","=","tbl_packageorder.package_id")
        ->where("tbl_packageorder.res_id", $id)->where("tbl_packageorder.packageorder_status", 'running')->get();

        $user = Users::select('user_id')->get();
        $countuser = count($user);

        $offer = Offer::select('offer_id')->get();
        $countoffer = count($offer);

        $order = Order::select('order_id')->get();
        $countorder = count($order);

        $cart = Cart::select('cart_id')->get();
        $countcart = count($cart);

        $id = Session::get('restaurantid');
        $resorder = Order::leftjoin("tbl_user", "tbl_user.user_id", "=", "tbl_order.user_id")
            ->leftjoin("tbl_user_address", "tbl_user_address.user_address_id", "=", "tbl_order.user_address_id")
            ->leftjoin("tbl_del_boy", "tbl_del_boy.del_boy_id", "=", "tbl_order.del_boy_id")
            ->leftjoin("tbl_offer", "tbl_offer.offer_id", "=", "tbl_order.offer_id")
            ->orderBy('order_id', 'DESC')
            ->where("tbl_order.res_id",$id)
            ->get();

        $offer = Offer::all();

        return view('restaurant.reslayout.resdashboard', compact('countuser', 'countoffer', 'countorder', 'countcart', 'offer', 'resorder','package'));
    }
}

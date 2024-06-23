<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Restaurant;
use App\Models\Users;
use App\Models\Offer;
use App\Models\Order;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminprofile()
    {
        $id = Session::get('adminid');
        $admin = Admin::where('admin_id', $id)->first();
        return view('admin.login.profile', compact('admin'));
    }
    public function editadmin(Request $request)
    {
        $id = Session::get('adminid');
        $adminname = $request->adminname;
        $contactnumber = $request->contactnumber;
        $email = $request->email;

        $oldimg = $request->oldimg;
        if ($request->hasFile('adminimg')) {

            $ext = $request->adminimg->extension();
            $filename = time() . rand("1111", "9999") . "." . $ext;
            $request->adminimg->move(public_path("/uploads/admin/"), $filename);

            unlink(public_path('/uploads/admin/') . $oldimg);
        } else {
            $filename = $oldimg;
        }

        $obj = Admin::where('admin_id', $id)->first();

        $obj->admin_name = $adminname;
        $obj->admin_contact = $contactnumber;

        $obj->admin_username = $email;
        $obj->admin_photo = $filename;
        $obj->save();

        return redirect('/adminlogout');
    }

    // dashboard-------------------------------------------------------------------------------------------------------------
    public function dashboard()
    {
        $restaurant = Restaurant::select('res_id')->get();
        $countrestaurant = count($restaurant);

        $user = Users::select('user_id')->get();
        $countuser = count($user);

        $offer = Offer::select('offer_id')->get();
        $countoffer = count($offer);

        $order = Order::select('order_id')->get();
        $countorder = count($order);


        $restaurant = Restaurant::leftjoin("tbl_area", "tbl_area.area_id", "=", "tbl_restaurant.area_id")
            ->leftjoin("tbl_city", "tbl_city.city_id", "=", "tbl_restaurant.city_id")
            ->leftjoin("tbl_res_type", "tbl_res_type.res_type_id", "=", "tbl_restaurant.res_type_id")
            ->limit(10)->orderBy('res_id', 'DESC')
            ->get();



        $user = Users::all();
        $order = Order::leftjoin("tbl_user", "tbl_user.user_id", "=", "tbl_order.user_id")
            ->leftjoin("tbl_user_address", "tbl_user_address.user_address_id", "=", "tbl_order.user_address_id")
            ->leftjoin("tbl_del_boy", "tbl_del_boy.del_boy_id", "=", "tbl_order.del_boy_id")
            ->leftjoin("tbl_log", "tbl_log.order_id", "=", "tbl_order.order_id")
            ->leftjoin("tbl_offer", "tbl_offer.offer_id", "=", "tbl_order.offer_id")
            ->leftjoin("tbl_city", "tbl_city.city_id", "=", "tbl_user_address.city_id")
            ->leftjoin("tbl_area", "tbl_area.area_id", "=", "tbl_user_address.area_id")
            ->select("tbl_user.*", "tbl_user_address.*", "tbl_del_boy.*", "tbl_offer.*", "tbl_city.*", "tbl_area.*", "tbl_log.*", "tbl_order.*", "tbl_order.order_id as Orderid")
            ->get();


        return view('admin.login.dashboard', compact('countrestaurant', 'countuser', 'countoffer', 'countorder','order', 'restaurant', 'user'));
    }

    public function resisblock($id, $isblock)
    {

        $obj = Restaurant::where("res_id", $id)->first();
        $obj->res_is_block = $isblock;
        $obj->save();
        return redirect('/dashboard');
    }

    public function resisapprove($id, $isapprove)
    {

        $obj = Restaurant::where("res_id", $id)->first();
        $obj->res_is_approve = $isapprove;
        $obj->save();
        return redirect('/dashboard');
    }

    public function resisverify($id, $isverify)
    {

        $obj = Restaurant::where("res_id", $id)->first();
        $obj->res_is_verify = $isverify;
        $obj->save();
        return redirect('/dashboard');
    }
}

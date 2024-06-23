<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Address;
use App\Models\City;
use App\Models\Area;
use App\Models\Deliveryboy;
use App\Models\Cart;
use App\Models\Users;
use App\Models\Log;
use App\Models\Item;
use implode;

use DB;


use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class OrderController extends Controller
{
    public function order()
    {

        $order = Order::leftjoin("tbl_user", "tbl_user.user_id", "=", "tbl_order.user_id")
            ->leftjoin("tbl_user_address", "tbl_user_address.user_address_id", "=", "tbl_order.user_address_id")
            ->leftjoin("tbl_del_boy", "tbl_del_boy.del_boy_id", "=", "tbl_order.del_boy_id")
            ->leftjoin("tbl_log", "tbl_log.order_id", "=", "tbl_order.order_id")
            ->leftjoin("tbl_offer", "tbl_offer.offer_id", "=", "tbl_order.offer_id")
            ->leftjoin("tbl_city", "tbl_city.city_id", "=", "tbl_user_address.city_id")
            ->leftjoin("tbl_area", "tbl_area.area_id", "=", "tbl_user_address.area_id")
            ->select("tbl_user.*", "tbl_user_address.*", "tbl_del_boy.*", "tbl_offer.*", "tbl_city.*", "tbl_area.*", "tbl_log.*", "tbl_order.*", "tbl_order.order_id as Orderid")
            ->get();
        // $log=Log::leftjoin("tbl_order","tbl_order.order_id","=","tbl_log.order_id")->get();
        return view('admin.order.order', compact('order'));
    }

    public function orderdetail($id)
    {

        $order = Order::where('order_id', $id)
            ->leftjoin("tbl_user", "tbl_user.user_id", "=", "tbl_order.user_id")
            ->leftjoin("tbl_user_address", "tbl_user_address.user_address_id", "=", "tbl_order.user_address_id")
            ->leftjoin("tbl_del_boy", "tbl_del_boy.del_boy_id", "=", "tbl_order.del_boy_id")
            ->leftjoin("tbl_offer", "tbl_offer.offer_id", "=", "tbl_order.offer_id")->first();
        //  ->leftjoin("tbl_log","tbl_log.order_id","=","tbl_order.order_id")
        return view('admin.order.orderdetail', compact('order'));
    }

    public function allocateorder($id)
    {
        $order = Order::where('order_id', $id)
            ->leftjoin("tbl_user", "tbl_user.user_id", "=", "tbl_order.user_id")
            ->leftjoin("tbl_user_address", "tbl_user_address.user_address_id", "=", "tbl_order.user_address_id")
            ->leftjoin("tbl_city", "tbl_city.city_id", "=", "tbl_user_address.city_id")
            ->leftjoin("tbl_del_boy", "tbl_del_boy.del_boy_id", "=", "tbl_order.del_boy_id")
            ->leftjoin("tbl_offer", "tbl_offer.offer_id", "=", "tbl_order.offer_id")
            // ->leftjoin("tbl_log","tbl_log.order_id","=","tbl_order.order_id")
            ->first();

        $city = City::all();

        return view("admin.order.allocateorder", compact('city', 'order'));
    }

    public function getareaorder(Request $request)
    {

        $data['area'] = Area::where("city_id", $request->city)
            ->get(["area_name", "area_id"]);

        return response()->json($data);
    }

    public function getdelboy(Request $request)
    {

        $data['delboy'] = Deliveryboy::where("area_id", $request->area)
            ->get(["del_boy_name", "del_boy_id"]);

        return response()->json($data);
    }



    // restaurant-------------------------------------------------------------------------
    public function resorder()
    {
        $id = Session::get('restaurantid');
        $resorder = Order::leftjoin("tbl_user", "tbl_user.user_id", "=", "tbl_order.user_id")
            ->leftjoin("tbl_user_address", "tbl_user_address.user_address_id", "=", "tbl_order.user_address_id")
            ->leftjoin("tbl_del_boy", "tbl_del_boy.del_boy_id", "=", "tbl_order.del_boy_id")
            ->leftjoin("tbl_offer", "tbl_offer.offer_id", "=", "tbl_order.offer_id")

            // ->orderBy('order_id', 'DESC')
            ->where("tbl_order.res_id", $id)
            ->get();
        return view('restaurant.resorder.resorder', compact('resorder'));
    }

    public function resorderdetail($id)
    {

        $order = Order::where('order_id', $id)
            ->leftjoin("tbl_user", "tbl_user.user_id", "=", "tbl_order.user_id")
            ->leftjoin("tbl_user_address", "tbl_user_address.user_address_id", "=", "tbl_order.user_address_id")
            ->leftjoin("tbl_del_boy", "tbl_del_boy.del_boy_id", "=", "tbl_order.del_boy_id")
            ->leftjoin("tbl_offer", "tbl_offer.offer_id", "=", "tbl_order.offer_id")->first();

        return view('restaurant.resorder.resorderdetail', compact('order'));
    }
    //frontend

    public function insertorder(Request $request)
    {
        $user = $request->user;
        // $useradd = $request->add;
        $payid = $request->payid;
        $id = Session::get('userid');
        $useraddress = Address::where('user_id', $id)->first();
        $addid = $useraddress->user_address_id;
        $res = $request->res;
        //  echo $addid;
        $total = $request->total;
        $id = Session::get('userid');
        $result = Item::Where("user_id", $id)->where("item_status", 'pending')->get();

        $foodid = array();

        for ($i = 0; $i < count($result); $i++) {


            $id = $result[$i]["item_id"];

            array_push($foodid, $id);
            $foodid[$i] = $id;
        }

        $test = implode(",", $foodid);
        // echo $test;

        // print_r ($foodid);
        //  $object = (object)$foodid;


        //  $output = $object->implode('foodis', ', ');

        //  echo $output;

        // print_r($foodid);
        // foreach($result as $row){

        //     $id = $row->food_id;

        //     array_push($foodid,$id);
        // }


        $obj = new Order;
        $obj->user_address_id = $addid;
        $obj->user_id = $user;
        $obj->order_status = "success";
        $obj->order_is_pay = "yes";
        $obj->order_pay_mode = "online";
        $obj->order_transcation_no = $payid;
        $obj->res_id = $res;
        $obj->order_datetime = now();
        $obj->order_total_payment = $total;
        $obj->order_item = $test;
        $obj->save();


        $id = Session::get('userid');
        $result = Cart::Where("user_id", $id)->first();
        $result = DB::Select("delete from tbl_cart where user_id = '$id' ");

        $id = Session::get('userid');
        $result = Item::Where("user_id", $id)->first();
        $result = DB::Select("update tbl_item set item_status ='done' where user_id = '$id' ");

        $id = Session::get('userid');
        $useremail = Users::select('user_email')->where('user_id', $id)->first();

        $test = $useremail["user_email"];




        $result = Order::Where("user_id", $id)->get();
        if (count($result) >= 1) {

            foreach ($result as $row) {

                //order item

                for ($i = 0; $i < count($result); $i++) {

                    $test1 = $result[$i]["order_item"];
                    $foodname1 = array();


                    foreach (explode(',', $test1) as $info) {

                        $food = Item::leftjoin("tbl_food", "tbl_food.food_id", "=", "tbl_item.food_id")
                            ->where("tbl_item.item_id", $info)
                            ->select("tbl_food.food_title", "tbl_item.item_id")
                            ->first();



                        //$foodname1[$i] = $food->food_title;
                        array_push($foodname1, $food->food_title);
                    }

                    $test1 = implode(",", $foodname1);

                    $result[$i]["foodname"] =  $test1;
                    // echo $test;
                    //echo "<br>";
                }
                $item = $row->foodname;
                $userid = $row->user_id;
                $total = $row->order_total_payment;
                $payid = $row->order_transcation_no;
                $paymentstauts = $row->order_status;
                $paymode = $row->order_pay_mode;



                $details = [

                    "userid" =>  $userid,
                    "total" => $total,
                    "pay" => $payid,
                    "status" => $paymentstauts,
                    "name" => $test,
                    "paymode" => $paymode,
                    "item" => $item,


                ];
            }
        }
        \Mail::to($test)->send(new \App\Mail\ReciptMail($details));
        //    return redirect('/contactus');


        return redirect('/myorder');
    }
}

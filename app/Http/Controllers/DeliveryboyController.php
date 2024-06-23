<?php

namespace App\Http\Controllers;

use App\Models\Deliveryboy;
use App\Models\Area;
use App\Models\City;
use App\Models\Log;
use App\Models\Item;
use App\Models\Order;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DeliveryboyController extends Controller
{
    // admin ------------------------------------------------------------------------------
    public function deliveryboy()
    {
        $deliveryboy = Deliveryboy::all();
        return view('admin.deliveryboy.deliveryboy', compact('deliveryboy'));
    }

    public function boyisactive($id, $isactive)
    {

        $obj = Deliveryboy::where("del_boy_id", $id)->first();
        $obj->del_boy_isactive = $isactive;
        $obj->save();
        return redirect('/deliveryboy');
    }

    public function boyisblock($id, $isblock)
    {

        $obj = Deliveryboy::where("del_boy_id", $id)->first();
        $obj->del_boy_isblock = $isblock;
        $obj->save();
        return redirect('/deliveryboy');
    }
    // deliveryboy ----------------------------------------------------------------------------
    public function deliverydashboard()
    {
        $id = Session::get('deliveryboyid');
        $order = Order::select('order_id')->where('del_boy_id', $id)->get();
        $countorder = count($order);

        $orderpending = Log::select('order_id')->where('log_status', 'pending')->where('del_boy_id', $id)->get();
        $countpending = count($orderpending);

        $orderdone = Log::select('order_id')->where('log_status', 'done')->where('del_boy_id', $id)->get();
        $countdone = count($orderdone);

        $id = Session::get('deliveryboyid');
        $delorder = Order::leftjoin("tbl_log", "tbl_log.order_id", "=", "tbl_order.order_id")
            ->leftjoin("tbl_del_boy", "tbl_del_boy.del_boy_id", "=", "tbl_order.del_boy_id")
            ->leftjoin("tbl_user", "tbl_user.user_id", "=", "tbl_order.user_id")
            ->leftjoin("tbl_user_address", "tbl_user_address.user_id", "=", "tbl_order.user_id")

            
            // ->orderBy('order_id', 'DESC')
            ->where("tbl_log.del_boy_id", $id)
            ->where('log_status','pending')
            ->get();

        for ($i = 0; $i < count($delorder); $i++) {

            $test = $delorder[$i]["order_item"];
            $foodname1 = array();


            foreach (explode(',', $test) as $info) {

                $food = Item::leftjoin("tbl_food", "tbl_food.food_id", "=", "tbl_item.food_id")
                    ->where("tbl_item.item_id", $info)
                    ->select("tbl_food.food_title", "tbl_item.item_id")
                    ->first();



                //$foodname1[$i] = $food->food_title;
                array_push($foodname1, $food->food_title);
            }

            $test = implode(",", $foodname1);

            $delorder[$i]["foodname"] =  $test;
            // echo $test;
            //echo "<br>";
        }
        return view('deliveryboy.dashboard.dashboard', compact('countorder', 'countpending', 'countdone','delorder'));
    }

    public function deliveryregister()
    {
        $area = Area::all();
        $city = City::all();
        return view('deliveryboy.authentication.deliveryboyregister', compact('area', 'city'));
    }

    public function getareadeliveryboy(Request $request)
    {

        $data['area'] = Area::where("city_id", $request->city)
            ->get(["area_name", "area_id"]);

        return response()->json($data);
    }

    public function insertdboy(Request $request)
    {
        $deliveryboyname = $request->deliveryboyname;
        $email = $request->email;


        $result = Deliveryboy::where("del_boy_email", $email)->get();
        if (count($result) >= 1) {
            return redirect('/deliveryregister')->with("error", "Email Already Exist !!!!");
        } else {
            $password = $request->password;
            $phone = $request->phone;
            $area = $request->area;
            $city = $request->city;

            // $img = $request->img;
            $ext = $request->img->extension();
            $filename = time() . rand("1111", "9999") . "." . $ext;
            $request->img->move(public_path("/uploads/deliveryboy/"), $filename);

            // $adharcardimg = $request->adharcardimg;
            $ext = $request->adharcardimg->extension();
            $filename1 = time() . rand("1111", "9999") . "." . $ext;
            $request->adharcardimg->move(public_path("/uploads/deliveryboy/"), $filename1);

            $ext = $request->adharcardimgback->extension();
            $filename2 = time() . rand("1111", "9999") . "." . $ext;
            $request->adharcardimgback->move(public_path("/uploads/deliveryboy/"), $filename2);

            $adharcardno = $request->adharcardno;

            $obj = new Deliveryboy;
            $obj->del_boy_name = $deliveryboyname;
            $obj->del_boy_email = $email;
            $obj->del_boy_password = $password;
            $obj->del_boy_contact = $phone;
            $obj->del_boy_photo = $filename;
            $obj->del_boy_aadharcard = $filename1;
            $obj->del_boy_adhar_back = $filename2;
            $obj->del_boy_aadharcard_no = $adharcardno;
            $obj->area_id = $area;
            $obj->city_id = $city;
            $obj->del_boy_reg_datetime = now();

            $obj->save();
            return redirect('/deliverylogin')->with("message", " Inserted successfully...");
        }
    }
    public function deliverylogin()
    {
        return view('deliveryboy.authentication.deliveryboylogin');
    }
    public function checkdeliverylogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $result = Deliveryboy::where("del_boy_email", $email)->where("del_boy_password", $password)->where("del_boy_isblock", 'no')->get();

        if (count($result) >= 1) {

            Session::put('deliveryboylogin', 'yes');
            foreach ($result as $row) {

                Session::put('deliveryboyid', $row->del_boy_id);
                Session::put('deliveryboyname', $row->del_boy_name);
                Session::put('deliveryboyimg', $row->del_boy_photo);
            }
            return redirect('/deliverydashboard');
        } else {
            return redirect('/deliverylogin')->with("error", "Delivery boy Not Found !!!");
        }
    }
    public function deliveryboylogout()
    {
        Session::forget('deliveryboylogin');
        return redirect('/deliverylogin');
    }
    //profile=----------------------------------------------------------------------------------------
    public function deliveryboyprofile()
    {
        $id = Session::get('deliveryboyid');
        $area = Area::all();
        $city = City::all();
        $deliveryboy = Deliveryboy::leftjoin("tbl_area", "tbl_area.area_id", "=", "tbl_del_boy.area_id")
            ->leftjoin("tbl_city", "tbl_city.city_id", "=", "tbl_del_boy.city_id")
            ->where('del_boy_id', $id)->first();
        return view('deliveryboy.profile.profile', compact('deliveryboy', 'city', 'area'));
    }

    public function getareadeliveryboyprofile(Request $request)
    {

        $data['area'] = Area::where("city_id", $request->city)
            ->get(["area_name", "area_id"]);

        return response()->json($data);
    }

    public function editdeliveryboy(Request $request)
    {
        $id = Session::get('deliveryboyid');
        $name = $request->name;
        $contactnumber = $request->contactnumber;
        $email = $request->email;
        $adharcardno = $request->adharcardno;
        $city = $request->city;
        $area = $request->area;

        $oldimg = $request->oldimg;

        if ($request->hasFile('img')) {

            $ext = $request->img->extension();
            $filename = time() . rand("1111", "9999") . "." . $ext;
            $request->img->move(public_path("/uploads/deliveryboy/"), $filename);

            unlink(public_path('/uploads/deliveryboy/') . $oldimg);
        } else {
            $filename = $oldimg;
        }
        //---------------------------------------------------------------------------------------------------------------
        $oldimg1 = $request->oldimg1;

        if ($request->hasFile('img1')) {

            $ext = $request->img1->extension();
            $filename1 = time() . rand("1111", "9999") . "." . $ext;
            $request->img1->move(public_path("/uploads/deliveryboy/"), $filename1);

            unlink(public_path('/uploads/deliveryboy/') . $oldimg1);
        } else {

            $filename1 = $oldimg1;
        }
        //--------------------------------------------------------------------------------------------------
        $oldimg2 = $request->oldimg2;

        if ($request->hasFile('img2')) {

            $ext = $request->img2->extension();
            $filename2 = time() . rand("1111", "9999") . "." . $ext;
            $request->img2->move(public_path("/uploads/deliveryboy/"), $filename2);

            unlink(public_path('/uploads/deliveryboy/') . $oldimg2);
        } else {

            $filename2 = $oldimg2;
        }

        $obj = Deliveryboy::where('del_boy_id', $id)->first();

        $obj->del_boy_name = $name;
        $obj->del_boy_contact = $contactnumber;
        $obj->del_boy_aadharcard_no = $adharcardno;
        $obj->del_boy_email = $email;
        $obj->del_boy_photo = $filename;
        $obj->del_boy_adhar_back = $filename2;

        $obj->del_boy_aadharcard = $filename1;

        $obj->city_id = $city;
        $obj->area_id = $area;

        $obj->save();
        return redirect('/deliveryboylogout');
    }
    //changepassword

    public function delchangepassword()
    {

        return view('deliveryboy.authentication.deliverychangepass');
    }
    public function delboychangepassword(Request $request)
    {
        $id = Session::get('deliveryboyid');
        $oldpassword = $request->oldpassword;
        $newpassword = $request->newpassword;

        $result = Deliveryboy::where("del_boy_password", $oldpassword)->where("del_boy_id", $id)->get();
        if (count($result) >= 1) {

            //echo "Correct password";
            $obj = Deliveryboy::where("del_boy_id", $id)->first();
            $obj->del_boy_password = $newpassword;
            $obj->save();

            return redirect('/deliveryboylogout');
        } else {
            return redirect('/delchangepassword')->with("error", "Old Password is not correct !!!");;
        }
    }
    //forgetpass----------------------------------------------------------------------------------------------
    public function delboyforgetpassword()
    {
        return view('deliveryboy.authentication.delforgetpassword');
    }

    public function delboycheckforgetpass(Request $request)
    {

        $email = $request->email;

        $result = Deliveryboy::where("del_boy_email", $email)->get();
        if (count($result) >= 1) {

            foreach ($result as $row) {

                $password = $row->del_boy_password;
                $name = $row->del_boy_name;
                $emaild = $row->del_boy_email;

                $details = [


                    "password" =>  $password,
                    "name" => $name,
                    "emailid" => $emaild,
                ];
            }
            \Mail::to($email)->send(new \App\Mail\DeliveryboyforgetpassMail($details));
            return redirect('/delboyforgetpassword')->with("message", "Password Sent Succefully");
        } else {

            return redirect('/delboyforgetpassword')->with("error", "Email is not correct !!!");
        }
    }
    //del panel order---------------------------------------------------------------------------------------------------------------
    public function delboyorder()
    {
        $id = Session::get('deliveryboyid');
        $delorder = Order::leftjoin("tbl_log", "tbl_log.order_id", "=", "tbl_order.order_id")
            ->leftjoin("tbl_del_boy", "tbl_del_boy.del_boy_id", "=", "tbl_order.del_boy_id")
            ->leftjoin("tbl_user", "tbl_user.user_id", "=", "tbl_order.user_id")
            ->leftjoin("tbl_user_address", "tbl_user_address.user_id", "=", "tbl_order.user_id")

            
            // ->orderBy('order_id', 'DESC')
            ->where("tbl_log.del_boy_id", $id)
            ->get();

        for ($i = 0; $i < count($delorder); $i++) {

            $test = $delorder[$i]["order_item"];
            $foodname1 = array();


            foreach (explode(',', $test) as $info) {

                $food = Item::leftjoin("tbl_food", "tbl_food.food_id", "=", "tbl_item.food_id")
                    ->where("tbl_item.item_id", $info)
                    ->select("tbl_food.food_title", "tbl_item.item_id")
                    ->first();



                //$foodname1[$i] = $food->food_title;
                array_push($foodname1, $food->food_title);
            }

            $test = implode(",", $foodname1);

            $delorder[$i]["foodname"] =  $test;
            // echo $test;
            //echo "<br>";
        }
        return view('deliveryboy.order.order', compact('delorder'));
    }
    public function logstatus($id, $isdone)
    {
        $obj = Log::where("log_id", $id)->first();
        $obj->log_status = $isdone;
        $obj->save();
        return redirect('/delboyorder');
    }
    public function deliveryuser()

    {
        return view('deliveryboy.user.deliveryuser');  # code...
    }
}

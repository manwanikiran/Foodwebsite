<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use App\Models\Users;
use App\Models\City;
use App\Models\Address;
use App\Models\Area;
use App\Models\Order;
use App\Models\Item;
use App\Models\Food;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function user()
    {

        $user = Users::all();
        return view('admin.user.user', compact('user'));
    }

    public function userisverify($id, $isverify)
    {

        $obj = Users::where("user_id", $id)->first();
        $obj->user_is_verify = $isverify;
        $obj->save();
        return redirect('/user');
    }


    // frontend----------------------------------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------------------------------------------
    public function userregister()
    {

        return view('frontend.user.userregister');
    }
    public function insertuser(Request $request)
    {

        $username = $request->username;
        $email = $request->email;

        $result = Users::where("user_email", $email)->get();
        if (count($result) >= 1) {

            return redirect('/userregister')->with("error", "Email Already Exist !!!!");
        } else {
            $password = $request->password;
            $contactnumber = $request->contactnumber;
         
            $obj = new Users;

            $obj->user_name = $username;
            $obj->user_email = $email;
            $obj->user_password = $password;
            $obj->user_contact = $contactnumber;
            $obj->user_reg_datetime = now();

            $obj->save();
            return redirect('/userlogin');
        }
    }

    public function userprofile()
    {

        $id = Session::get('userid');
        $user = Users::where('user_id', $id)->first();
        $useradd = Address::where('user_id', $id)
            ->leftjoin("tbl_city", "tbl_city.city_id", "=", "tbl_user_address.city_id")
            ->leftjoin("tbl_area", "tbl_area.area_id", "=", "tbl_user_address.area_id")
            ->first();
       
        $city = City::all();
        $area = Area::all();
        
        $orderprofile = Order::leftjoin("tbl_log", "tbl_log.order_id", "=", "tbl_order.order_id")
        ->leftjoin("tbl_del_boy", "tbl_del_boy.del_boy_id", "=", "tbl_order.del_boy_id") 
        // ->leftjoin("tbl_order", "tbl_order.user_id", "=", "tbl_cart.user_id") 
        ->where('tbl_order.user_id', $id)
        ->get();

      //  foreach($orderprofile as $row){

        for($i=0;$i<count($orderprofile);$i++){

            $test = $orderprofile[$i]["order_item"];
            $foodname1 = array();
           
            
            foreach(explode(',', $test) as $info) {
              
                $food = Item::leftjoin("tbl_food","tbl_food.food_id","=","tbl_item.food_id")
                ->where("tbl_item.item_id",$info)
                ->select("tbl_food.food_title","tbl_item.item_id")
                ->first();

              

               //$foodname1[$i] = $food->food_title;
               array_push($foodname1, $food->food_title);
              
            }

            $test= implode(",", $foodname1);
          
            $orderprofile[$i]["foodname"] =  $test;
           // echo $test;
            //echo "<br>";
        }

//print_r($orderprofile);

       return view('frontend.profile.userprofile', compact('user', 'useradd', 'city', 'area','orderprofile'));
    }

    public function getareauser(Request $request)
    {

        $data['area'] = Area::where("city_id", $request->city)
            ->get(["area_name", "area_id"]);

        return response()->json($data);
    }

    public function edituser(Request $request)
    {

        $id = Session::get('userid');
        $username = $request->username;
        $email = $request->email;
        $contactnumber = $request->contactnumber;

        $obj = Users::where('user_id', $id)->first();

        $obj->user_name = $username;
        $obj->user_contact = $contactnumber;

        $obj->user_email = $email;
        $obj->save();

        // address-------------------------------------------------------------------------------------------------------
        $result = Address::where("user_id", $id)->get();

        if (count($result) >= 1) {



            $address = $request->address;
            $pincode = $request->pincode;
            $landmark = $request->landmark;
            $type = $request->type;
            $city = $request->city;
            $area = $request->area;

            $obj = Address::where('user_id', $id)->first();


            $obj->user_id = $id;
            $obj->user_address = $address;
            $obj->user_address_pincode = $pincode;
            $obj->user_address_landmark = $landmark;
            $obj->user_address_type = $type;
            $obj->city_id = $city;
            $obj->area_id = $area;

            $obj->save();
        } else {

            $id = Session::get('userid');
            $address = $request->address;
            $pincode = $request->pincode;
            $landmark = $request->landmark;
            $type = $request->type;
            $city = $request->city;
            $area = $request->area;

            $obj = new Address;


            $obj->user_id = $id;
            $obj->user_address = $address;
            $obj->user_address_pincode = $pincode;
            $obj->user_address_landmark = $landmark;
            $obj->user_address_type = $type;
            $obj->city_id = $city;
            $obj->area_id = $area;

            $obj->save();
        }

        return redirect('/userlogout');
    }

    public function myorder(){

        
        $id = Session::get('userid');

        $orderprofile = Order::leftjoin("tbl_log", "tbl_log.order_id", "=", "tbl_order.order_id")
        ->leftjoin("tbl_del_boy", "tbl_del_boy.del_boy_id", "=", "tbl_order.del_boy_id") 
        // ->leftjoin("tbl_order", "tbl_order.user_id", "=", "tbl_cart.user_id") 
        ->where('tbl_order.user_id', $id)
        ->get();

      //  foreach($orderprofile as $row){

        for($i=0;$i<count($orderprofile);$i++){

            $test = $orderprofile[$i]["order_item"];
            $foodname1 = array();
           
            
            foreach(explode(',', $test) as $info) {
              
                $food = Item::leftjoin("tbl_food","tbl_food.food_id","=","tbl_item.food_id")
                ->where("tbl_item.item_id",$info)
                ->select("tbl_food.food_title","tbl_item.item_id")
                ->first();

              

               //$foodname1[$i] = $food->food_title;
               array_push($foodname1, $food->food_title);
              
            }

            $test= implode(",", $foodname1);
          
            $orderprofile[$i]["foodname"] =  $test;
           // echo $test;
            //echo "<br>";
        }

        
        return view('frontend.order.userorder',compact('orderprofile'));
    }
}

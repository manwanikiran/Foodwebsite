<?php

namespace App\Http\Controllers;

use App\Models\Restaurantlogin;
use App\Models\Packageorder;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RestaurantloginController extends Controller
{
    public function restaurantindex()
    {
        return view('restaurant.authentication.reslogin');
    }

    public function restaurantlogin(Request $request)
    {

        $resemail = $request->resemail;
        $respassword = $request->respassword;

       
            $result = Restaurantlogin::where("res_email", $resemail)->where("res_password", $respassword)
                ->where("res_is_verify", 'yes')->where("res_is_approve", 'yes')->where("res_is_block", 'no')->get();

            if (count($result) >= 1) {

                Session::put('restaurantlogin', 'yes');
                foreach ($result as $row) {

                    Session::put('restaurantid', $row->res_id);
                    Session::put('restaurantname', $row->res_name);
                    Session::put('reslogo', $row->res_logo);
                }
                $id= Session::get('restaurantid');
                $package=Packageorder::where("res_id",$id)->where("packageorder_status",'running')->get();
                if (count($package) >= 1) {
                    return redirect('/resdashboard');
                }
                else{
                    return redirect('/packageorder');
                }

                return redirect('/resdashboard');
            } else {
                return redirect('/restaurantindex')->with("error", "Restaurant Not Found !!!");;
            }
        
       
    }
    public function reslogout()
    {

        Session::forget('restaurantlogin');
        return redirect('/restaurantindex');
    }


    // changepassword-----------------------------------------------------------------------------------
    public function reschangepassword()
    {
        return view('restaurant.authentication.reschangepassword');
    }
    public function rescheckpassword(Request $request)
    {
        $id = Session::get('restaurantid');
        $oldpassword = $request->oldpassword;
        $newpassword = $request->newpassword;

        $result = Restaurantlogin::where("res_password", $oldpassword)->where("res_id", $id)->get();
        if (count($result) >= 1) {

            //echo "Correct password";
            $obj = Restaurantlogin::where("res_id", $id)->first();
            $obj->res_password = $newpassword;
            $obj->save();

            return redirect('/reslogout');
        } else {
            return redirect('/reschangepassword')->with("error", "Old Password is not correct !!!");;
        }
    }

    //   forgetpassword 

    public function resforgetpassword()
    {
        return view('restaurant.authentication.resforgetpassword');
    }

    public function rescheckforgetpass(Request $request)
    {

        $email = $request->email;

        $result = Restaurantlogin::where("res_email", $email)->get();
        if (count($result) >= 1) {

            foreach ($result as $row) {

                $password = $row->res_password;
                $name = $row->res_name;
                $emaild = $row->admin_;

                $details = [

                    "password" =>  $password,
                    "name" => $name,
                    "emailid" => $emaild,
                ];
            }

            \Mail::to($email)->send(new \App\Mail\AdminforgotpassMail($details));
            return redirect('/resforgetpassword')->with("message", "Password Sent Succefully");
        } else {

            return redirect('/resforgetpassword')->with("error", "Email is not correct !!!");
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserloginController extends Controller
{
    public function userlogin()
    {

        return view('frontend.user.userlogin');
    }

    public function userchecklogin(Request $request)
    {
        
        $email = $request->email;
        $password = $request->password;
        $result = Users::where("user_email", $email)->where("user_password", $password)->where("user_is_verify",'yes')->get();

        if (count($result) >= 1) {

            
            Session::put('userlogin', 'yes');
            foreach ($result as $row) {

                Session::put('userid', $row->user_id);
                Session::put('username', $row->user_name);
                // Session::put('verify', $row->user_is_verify='yes');
            }
            return redirect('/');
        } else {
            return redirect('/userlogin')->with("error", "User Not Found !!!");;
        }
    }
    public function userlogout()
    {

        Session::forget('userlogin');
        return redirect('/');
    }
    //Password-------------------------------------------------------------------------------------------------------------

    public function userchangepass()
    {
        return view('frontend.changepass.changepass');
    }
    public function usercheckchangepass(Request $request)
    {
        $id = Session::get('userid');
        $oldpassword = $request->oldpassword;
        $newpassword = $request->newpassword;

        $result = Users::where("user_password", $oldpassword)->where("user_id", $id)->get();
        if (count($result) >= 1) {

            //echo "Correct password";
            $obj = Users::where("user_id", $id)->first();
            $obj->user_password = $newpassword;
            $obj->save();

            return redirect('/userlogout');
        } else {
            return redirect('/userchangepass')->with("error", "Old Password is not correct !!!");;
        }
    }

    //forget

    public function userforgetpass()
    {
        return view('frontend.forgetpassword.forgetpass');
    }

    public function usercheckforgetpass(Request $request)
    {

        $email = $request->email;

        $result = Users::where("user_email", $email)->get();
        if (count($result) >= 1) {

            foreach ($result as $row) {

                $password = $row->user_password;
                $name = $row->user_name;
                $emaild = $row->user_email;

                $details = [


                    "password" =>  $password,
                    "name" => $name,
                    "emailid" => $emaild,
                ];
            }
            \Mail::to($email)->send(new \App\Mail\UserforgetpassMail($details));
            return redirect('/userforgetpass')->with("message", "Password Sent Succefully");
        } else {

            return redirect('/userforgetpass')->with("error", "Email is not correct !!!");
        }
    }
}

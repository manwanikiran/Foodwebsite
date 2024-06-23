<?php

namespace App\Http\Controllers;

use App\Models\Adminlogin;
use Mail;
use App\Mail\AdminforgotpassMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AdminloginController extends Controller
{
    public function adminindex()
    {
        return view('admin.login.index');
    }

    public function checklogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $result = Adminlogin::where("admin_username", $email)->where("admin_password", $password)->get();

        if (count($result) >= 1) {

            Session::put('adminlogin', 'yes');
            foreach ($result as $row) {

                Session::put('adminid', $row->admin_id);
                Session::put('adminusername', $row->admin_name);
                Session::put('adminimg', $row->admin_photo);
            }
            return redirect('/dashboard');
        } else {
            return redirect('/adminlogin')->with("error", "Admin Not Found !!!");
        }
    }
    public function adminlogout()
    {
        Session::forget('adminlogin');
        return redirect('/adminlogin');
    }

    // changepassword-----------------------------------------------------------------------------------
    public function adminchangepassword()
    {

        return view('admin.login.changepassword');
    }
    public function changepassword(Request $request)
    {
        $id = Session::get('adminid');
        $oldpassword = $request->oldpassword;
        $newpassword = $request->newpassword;

        $result = Adminlogin::where("admin_password", $oldpassword)->where("admin_id", $id)->get();
        if (count($result) >= 1) {

            //echo "Correct password";
            $obj = Adminlogin::where("admin_id", $id)->first();
            $obj->admin_password = $newpassword;
            $obj->save();

            return redirect('/adminlogout');
        } else {
            return redirect('/adminchangepassword')->with("error", "Old Password is not correct !!!");;
        }
    }

    public function forgetpassword()
    {
        return view('admin.login.forgetpassword');
    }

    public function checkforgetpass(Request $request)
    {

        $email = $request->email;

        $result = Adminlogin::where("admin_username", $email)->get();
        if (count($result) >= 1) {

            foreach($result as $row){

                $password = $row->admin_password;
                $name = $row->admin_name;
                $emaild = $row->admin_username;

                $details = [
                    

                    "password" =>  $password,
                    "name"=>$name,
                    "emailid"=>$emaild,
                ];
            }
            //Mail::to($email)->send(new \App\Mail\AdminforgotpassMail($details));
            return redirect('/forgetpassword')->with("message", "Password Sent Succefully");
          
        } 
        else {

            return redirect('/forgetpassword')->with("error", "Email is not correct !!!");
        }
    }
}

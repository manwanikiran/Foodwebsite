<?php

namespace App\Http\Controllers;

use App\Models\Resinquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ResinquiryController extends Controller
{
    public function resinquiry()
    {
        $id = Session::get('restaurantid');
        $resinquiry = Resinquiry::leftjoin("tbl_restaurant", "tbl_restaurant.res_id", "=", "tbl_resinquiry.res_id")
            ->where("tbl_resinquiry.res_id", $id)->get();
        return view('restaurant.resinquiry.resinquiry', compact('resinquiry'));
    }

    public function insertresinquiry(Request $request)
    {
        $id = $request->restaurant;
        $name = $request->name;
        $email = $request->email;
        $contact = $request->contact;
        $message = $request->message;

        $obj = new Resinquiry;
        $obj->res_id = $id;
        $obj->username = $name;
        $obj->email = $email;
        $obj->contactno = $contact;
        $obj->message = $message;


        $obj->save();
        return redirect('/restaurantlist');
    }


    public function inquiryresponse(Request $request)
    {

        $email = $request->email;
        $messages = $request->messages;

        // echo $messages;
        // echo $email;
        $details = [


            "email" =>  $email,
            "messages" =>  $messages,

        ];
        // }
        $inquiryid=$request->inquiryid;
        $messages = $request->messages;
        $obj = Resinquiry::where("resinquiry_id", $inquiryid)->first();
        $obj->response_message = $messages;
        $obj->save();
        
        \Mail::to($email)->send(new \App\Mail\InquiryresponseresMail($details));
        return redirect('/resinquiry')->with("message", "Password Sent Succefully");

        


    }

    public function deleteresinquiry(Request $request)
    {
        $id = $request->deleteid;
        

        $result = Resinquiry::Where("resinquiry_id",$id)->first();

        $result->delete();

        return redirect('/resinquiry');
    }
}

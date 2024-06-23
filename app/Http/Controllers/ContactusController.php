<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use App\Models\Admin;
use Illuminate\Http\Request;

class ContactusController extends Controller
{

    //admin
    public function admininquiry()
    {
        $admininquiry= Contactus::all();
        return view('admin.inquiry.admininquiry',compact('admininquiry'));
    }

    //frontend
    public function contactus()
    {
       
        return view('frontend.contactus.contactus');
    }
    public function insertinquiry(Request $request)
    {

        $name = $request->name;
        $email = $request->email;
        $message = $request->message;
        $contactnumber = $request->contactnumber;

        $obj = new Contactus;
        $obj->inquiry_name = $name;
        $obj->inquiry_email = $email;
        $obj->inquiry_message = $message;
        $obj->inquiry_contact_no = $contactnumber;
        $obj->save();

        
        $adminemail = Admin::select('admin_username')->limit(1)->first();

        $test = $adminemail["admin_username"];

         //echo $adminemail;
        //return redirect('/contactus');

        $result = Contactus::all();
         foreach($result as $row){

        $message = $row-> inquiry_message;
        $name = $row->inquiry_name;
        $email = $row->inquiry_email;
        $contactno = $row->inquiry_contact_no;
        $details = [


            "message" =>  $message,
            "name" => $name,
            "email" => $email,
            "contactno" => $contactno,
        ];
    }
        \Mail::to($test)->send(new \App\Mail\ContactusMail($details));
           return redirect('/contactus');

 

    }

    public function deleteinquiry(Request $request)
    {
        $id = $request->deleteid;
        

        $result = Contactus::Where("inquiry_id",$id)->first();

        $result->delete();

        return redirect('/admininquiry');
    }

    public function admininquiryresponse(Request $request)
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
        $obj = Contactus::where("inquiry_id", $inquiryid)->first();
        $obj->inquiry_response = $messages;
        $obj->save();
        
        \Mail::to($email)->send(new \App\Mail\InquiryresponseresMail($details));
        return redirect('/admininquiry')->with("message", "Password Sent Succefully");

        


    }
    
}

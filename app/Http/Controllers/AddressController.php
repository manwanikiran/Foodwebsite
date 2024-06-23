<?php

namespace App\Http\Controllers;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function useraddress(){
        $useradd=Address::leftjoin("tbl_user","tbl_user.user_id","tbl_user_address.user_id")->get();
        return view('admin.useraddress.useraddress',compact('useradd'));
    }
}

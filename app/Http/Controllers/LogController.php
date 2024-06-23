<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Http\Request;

class LogController extends Controller
{


    public function insertlog(Request $request)
    {

        $delboy = $request->delboy;
        $order = $request->order;


        $obj = new Log;
        $obj->del_boy_id = $delboy;
        $obj->order_id = $order;

        $obj->save();

        $id = $request->order;
        $delboy = $request->delboy;
        // $result = Cart::Where("user_id",$id)->first();
        $result = DB::Select("update tbl_order set del_boy_id = '$delboy' where order_id = '$id' ");

        return redirect('/order');
    }
}

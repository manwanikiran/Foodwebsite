<?php

namespace App\Http\Controllers;

use App\Models\Packageorder;
use App\Models\Restaurant;
use App\Models\Package;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PackageorderController extends Controller
{

    public function packageorder()
    {
        $res = Restaurant::all();
        $package = Package::all();
        return view('restaurant.authentication.packageorder', compact('package', 'res'));
    }
    public function insertpackageorder(Request $request)
    {
        $amount=$request->amount;
        $packageid= Package::where("package_amount", $amount)->first();
        $packageid = $packageid->package_id;
        // $packageid = $request->packageid;
        $res = $request->res;
        $payid = $request->payid;
 
        $pkdays = Package::where("package_id", $packageid)->first();
        $totaldays = $pkdays->package_days;
        
        //  $totalamount = $pkdays->package_amount;
        // $currentDateTime = 
        // $newDateTime = Carbon::now()->addDay($totaldays);
        // echo $totaldays;
        // echo $currentDateTime;
        // echo $newDateTime;

         $obj=new Packageorder;


        $obj->package_id = $packageid;
        $obj->start_date = Carbon::now();
        $obj->end_date = now()->addDay($totaldays);
        $obj->res_id = $res;
        $obj->packageorder_status = 'running';
        $obj->payment_id=$payid;


        // echo  $packageid;
        // echo $res;
        $obj->save();

        return redirect('/restaurantindex');
    }


    
}

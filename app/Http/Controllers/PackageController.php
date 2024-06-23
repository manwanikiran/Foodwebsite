<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Packageorder;
use Carbon\Carbon;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function package()
    {
        $package = Package::all();
        return view('admin.package.package', compact('package'));
    }
    public function addpackage()
    {
        return view('admin.package.addpackage');
    }
    public function insertpackage(Request $request)
    {
        $package = $request->package;
        $packageamount = $request->packageamount;
        $title = $request->title;
        $packagedays = $request->packagedays;
        $result = Package::where("package_discription", $package)->get();

        if (count($result) >= 1) {
            return redirect('/addpackage')->with("error", "Package Already Exist !!!!");
        } else {
            $obj = new Package;
            $obj->package_discription = $package;
            $obj->package_title = $title;
            $obj->package_days = $packagedays;
            $obj->package_amount = $packageamount;
            $obj->save();
            return redirect('/addpackage')->with("message", "Package Inserted successfully...");;
        }
    }
    public function updatepackage($id)
    {

        $package = Package::where("package_id", $id)->first();
        return view('admin.package.updatepackage', compact('package'));
    }
    public function editpackage(Request $request)
    {
        $id = $request->editpackage;
        $package = $request->package;
        $title = $request->title;
        $packagedays = $request->packagedays;
        $packageamount = $request->packageamount;

        $obj = Package::where("package_id", $id)->first();
        $obj->package_discription = $package;
        $obj->package_amount = $packageamount;
        $obj->package_title = $title;
        $obj->package_days = $packagedays;
        $obj->save();

        return redirect('/package');
    }
    public function deletepackage(Request $request)
    {
        $id = $request->deleteid;

        $result = Package::Where("package_id", $id)->first();

        $result->delete();

        return redirect('/package');
    }

    public function expiredpackage(Request $request)
    {

        $packageorder = Packageorder::all();


        foreach ($packageorder as $request) {


            // $packageorderid = $request->packageorder_id;
            // $resid = $request->res_id;
            $enddate = $request->end_date;
            // echo $enddate;
            // $status = $request->packageorder_status;
            $today = Carbon::now()->toDateString();
            // echo $today;
            
        }
        if ($enddate == $today) {

            $obj = Packageorder::where("end_date", $enddate)->first();
            $obj->packageorder_status = 'expired';
            $obj->save();
            return redirect('/dashboard');
        } else {
            return redirect('/dashboard');
        }
    }
}

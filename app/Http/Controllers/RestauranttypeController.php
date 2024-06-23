<?php

namespace App\Http\Controllers;

use App\Models\Restauranttype;

use Illuminate\Http\Request;

class RestauranttypeController extends Controller
{
    public function restauranttype()
    {
        $restauranttype = Restauranttype::all();
        return view('admin.restauranttype.restauranttype', compact('restauranttype'));
    }

    public function addrestauranttype()
    {
        return view('admin.restauranttype.addrestauranttype');
    }

    public function updaterestauranttype($id)
    {
        $restype = Restauranttype::where("res_type_id", $id)->first();
        return view('admin.restauranttype.updaterestauranttype', compact('restype'));
    }

    public function insertrestauranttype(Request $request)
    {
        $restype = $request->restype;
        $result = Restauranttype::where("res_type_name", $restype)->get();

        if (count($result) >= 1) {
            return redirect('/addrestauranttype')->with("error", "Restauranttype Already Exist !!!!");
        } else {
            $obj = new Restauranttype;
            $obj->res_type_name = $restype;


            $ext = $request->typeimg->extension();
            $filename = time() . rand("1111", "9999") . "." . $ext;
            $request->typeimg->move(public_path("/uploads/resttype/"), $filename);
            // $typeimg="abc.jpg";        
            $obj->res_type_img_url = $filename;


            $obj->save();
            return redirect('/addrestauranttype')->with("message", "Restauranttype Inserted successfully...");
        }
    }

    public function deleterestauranttype(Request $request)
    {
        $id = $request->deleteid;
        $image = $request->deleteimg;

        unlink(public_path('/uploads/resttype/') . $image);

        $result = Restauranttype::Where("res_type_id", $id)->first();

        $result->delete();

        return redirect('/restauranttype');
    }
    public function editrestauranttype(Request $request)
    {

        $id = $request->editrestauranttype;
        $resttype = $request->restype;

        $oldimg = $request->oldimg;

        if ($request->hasFile('typeimg')) {

            $ext = $request->typeimg->extension();
            $filename = time() . rand("1111", "9999") . "." . $ext;
            $request->typeimg->move(public_path("/uploads/resttype/"), $filename);

            unlink(public_path('/uploads/resttype/') . $oldimg);
        } else {
            $filename = $oldimg;
        }

        $obj = Restauranttype::where("res_type_id", $id)->first();
        $obj->res_type_name = $resttype;

        $obj->res_type_img_url = $filename;
        $obj->save();

        return redirect('/restauranttype');
    }
}

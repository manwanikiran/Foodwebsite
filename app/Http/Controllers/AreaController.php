<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;

use Session;

use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function area(){
        $area=Area::leftjoin("tbl_city","tbl_city.city_id","=","tbl_area.city_id")
        ->orderBy('area_id', 'DESC')
        ->get();
        return view('admin.area.area',compact('area'));
    }

    public function addarea(){
        $city=City::all();
        return view('admin.area.addarea',compact('city'));
    }

    public function updatearea($id){

        $area = Area::where("area_id",$id)->first();
        $city = City::all();
        return view('admin.area.updatearea',compact('city','area'));
    }

    public function insertarea(Request $request)
    {
        $localarea=$request->localarea;
        $city=$request->city;

        $result=Area::where("area_name",$localarea)->where("city_id",$city)->get();

        if(count($result)>=1){
            return redirect('/addarea')->with("error","Area Already Exist !!!!");
        }
        else{
            $obj = new Area;
            $obj->area_name=$localarea;
    
           
            $obj->city_id=$city;
    
            $obj->save();
            return redirect('/addarea')->with("message","Area Inserted successfully...");
        }

        
    }

    
    public function deletearea(Request $request)
    {
        $id = $request->deleteid;

        $result = Area::Where("area_id",$id)->first();

        $result->delete();

        return redirect('/area');
    }
    
    public function editarea(Request $request){
        $id=$request->editarea;
        $area = $request->localarea;
        $city = $request-> city;

        $obj = Area::where("area_id",$id)->first();
        $obj->area_name = $area;
        $obj->city_id = $city;
        $obj->save();

            return redirect('/area');
    }
}

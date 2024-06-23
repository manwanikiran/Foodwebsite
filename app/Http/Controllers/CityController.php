<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;



use Illuminate\Http\Request;

class CityController extends Controller
{
    
    public function city(){
        $city=City::leftjoin("tbl_state","tbl_state.state_id","=","tbl_city.state_id")
        ->orderBy('city_id', 'DESC')
        ->get();
        return view('admin.city.city',compact('city'));
    }

    public function addcity(){

        $state=State::all();
        return view('admin.city.addcity',compact('state'));
    }

    public function updatecity($id){

        $city = City::where("city_id",$id)->first();
        $state=State::all();
        return view('admin.city.updatecity',compact('state','city'));
    }

    public function insertcity(Request $request){
        
        $cityname=$request->cityname;
        $state=$request->state;

        $result=City::where("city_name",$cityname)->get();

        if(count($result)>=1){
            return redirect('/addcity')->with("error","City Already Exist !!!!");
        }
        else{

        $obj = new City;
        $obj->city_name=$cityname;
        $obj->state_id=$state;

        $obj->save();
        return redirect('/addcity')->with("message","City Inserted successfully !!!!");
        }
    }

    
    public function deletecity(Request $request)
    {
        $id = $request->deleteid;

        $result = City::Where("city_id",$id)->first();

        $result->delete();

        return redirect('/city');

    }
    
    public function editcity(Request $request){
        $id=$request->editcity;
        $city = $request-> cityname;
        $state=$request-> state;

        $obj = City::where("city_id",$id)->first();
        $obj->city_name = $city;
        $obj->state_id = $state;
        $obj->save();

        return redirect('/city');
    }
}

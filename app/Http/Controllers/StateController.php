<?php

namespace App\Http\Controllers;

use App\Models\State;

use Session;

use Illuminate\Http\Request;

class StateController extends Controller
{
 
    public function state(){
        $state=State::all();
        return view('admin.state.state',compact('state'));
    }

    public function addstate(){  
        return view('admin.state.addstate');
      
    }
    public function updatestate($id){  

        $state = State::where("state_id",$id)->first();
        return view('admin.state.updatestate',compact('state'));
      
    }

    public function insertstate(Request $request)
    {
        $statename=$request->statename;

        $result=State::where("state_name",$statename)->get();

        if(count($result)>=1){
            return redirect('/addstate')->with("error","State Already Exist !!!!");
        }
        else{
            $obj = new State;
            $obj->state_name=$statename;
            $obj->save();
            return redirect('/addstate')->with("message","State Inserted successfully...");;
        }

        
    }

    public function deletestate(Request $request)
    {
        $id = $request->deleteid;

        $result = State::Where("state_id",$id)->first();

        $result->delete();

        return redirect('/state');
    }

    public function editstate(Request $request){
        $id=$request->editstate;
        $statename = $request->statename;

        $obj = State::where("state_id",$id)->first();
        $obj->state_name = $statename;
        $obj->save();

       

            return redirect('/state');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Food;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function item(){
        $item=Item::leftjoin("tbl_food","tbl_food.food_id","=","tbl_item.food_id")
        ->leftjoin("tbl_user","tbl_user.user_id","=","tbl_item.user_id")
        ->orderBy('item_id', 'DESC')
        ->get();
        return view('admin.item.item',compact('item'));
    }

    // restaurant--------------------------------------------------------------------------

    public function resitem(){
        $id=Session::get('restaurantid');
        $resitem=Item::leftjoin("tbl_food","tbl_food.food_id","=","tbl_item.food_id")
        ->leftjoin("tbl_user","tbl_user.user_id","=","tbl_item.user_id")
        ->where("tbl_food.res_id",$id)
        ->orderBy('item_id', 'DESC')
        ->get();
        return view('restaurant.resitem.resitem',compact('resitem'));
    }

    public function additem(){
       $food=Food::all();
        return view('restaurant.resitem.additem',compact('food'));
    }

    public function updateitem($id)
    {

        $item = Item::where("item_id", $id)->first();
        $food = Food::all();
        return view('restaurant.resitem.updateitem', compact('food', 'item'));
    }

    public function insertitem(Request $request){

        $food=$request->food;
        $itemqty=$request->itemqty;
        $itemprice=$request->itemprice;
        $itemstatus=$request->itemstatus;

        
      
        $obj = new Item;
        $obj->food_id=$food;
        $obj->item_qty=$itemqty;
        $obj->item_price=$itemprice;
        $obj->item_status=$itemstatus;
       

        $obj->save();
        return redirect('/additem');
        }


        public function edititem(Request $request)
        {
            $id = $request->edititem;
            $food=$request->food;
            $itemqty=$request->itemqty;
            $itemprice=$request->itemprice;
            $itemstatus=$request->itemstatus;

            $obj = Item::where("item_id",$id)->first();

            $obj->food_id=$food;
            $obj->item_qty=$itemqty;
            $obj->item_price=$itemprice;
            $obj->item_status=$itemstatus;
           
            $obj->save();
            return redirect('/resitem');
        }

        public function deleteitem(Request $request)
        {
            $id = $request->deleteid;
    
            $result = Item::Where("item_id", $id)->first();
    
            $result->delete();
    
            return redirect('/resitem');
        }
}

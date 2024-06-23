<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menu()
    {
        $menu = Menu::leftjoin("tbl_restaurant", "tbl_restaurant.res_id", "=", "tbl_menu.res_id")
        ->orderBy('menu_id', 'DESC')
        ->get();
        return view('admin.menu.menu', compact('menu'));
    }

    public function menuisapprove($id,$isapprove){
       
        $obj=Menu::where("menu_id",$id)->first();
        $obj->menu_is_approve=$isapprove;
        $obj->save();
        return redirect('/menu');
    }

    // restaurant

    public function resmenu()
    {
        $id=Session::get('restaurantid');
        $menu = Menu::leftjoin("tbl_restaurant", "tbl_restaurant.res_id", "=", "tbl_menu.res_id")
        ->where("tbl_menu.res_id",$id)
        ->orderBy('menu_id', 'DESC')
        ->get();
        return view('restaurant.resmenu.resmenu', compact('menu'));
    }

    public function menuisactive($id,$isactive){
       
        $obj=Menu::where("menu_id",$id)->first();
        $obj->menu_is_active=$isactive;
        $obj->save();
        return redirect('/resmenu');
    }

    
    public function addmenu()
    {
        $restaurant = Restaurant::all();
        return view('restaurant.resmenu.addmenu', compact('restaurant'));
    }

    public function updatemenu($id)
    {

        $menu = Menu::where("menu_id", $id)->first();
        $restaurant = Restaurant::all();
        return view('restaurant.resmenu.updatemenu', compact('menu', 'restaurant'));
    }

    public function insertmenu(Request $request)
    {

        $restaurant = $request->restaurant;
        $menutitle = $request->menutitle;

        $ext = $request->image1->extension();
        $filename = time() . rand("1111", "9999") . "." . $ext;
        $request->image1->move(public_path("/uploads/menu/"), $filename);

        $menuactive = $request->menuactive;
        // $menuapprove = $request->menuapprove;

        $obj = new Menu;


        $obj->res_id = $restaurant;
        $obj->menu_title = $menutitle;
        $obj->menu_img = $filename;
        $obj->menu_is_active = $menuactive;
        // $obj->menu_is_approve = $menuapprove;

        $obj->save();
        return redirect('/addmenu');
    }


    public function editmenu(Request $request)
    {

        $id = $request->editmenu;
        $restaurant = $request->restaurant;
        $menutitle = $request->menutitle;

        // $menuactive = $request->menuactive;
        // $menuapprove = $request->menuapprove;

        $oldimg = $request->oldimg;

        if ($request->hasFile('image1')) {

            $ext = $request->image1->extension();
            $filename = time().rand("1111","9999").".".$ext;
            $request->image1->move(public_path("/uploads/menu/"),$filename);

            unlink(public_path('/uploads/menu/').$oldimg);
        } 
        else {
            $filename = $oldimg;
        }

        $obj = Menu::where("menu_id", $id)->first();
        $obj->menu_title = $menutitle;
        $obj->res_id = $restaurant;

        $obj->menu_img = $filename;
        // $obj->menu_is_active = $menuactive;
        // $obj->menu_is_approve = $menuapprove;

        $obj->save();
        return redirect('/resmenu');
    }

    
    public function deletemenu(Request $request)
    {
        $id = $request->deleteid;
        $image = $request->deleteimg;

        unlink(public_path('/uploads/menu/').$image);
        $result = Menu::Where("menu_id", $id)->first();

        $result->delete();

        return redirect('/resmenu');
    }

    
}

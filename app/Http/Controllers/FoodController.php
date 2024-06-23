<?php

namespace App\Http\Controllers;

use App\Models\Food;

use App\Models\Restaurant;
use App\Models\Subcategory;
use App\Models\Category;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function food()
    {
        $food = Food::leftjoin("tbl_restaurant", "tbl_restaurant.res_id", "=", "tbl_food.res_id")
            ->leftjoin("tbl_sub_category", "tbl_sub_category.subcate_id", "=", "tbl_food.subcate_id")
            ->orderBy('food_id', 'DESC')
            ->get();
        return view('admin.food.food', compact('food'));
    }
    public function fooddetail($id)
    {
        $food = Food::where('food_id', $id)
            ->leftjoin("tbl_restaurant", "tbl_restaurant.res_id", "=", "tbl_food.res_id")
            ->leftjoin("tbl_sub_category", "tbl_sub_category.subcate_id", "=", "tbl_food.subcate_id")->first();
        return view('admin.food.fooddetail', compact('food'));
    }
    public function foodisapprove($id, $isapprove)
    {

        $obj = Food::where("food_id", $id)->first();
        $obj->food_is_approve = $isapprove;
        $obj->save();
        return redirect('/food');
    }
    // restaurant------------------------------------------------------------------------------------------

    public function resfood()
    {
        $id = Session::get('restaurantid');
        $resfood = Food::leftjoin("tbl_restaurant", "tbl_restaurant.res_id", "=", "tbl_food.res_id")
            ->leftjoin("tbl_sub_category", "tbl_sub_category.subcate_id", "=", "tbl_food.subcate_id")
            ->where("tbl_food.res_id", $id)
            ->orderBy('food_id', 'DESC')
            ->get();
        return view('restaurant.resfood.resfood', compact('resfood'));
    }

    public function addfood()
    {

        $restaurant = Restaurant::all();
        $subcategory = Subcategory::all();
        $category = Category::all();
        return view('restaurant.resfood.addfood', compact('restaurant', 'subcategory', 'category'));
    }

    public function insertfood(Request $request)
    {
        $subcategory = $request->subcategory;
        $foodtitle = $request->foodtitle;
        $restaurant = $request->restaurant;

        $result = Food::where("res_id",$restaurant)->where("food_title",$foodtitle)->get();

        if (count($result) >= 1)
        {
            return redirect('/addfood')->with("error", "Food Already Exist !!!!");
        } 
        else {

            $ext = $request->image1->extension();
            $filename1 = time() . rand("1111", "9999") . "." . $ext;
            $request->image1->move(public_path("/uploads/food/"), $filename1);

            $ext = $request->image2->extension();
            $filename2 = time() . rand("1111", "9999") . "." . $ext;
            $request->image2->move(public_path("/uploads/food/"), $filename2);

            $ext = $request->image3->extension();
            $filename3 = time() . rand("1111", "9999") . "." . $ext;
            $request->image3->move(public_path("/uploads/food/"), $filename3);

            $video = $request->video;
            $about = $request->about;
            $mainprice = $request->mainprice;
            $saleprice = $request->saleprice;
            $foodtype = $request->foodtype;

            $obj = new Food;


            $obj->food_title = $foodtitle;
            $obj->res_id = $restaurant;
            $obj->subcate_id = $subcategory;
            $obj->food_video_url = $video;
            $obj->food_about = $about;
            $obj->food_main_price = $mainprice;
            $obj->food_sale_price = $saleprice;
            $obj->food_type = $foodtype;
            $obj->food_img1 = $filename1;
            $obj->food_img2 = $filename2;
            $obj->food_img3 = $filename3;


            $obj->save();
            return redirect('/addfood')->with("message", "Food Inserted successfully !!!!");
        }
    }

    public function resfooddetail($id)
    {
        $food = Food::where('food_id', $id)
            ->leftjoin("tbl_restaurant", "tbl_restaurant.res_id", "=", "tbl_food.res_id")
            ->leftjoin("tbl_sub_category", "tbl_sub_category.subcate_id", "=", "tbl_food.subcate_id")->first();
        return view('restaurant.resfood.resfooddetail', compact('food'));
    }

    public function deletefood(Request $request)
    {
        $id = $request->deleteid;

        $img1 = $request->deleteimg1;
        unlink(public_path('/uploads/food/') . $img1);

        $img2 = $request->deleteimg2;
        unlink(public_path('/uploads/food/') . $img2);

        $img3 = $request->deleteimg3;
        unlink(public_path('/uploads/food/') . $img3);

        $result = Food::Where("food_id", $id)->first();

        $result->delete();

        return redirect('/resfood');
    }


    public function updatefood($id)
    {

        $food = Food::where("food_id", $id)->first();
        $restaurant = Restaurant::all();
        $subcategory = Subcategory::all();
        return view('restaurant.resfood.updatefood', compact('food', 'restaurant', 'subcategory'));
    }

    public function editfood(Request $request)
    {
        $id = $request->editfood;

        $foodtitle = $request->foodtitle;
        $restaurant = $request->restaurant;
        $subcategory = $request->subcategory;
        $video = $request->video;
        $about = $request->about;
        $mainprice = $request->mainprice;
        $saleprice = $request->saleprice;
        $foodtype = $request->foodtype;

        $oldimg1 = $request->oldimg1;
        if ($request->hasFile('image1')) {

            $ext = $request->image1->extension();
            $filename1 = time() . rand("1111", "9999") . "." . $ext;
            $request->image1->move(public_path("/uploads/food/"), $filename1);

            unlink(public_path('/uploads/food/') . $oldimg1);
        } else {
            $filename1 = $oldimg1;
        }

        $oldimg2 = $request->oldimg2;

        if ($request->hasFile('image2')) {
            $ext = $request->image2->extension();
            $filename2 = time() . rand("1111", "9999") . "." . $ext;
            $request->image2->move(public_path("/uploads/food/"), $filename2);

            unlink(public_path('/uploads/food/') . $oldimg2);
        } else {
            $filename2 = $oldimg2;
        }

        $oldimg3 = $request->oldimg3;

        if ($request->hasFile('image3')) {
            $ext = $request->image3->extension();
            $filename3 = time() . rand("1111", "9999") . "." . $ext;
            $request->image3->move(public_path("/uploads/food/"), $filename3);
            unlink(public_path('/uploads/food/') . $oldimg3);
        } else {
            $filename3 = $oldimg3;
        }


        $obj = Food::where("food_id", $id)->first();

        $obj->food_title = $foodtitle;
        $obj->res_id = $restaurant;
        $obj->subcate_id = $subcategory;
        $obj->food_video_url = $video;
        $obj->food_about = $about;
        $obj->food_main_price = $mainprice;
        $obj->food_sale_price = $saleprice;
        $obj->food_type = $foodtype;
        $obj->food_img1 = $filename1;
        $obj->food_img2 = $filename2;
        $obj->food_img3 = $filename3;

        $obj->save();
        return redirect('/resfood');
    }
    public function foodisactive($id, $isactive)
    {

        $obj = Food::where("food_id", $id)->first();
        $obj->food_is_active = $isactive;
        $obj->save();
        return redirect('/resfood');
    }
   
   

    public function getsubcategory(Request $request)
    {

        $data['subcategory'] = Subcategory::where("cate_id", $request->category)
            ->get(["subcate_name", "subcate_id"]);

        return response()->json($data);
    }
}

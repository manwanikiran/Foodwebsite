<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        $category=Category::all();
        return view('admin.category.category',compact('category'));
    }

    public function addcategory(){
        return view('admin.category.addcategory');
    }

    public function updatecategory($id){
        $category = Category::where("cate_id",$id)->first();
        return view('admin.category.updatecategory',compact('category'));
    }

    
    public function insertcategory(Request $request)
    {
        $categoryname=$request->categoryname;

       

        $result=Category::where("cate_name",$categoryname)->get();

        if(count($result)>=1){
            return redirect('/addcategory')->with("error","Category Already Exist !!!!");
        }
        else{
            
            $ext = $request->categoryimg->extension();
            $filename = time().rand("1111","9999").".".$ext;
            $request->categoryimg->move(public_path("/uploads/category/"),$filename);
    
            $obj = new Category;
            $obj->cate_name=$categoryname;
    
            
            $obj->cate_img=$filename;
    
    
            $obj->save();
            return redirect('/addcategory')->with("message","Category Inserted Successfully...");
        }
    }

    
    public function deletecategory(Request $request)
    {
        $id = $request->deleteid;
        $image = $request->deleteimg;

        unlink(public_path('/uploads/category/').$image);
        $result = Category::Where("cate_id",$id)->first();

        $result->delete();

        return redirect('/category');
    }

    public function editcategory(Request $request){

        $id=$request->editcategory;
        $category = $request->categoryname;
        
        $oldimg = $request->oldimg;

        if($request->hasFile('cateimg')){

            $ext = $request->cateimg->extension();
            $filename = time().rand("1111","9999").".".$ext;
            $request->cateimg->move(public_path("/uploads/category/"),$filename);

            unlink(public_path('/uploads/category/').$oldimg);

        }
        else{
            $filename = $oldimg;
        }

        $obj = Category::where("cate_id",$id)->first();
        $obj->cate_name = $category;
       
        $obj->cate_img=$filename;
        $obj->save();

            return redirect('/category');
    }

}


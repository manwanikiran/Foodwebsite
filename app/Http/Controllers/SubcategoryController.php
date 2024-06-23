<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;

use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function subcategory(){
        $subcategory=Subcategory::leftjoin("tbl_category","tbl_category.cate_id","=","tbl_sub_category.cate_id")
        ->orderBy('subcate_id', 'DESC')
        ->get();
        return view('admin.subcategory.subcategory',compact('subcategory'));
    }

    public function addsubcategory(){
        $category=Category::all();
        return view('admin.subcategory.addsubcategory',compact('category'));
    }

    public function updatesubcategory($id){

        $subcategory = Subcategory::where("subcate_id",$id)->first();
        $category = Category::all();
        return view('admin.subcategory.updatesubcategory',compact('category','subcategory'));
    }


    public function insertsubcategory(Request $request)
    {
        $subcatename=$request->subcatename;
        $category=$request->category;

        $result=Subcategory::where("subcate_name",$subcatename)->where("cate_id",$category)->get();

        if(count($result)>=1){
            return redirect('/addsubcategory')->with("error","Subcategory Already Exist !!!!");
        }
        else{
        $obj=new Subcategory;
        $obj->subcate_name=$subcatename;

       
        $obj->cate_id=$category;

        
        $ext = $request->subcateimg->extension();
        $filename = time().rand("1111","9999").".".$ext;
        $request->subcateimg->move(public_path("/uploads/subcategory/"),$filename);
      
        $obj->subcate_img=$filename;

        $obj->save();

        return redirect('/addsubcategory')->with("message","Subcategory Inserted Successfully !!!!");
        }
    }

    public function deletesubcategory(Request $request)
    {
        $id = $request->deleteid;
        $image = $request->deleteimg;

        unlink(public_path('/uploads/subcategory/').$image);
        $result = Subcategory::Where("subcate_id",$id)->first();

        $result->delete();

        return redirect('/subcategory');
    }

    public function editsubcategory(Request $request){
        $id=$request->editsubcategory;
        $subcatname = $request->subcatename;
        $category = $request-> category;
        $oldimg = $request->oldimg;

        if($request->hasFile('subcateimg')){

            $ext = $request->subcateimg->extension();
            $filename = time().rand("1111","9999").".".$ext;
            $request->subcateimg->move(public_path("/uploads/subcategory/"),$filename);

            unlink(public_path('/uploads/subcategory/').$oldimg);

        }
        else{
            $filename = $oldimg;
        }

        $obj = Subcategory::where("subcate_id",$id)->first();
        $obj->subcate_name = $subcatname;
        $obj->cate_id = $category;
        $obj->subcate_img=$filename;
        $obj->save();

            return redirect('/subcategory');
    }
}

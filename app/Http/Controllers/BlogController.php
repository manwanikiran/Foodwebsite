<?php

namespace App\Http\Controllers;

use App\Models\Blog;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function adminblog()
    {
        $id = Session::get('adminid');
        $blog = Blog::leftjoin("tbl_admin", "tbl_admin.admin_id", "=", "tbl_blog.admin_id")
        ->where("tbl_blog.admin_id", $id)->get();
        return view('admin.blog.adminblog', compact('blog'));
    }
    public function addblog()
    {
        return view('admin.blog.addblog');
    }

    public function insertblog(Request $request)
    {

        $id = $request->id;
        $discription = $request->discription;
        $ext = $request->blogimg->extension();
        $filename = time() . rand("1111", "9999") . "." . $ext;
        $request->blogimg->move(public_path("/uploads/blog"), $filename);

        $obj = new Blog;
        $obj->blog_description = $discription;
        $obj->blog_img = $filename;
        $obj->admin_id = $id;

        $obj->save();
        return redirect('/addblog')->with("message", "Blog Inserted Successfully...");
    }

    public function deleteblog(Request $request)
    {
        $id = $request->deleteid;
        $image = $request->deleteimg;

        unlink(public_path('/uploads/blog/').$image);

        $result = Blog::Where("blog_id",$id)->first();

        $result->delete();

        return redirect('/adminblog');
    }

    public function updateblog($id){
        $blog = Blog::where("blog_id",$id)->first();
        return view('admin.blog.updateblog',compact('blog'));
    }

    public function editblog(Request $request){

        $id=$request->editblog;
        $discription = $request->discription;
        
        $oldimg = $request->oldimg;

        if($request->hasFile('blogimg')){

            $ext = $request->blogimg->extension();
            $filename = time().rand("1111","9999").".".$ext;
            $request->blogimg->move(public_path("/uploads/blog/"),$filename);

            unlink(public_path('/uploads/blog/').$oldimg);

        }
        else{
            $filename = $oldimg;
        }

        $obj = Blog::where("blog_id",$id)->first();
        $obj->blog_description = $discription;
       
        $obj->blog_img=$filename;
        $obj->save();

            return redirect('/adminblog');
    }

    //restaurant
    public function resblog()
    {
        $id = Session::get('restaurantid');
        $blog = Blog::leftjoin("tbl_restaurant", "tbl_restaurant.res_id", "=", "tbl_blog.res_id")
        ->where("tbl_blog.res_id", $id)->get();
        return view('restaurant.resblog.resblog', compact('blog'));
    }
    public function addresblog()
    {
        return view('restaurant.resblog.addresblog');
    }

    public function insertresblog(Request $request)
    {

        $id = $request->id;
        $discription = $request->discription;
        $ext = $request->blogimg->extension();
        $filename = time() . rand("1111", "9999") . "." . $ext;
        $request->blogimg->move(public_path("/uploads/blog"), $filename);

        $obj = new Blog;
        $obj->blog_description = $discription;
        $obj->blog_img = $filename;
        $obj->res_id = $id;

        $obj->save();
        return redirect('/addresblog')->with("message", "Blog Inserted Successfully...");
    }

    public function updateresblog($id){
        $blog = Blog::where("blog_id",$id)->first();
        return view('restaurant.resblog.updateresblog',compact('blog'));
    }

    public function editresblog(Request $request){

        $id=$request->editblog;
        $discription = $request->discription;
        
        $oldimg = $request->oldimg;

        if($request->hasFile('blogimg')){

            $ext = $request->blogimg->extension();
            $filename = time().rand("1111","9999").".".$ext;
            $request->blogimg->move(public_path("/uploads/blog/"),$filename);

            unlink(public_path('/uploads/blog/').$oldimg);

        }
        else{
            $filename = $oldimg;
        }

        $obj = Blog::where("blog_id",$id)->first();
        $obj->blog_description = $discription;
       
        $obj->blog_img=$filename;
        $obj->save();

            return redirect('/resblog');
    }

    public function deleteresblog(Request $request)
    {
        $id = $request->deleteid;
        $image = $request->deleteimg;

        unlink(public_path('/uploads/blog/').$image);

        $result = Blog::Where("blog_id",$id)->first();

        $result->delete();

        return redirect('/resblog');
    }

}

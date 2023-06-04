<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blog_Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;



class BlogController extends Controller
{

    function add_blog(){

        $blog_cat_info =  Blog_Category::latest()->get();

        return view('backend.blog.add_blog', [
            'blog_cat_info'=>$blog_cat_info,
        ]);
    }

    function all_blog(){
        $blog = Blog::latest()->get();
        return view('backend.blog.all_blog',  [
            'blog'=>$blog,
        ]);
    }

    function store_blog(Request $request){


        if($request->blog_image == ''){

            Blog::insert([
                'blog_category_id'=>$request->blog_category_id,
                'blog_title'=>$request->blog_title,
                'blog_tags'=>$request->blog_tags,
                'blog_description'=>$request->blog_description,
                'created_at'=>Carbon::now(),

            ]);

            return redirect()->route('all_blog')->with('bs_woi','Blog added without image successfully!');

        }
        else{

            $blog_title = $request->blog_title;
            $image = $request->blog_image;
            $ext = $image->getClientOriginalExtension();
            $file_name =  str::lower(str_replace(' ', '-', $request->blog_title)).'-'.hexdec(uniqId()).'.'.$ext;

            Image::make($image)->save(public_path('uploads/blog/').$file_name);


            Blog::insert([
                'blog_category_id'=>$request->blog_category_id,
                'blog_title'=>$blog_title,
                'blog_tags'=>$request->blog_tags,
                'blog_description'=>$request->blog_description,
                'blog_image'=>$file_name,
                'created_at'=>Carbon::now(),

            ]);

        return redirect()->route('all_blog')->with('bs_wi','Blog added with image successfully!');



        }

    }


    function edit_blog($id){

        $blog_cat = Blog_Category::latest()->get();
        $blogs = Blog::find($id);

        return  view('backend.blog.edit_blog',  [

            'blog_cat'=>$blog_cat,
            'blogs'=>$blogs,

        ]);

    }

    function update_blog(Request $request){

        $blog_id =  $request->blog_id;


        if($request->blog_image == ''){

            Blog::find($blog_id)->update([
                'blog_category_id'=>$request->blog_category_id,
                'blog_title'=>$request->blog_title,
                'blog_tags'=>$request->blog_tags,
                'blog_description'=>$request->blog_description,

            ]);

            return redirect()->route('all_blog')->with('bs_up_woi','Blog updated without image!');

        }
        else{

            $present_images = Blog::find($blog_id);
            $delete_from = public_path('uploads/blog/'.$present_images->blog_image);

            if($delete_from != ''){

                unlink($delete_from);


                $blog_title = $request->blog_title;
                $image = $request->blog_image;
                $ext = $image->getClientOriginalExtension();
                $file_name =  str::lower(str_replace(' ', '-', $request->blog_title)).'-'.hexdec(uniqId()).'.'.$ext;

                Image::make($image)->save(public_path('uploads/blog/').$file_name);


                Blog::find($blog_id)->update([
                    'blog_category_id'=>$request->blog_category_id,
                    'blog_title'=>$blog_title,
                    'blog_tags'=>$request->blog_tags,
                    'blog_description'=>$request->blog_description,
                    'blog_image'=>$file_name,

                ]);

                return redirect()->route('all_blog')->with('bs_up_wi','Blog updated with image!');

            }
            else
            {


                $blog_title = $request->blog_title;
                $image = $request->blog_image;
                $ext = $image->getClientOriginalExtension();
                $file_name =  str::lower(str_replace(' ', '-', $request->blog_title)).'-'.hexdec(uniqId()).'.'.$ext;

                Image::make($image)->save(public_path('uploads/blog/').$file_name);


                Blog::find($blog_id)->update([
                    'blog_category_id'=>$request->blog_category_id,
                    'blog_title'=>$blog_title,
                    'blog_tags'=>$request->blog_tags,
                    'blog_description'=>$request->blog_description,
                    'blog_image'=>$file_name,

                ]);

                return redirect()->route('all_blog')->with('bs_up_wi','Blog updated with image!');

            }

        }

    }

    function del_blog($id){

        $present_images = Blog::find($id);
        $delete_from = public_path('uploads/blog/'.$present_images->blog_image);
        unlink($delete_from);

        Blog::find($id)->delete();

        return redirect()->route('all_blog')->with('b_del','Blog deleted successfully!');

    }


    function blog_detail($id){

        $blogs  = Blog::latest()->limit(5)->get();
        $blog_detail =  Blog::findorFail($id);
        $blog_cat = Blog_Category::latest()->limit(5)->get();

        return view('frontend.blog_details',   [
            'blogs'=>$blogs,
            'blog_detail'=> $blog_detail,
            'blog_cat'=>$blog_cat,
        ]);

    }


    function blog_cat_detail($id){

    $blog_info = Blog::where('blog_category_id', $id)->get();
    $blogs = Blog::latest()->limit(5)->get();
    $blog_cat = Blog_Category::latest()->limit(5)->get();
    $cat_name = Blog_Category::findorFail($id);


        return view('frontend.blog_cat_detail', [
            'blog_info'=>$blog_info,
            'blogs'=>$blogs,
            'blog_cat'=>$blog_cat,
            'cat_name'=>$cat_name,

        ]);


    }


    function blog(){

        $blogs =  Blog::latest()->paginate(4);
        $blog_cat =  Blog_Category::latest()->limit(6)->get();
        return view('frontend.blog', [
            'blogs'=>$blogs,
            'blog_cat'=>$blog_cat,
        ]);

    }












}

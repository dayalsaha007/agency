<?php

namespace App\Http\Controllers;

use App\Models\Blog_Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Blog_CategoryController extends Controller
{

    function add_blog_category(){

        return view('backend.blog.add_blog_category');
    }



    function all_blog_category(){

        $blog_category = Blog_category::latest()->get();
            return view('backend.blog.all_blog_category', [
                'blog_category'=>$blog_category,
            ]);
    }


    function store_blog_category(Request $request){

        $request->validate([
            'blog_category_name' => 'required',
        ]);

        Blog_Category::insert([
            'blog_category_name'=>$request->blog_category_name,
            'created_at'=>Carbon::now(),

        ]);

        return redirect()->route('all_blog_category')->with('store_bc', 'Blog category added successfully!');

    }


    function edit_blog_category($id){

        $cat_id = Blog_Category::findorFail($id);

        return view('backend.blog.edit_blog_category',  [
            'cat_id'=>$cat_id,
        ]);


    }

    function update_blog_category(Request $request){

        $cat_id =  $request->bcat_id;


        Blog_Category::find($cat_id)->Update([

            'blog_category_name'=>$request->blog_category_name,

        ]);

        return  redirect()->route('all_blog_category')->with('up_bc', 'Blog category updated successfully!');

    }

    function del_blog_category($id){

        Blog_Category::find($id)->delete();

        return  redirect()->route('all_blog_category')->with('del_bc', 'Blog category deleted successfully!');

    }

   






}

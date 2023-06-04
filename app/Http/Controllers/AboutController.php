<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Multi_Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{

    function about(){
        $about = About::find(1);
        return view('frontend.about', [
            'about'=>$about,
        ]);

    }


    function back_about(){
        $about = About::find(1);
        return view('backend.about.about', [
            'about'=>$about,
        ]);
    }

    function back_about_edit($id){

        $about_info =  About::find($id);

        return  view('backend.about.edit_about',[
            'about_info'=>$about_info,
        ]);
    }



    function update_about(Request $request){
        $about_id = $request->about_id;


        if($request->about_image  == ''){

            About::find($about_id)->update([

                'title'=>$request->title,
                'short_title'=>$request->short_title,
                'short_description'=>$request->short_description,
                'long_description'=>$request->long_description,


            ]);

            return redirect()->route('back_about')->with('a_wo_img', 'Updated About page without image');

        }
        else{

            $image_name = $request->about_image;
            $ext = $image_name->getClientOriginalExtension();
            $file_name = Auth::user()->id.'.'.$ext;

            Image::make($image_name)->save(public_path('uploads/about_image/'.$file_name));


            About::find($about_id)->update([

                'title'=>$request->title,
                'short_title'=>$request->short_title,
                'short_description'=>$request->short_description,
                'long_description'=>$request->long_description,
                'about_image'=>$file_name,

            ]);

            return redirect()->route('back_about')->with('a_img', 'Updated About page with image');

        }

    }


    function multi_image(){

        return view('backend.about.multi_image');

    }


    function multi_image_store (Request $request){

        $multi_image = $request->multi_image;

        foreach($multi_image as $multi_images){

            $ext = $multi_images->getClientOriginalExtension();
            $file_name = hexdec(uniqid()).'.'.$ext;

            Image::make($multi_images)->save(public_path('uploads/multi_image/'.$file_name));

            Multi_Image::insert([
                'multi_image'=>$file_name,
                'created_at'=>Carbon::now(),
            ]);

        }

        return redirect()->route('multi_image')->with('mi', 'Multi images inserted successfully');



    }


    function multi_image_show (){

        $multi_image = Multi_Image::all();
        return view('backend.about.multi_image_show', [
            'multi_image'=>$multi_image,
        ]);


    }

    function edit_multi_image($id){
        $single_image =  Multi_image::find($id);
        return view('backend.about.edit_multi_image', [
            'single_image'=>$single_image,
        ]);
    }


    function multi_image_update(Request $request){

        $request->validate([
                'multi_image'=>'required',
        ]);


        $single_image_id = $request->single_image_id;


        $present_images = Multi_image::find($single_image_id);
        $delete_form = public_path('uploads/multi_image/'.$present_images->multi_image);
        unlink($delete_form);


        $single_image = $request->single_image;


        $ext = $single_image->getClientOriginalExtension();
            $file_name = hexdec(uniqid()).'.'.$ext;

            Image::make($single_image)->save(public_path('uploads/multi_image/'.$file_name));

            Multi_Image::find($single_image_id)->update([
                'multi_image'=>$file_name,
                'updated_at'=>Carbon::now(),
            ]);

            return redirect()->route('multi_image_show')->with('mi_one', 'Single image updated successfully');


    }


















}

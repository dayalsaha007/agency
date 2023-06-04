<?php

namespace App\Http\Controllers;

use App\Models\Homeslide;
use App\Models\Multi_Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class IndexController extends Controller
{
    function index(){
        $home = Homeslide::find(1);
        return view('frontend.index',  [
            'home'=>$home,

        ]);

    }


    function home_slide(){

        $home_slide = Homeslide::find(1);
        return view('backend.home.home_slide', [
            'home_slide'=>$home_slide,
        ]);

    }

    function edit_home_slide ($id){


        $home_slide = Homeslide::find($id);
        return view('backend.home.edit_home_slide', [
            'home_slide'=>$home_slide,
        ]);

    }


    function update_home_slide(Request $request){
        $home_slide_id = $request->home_slide_id;


        if($request->home_slide  == ''){

            Homeslide::find($home_slide_id)->update([

                'title'=>$request->title,
                'short_title'=>$request->short_title,
                'video_url'=>$request->video_url,

            ]);

            return redirect()->route('home_slide')->with('hs_wo_img', 'Updated homeslide without image');

        }
        else{

            $image_name = $request->home_slide;
            $ext = $image_name->getClientOriginalExtension();
            $file_name = Auth::user()->id.'.'.$ext;

            Image::make($image_name)->save(public_path('uploads/home_slide/'.$file_name));


            Homeslide::find($home_slide_id)->update([

                'title'=>$request->title,
                'short_title'=>$request->short_title,
                'video_url'=>$request->video_url,
                'home_slide'=>$file_name,

            ]);

            return redirect()->route('home_slide')->with('hs_img', 'Updated homeslide with image');

        }

    }












}

<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    function footer(){

        $footer = Footer::findorFail(1);

        return view('backend.footer.footer',  [
            'footer'=>$footer,
        ]);
    }

    function update_footer(Request  $request){

        $footer_id =  $request->footer_id;

        Footer::findorFail($footer_id)->update([

            'mobile_number'=>$request->mobile_number,
            'footer_description'=>$request->footer_description,
            'country'=>$request->country,
            'address'=>$request->address,
            'email'=>$request->email,
            'social'=>$request->social,
            'social_description'=>$request->social_description,
            'facebook'=>$request->facebook,
            'instagram'=>$request->instagram,
            'linkdin'=>$request->linkdin,
            'behence'=>$request->behence,
        ]);

        return back()->with('Up_f', 'Footer updated successfully!');
    }
}

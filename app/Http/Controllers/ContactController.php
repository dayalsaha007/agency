<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ContactController extends Controller
{

    function contact(){
        return view('frontend.contact');
    }


    function back_contact(){

        $contacts = Contact::latest()->get();

        return view('backend.contact.back_contact', [
            'contacts'=>$contacts,
        ]);
    }

    function store_contact(Request $request){

        $request->validate([
            'name'=> 'required',
            'mail'=> 'required',
            'message'=> 'required',
        ]);

        Contact::insert([

            'name'=> $request->name,
            'mail'=> $request->mail,
            'subject'=> $request->subject,
            'budget'=> $request->budget,
            'message'=> $request->message,
            'created_at'=>Carbon::now(),

            ]);

    return back()->with('ins_con', 'Your Message stored successfully!');

    }


    function  del_contact($id){

        Contact::findorFail($id)->delete();

        return redirect()->route('back_contact')->with('del_con', 'Contact Deleted successfully!');

    }





}

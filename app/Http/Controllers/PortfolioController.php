<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class PortfolioController extends Controller
{

    function portfolio(){
        $portfolio = Portfolio::latest()->get();
        return view('backend.portfolio.portfolio', [
            'portfolio'=>$portfolio,
        ]);
    }

    function add_portfolio(){
        return view('backend.portfolio.add_portfolio');
    }


    function store_portfolio(Request $request){

        $request->validate([
            'portfolio_name'=> 'required',
            'portfolio_title'=> 'required',
            'portfolio_description'=> 'required',
            'portfolio_image'=> 'required',
        ],
    [
        'portfolio_name.required'=> 'Portfolio name required',

    ]);

            $portfolio_name =   $request->portfolio_name;
            $portfolio_image =   $request->portfolio_image;
            $ext = $portfolio_image->getClientOriginalExtension();
            $file_name = str::lower(str_replace('', '-', $portfolio_name)).'-'.hexdec(uniqId()).'-'.'.'.$ext;

            Image::make($portfolio_image)->save(public_path('uploads/portfolio/').$file_name);

                Portfolio::insert([
                    'portfolio_name'=>$portfolio_name,
                    'portfolio_title'=>$request->portfolio_title,
                    'portfolio_description'=>$request->portfolio_description,
                    'portfolio_image'=>$file_name,
                ]);

        return redirect()->route('portfolio')->with('portfolio', 'Portfolio added successfully!');

    }


    function edit_portfolio($id){
        $port_info = Portfolio::find($id);
        return view('backend.portfolio.edit_portfolio', [
            'port_info'=>$port_info,
        ]);
    }


    function update_portfolio(Request $request){
        $port_id = $request->port_id;


        if($request->portfolio_image == '' ){

            $portfolio_name = $request->portfolio_name;


            Portfolio::find($port_id)->update([

                'portfolio_name'=>$portfolio_name,
                    'portfolio_title'=>$request->portfolio_title,
                    'portfolio_description'=>$request->portfolio_description,

            ]);

            return redirect()->route('portfolio')->with('p_wo_i', 'Portfolio updated with out image!');

        }
        else
        {

            $find_id = Portfolio::find($port_id);
            $del_from = public_path('uploads/portfolio/'.$find_id->portfolio_image);
            unlink($del_from);


            $portfolio_name =   $request->portfolio_name;
            $portfolio_image =   $request->portfolio_image;
            $ext = $portfolio_image->getClientOriginalExtension();
            $file_name = str::lower(str_replace('', '-', $portfolio_name)).'-'.hexdec(uniqId()).'-'.'.'.$ext;

            Image::make($portfolio_image)->save(public_path('uploads/portfolio/').$file_name);



            Portfolio::find($port_id)->update([

                'portfolio_name'=>$portfolio_name,
                    'portfolio_title'=>$request->portfolio_title,
                    'portfolio_description'=>$request->portfolio_description,
                    'portfolio_image'=>$file_name,

                ]);

                return redirect()->route('portfolio')->with('p_w_i', 'Portfolio updated with image!');

        }


    }


    function  del_portfolio($id){

        $port_id = Portfolio::find($id);
        $del_from = public_path('uploads/portfolio/'.$port_id->portfolio_image);
        unlink($del_from);

        Portfolio::find($id)->delete();


        return redirect()->route('portfolio')->with('p_del', 'Portfolio deleted successfully!');

    }


    function portfolio_detail($id){

        $port = Portfolio::find($id);
        return view('frontend.portfolio_detail', [
            'port'=>$port,
        ]);

    }


    function show_portfolio(){

        $portfolios = Portfolio::latest()->limit(5)->get();

        return view('frontend.show_portfolio', [
            'portfolios'=>$portfolios,
        ]);
    }







    }












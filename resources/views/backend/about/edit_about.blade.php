
@extends('backend.dashboard_master')


@section('page_header')

  Dashboard - About

@endsection


@section('content')


<div class="row pt-5">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <p>Update About Page</p>
            </div>
            <div class="card-body">

             <form action="{{ route('update_about') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" class="form-control mt-3" name="about_id" value="{{ $about_info->id }}">
                <input type="text" class="form-control mt-1" name="title" value="{{ $about_info->title }}">
                <input type="text" class="form-control mt-1" name="short_title" value="{{ $about_info->short_title }}">
                <textarea class="form-control mt-1" name="short_description" > {{ $about_info->short_description }}"</textarea>

                <textarea class="form-control mt-1" name="long_description" > {{ $about_info->long_description }}"</textarea>

                <input type="file" class="form-control mt-1" name="about_image"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >

                <img  width="100" src="" id="blah" class="mt-2 d-block" alt="">



                <button class="btn btn-sm btn-info mt-2">Update About Page</button>

             </form>


            </div>
        </div>
    </div>



</div>











@endsection

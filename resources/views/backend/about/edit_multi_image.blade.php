@extends('backend.dashboard_master')


@section('page_header')
   Edit Multiimage
@endsection



@section('content')


    <div class="row pt-5">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <p>Multiple Image Upload</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('multi_image_update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <label class="my-1">Image</label>
                        <input type="file" name="single_image"  class="form-control my-1" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                        <input type="hidden" name="single_image_id"  value="{{ $single_image->id }}">

                        <img  width="50px"  class=" mx-1 d-block" src="{{ asset('uploads/multi_image') }}/{{ $single_image->multi_image }}" alt="" id="blah" >

                        <button type="submit" class="btn btn-info mt-2 " >Update Image</button>

                    </form>
                </div>
            </div>

        </div>
    </div>


@endsection

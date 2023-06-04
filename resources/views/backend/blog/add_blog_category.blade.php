@extends('backend.dashboard_master')


@section('page_header')

    Blog Category

@endsection



@section('content')



    <div class="row pt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <p>Add Blog Category </p>
                </div>
                <div class="card-body">

                    <form action="{{ route('store_blog_category') }}" method="POST" enctype="multipart/form-data" >
                        @csrf

                        <label>Blog Category Name</label>
                        <input type="text" name="blog_category_name" class="form-control my-1">

                        <button type="submit" class="btn btn-info mt-2" >Add Blog Category</button>

                    </form>

                </div>
            </div>
        </div>
    </div>





@endsection

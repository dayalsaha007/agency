@extends('backend.dashboard_master')


@section('page_header')
    Add Blog
@endsection



@section('content')


<div class="row pt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <p>Add Blog </p>
            </div>
            <div class="card-body">

                <form action="{{ route('store_blog') }}" method="POST" enctype="multipart/form-data" >
                    @csrf


                    <label class="my-1">Blog Category</label>
                    <select class="form-control" name="blog_category_id" >
                        <option >Please select one</option>
                        @foreach ($blog_cat_info as $bci)
                            <option  value="{{ $bci->id }}" >{{ $bci->blog_category_name }}</option>
                        @endforeach
                    </select>

                    <label class="my-1">Blog title</label>
                    <input type="text" name="blog_title" class="form-control my-1">

                    <label class="my-1">Blog Tags</label><br>
                    <input type="text" name="blog_tags" class="form-control my-1" data-role="tagsinput"><br>

                    <label class="my-1">Blog Description</label>
                    <textarea name="blog_description" id="editor" class="form-control" rows="2"></textarea>

                    <label class="my-1">Blog Image</label>
                    <input type="file" name="blog_image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >

                    <img width="100" src="" class="d-block my-2" id="blah" alt="">

                    <button type="submit" class="btn btn-info mt-2" >Add Blog</button>

                </form>

            </div>
        </div>
    </div>
</div>


@endsection

@section('footer_script')

    <script>

        ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );

    </script>




@endsection

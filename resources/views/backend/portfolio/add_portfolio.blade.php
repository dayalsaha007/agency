@extends('backend.dashboard_master')

@section('page_header')
    Add Portfolio
@endsection


@section('content')
    <div class="row pt-5">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <p>All Portfolio</p>
                </div>
                <div class="card-body">

                    <form action="{{ route('store_portfolio') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label class="my-1">Portfolio Name</label>
                        <input type="text" name="portfolio_name" class="form-control my-1">

                        <label class="my-1">Portfolio Title</label>
                        <input type="text" name="portfolio_title" class="form-control my-1">

                        <label class="my-1">Portfolio Description</label>
                        <textarea id="editor" name="portfolio_description" class="my-1 form-control"  cols="30" rows="10"></textarea>


                        <label class="my-1">Portfolio Image</label>
                        <input type="file" name="portfolio_image" class="form-control my-1" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >

                        <img width="100" src="" class="mt-2 d-block" id="blah" alt="">


                        <button class="btn btn-info mt-2">Store Portfolio</button>

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

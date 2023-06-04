@extends('backend.dashboard_master')

@section('page_header')
    Portfolio
@endsection


@section('content')


    <div class="row pt-5">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <p>All Portfolio</p>
                </div>
                <div class="card-body">

                    <form action="{{ route('update_portfolio') }}" method="post" enctype="multipart/form-data">
                        @csrf


                        <input type="hidden" name="port_id"  value="{{ $port_info->id }}" >

                        <label class="my-1">Portfolio Name</label>
                        <input type="text" name="portfolio_name"  value="{{ $port_info->portfolio_name }}" class="form-control my-1">

                        <label class="my-1">Portfolio Title</label>
                        <input type="text" name="portfolio_title" value="{{ $port_info->portfolio_title }}"  class="form-control my-1">

                        <label class="my-1">Portfolio Description</label>
                        <textarea id="editor" name="portfolio_description" class="my-1 form-control"  cols="30" rows="10">{{ $port_info->portfolio_description }}</textarea>


                        <label class="my-1">Portfolio Image</label>
                        <input type="file" name="portfolio_image" class="form-control my-1" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >

                        <img width="100" src="{{ asset('uploads/portfolio') }}/{{ $port_info->portfolio_image }}" class="mt-2 d-block" id="blah" alt="">


                        <button class="btn btn-info mt-2">Store Portfolio</button>

                    </form>

                </div>
            </div>
        </div>
    </div>



@endsection


@section('footer_script')

    <script>

        @if(Session::has ('portfolio'))
            toastr.success("{{ Session::get('portfolio') }}");
        @endif

    </script>


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

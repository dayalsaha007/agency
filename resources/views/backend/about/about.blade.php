
@extends('backend.dashboard_master')


@section('page_header')

  Dashboard - About

@endsection


@section('content')


<div class="row pt-5">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <p>About Page</p>
            </div>
            <div class="card-body">


                <input type="text" class="form-control mt-3" name="title" value="{{ $about->title }}">
                <input type="text" class="form-control my-2" name="short_title" value="{{ $about->short_title }}">
                <textarea id="editor" class="form-control mt-1" name="short_description" > {{ $about->short_description }}"</textarea>

                <textarea id="second" class="form-control mt-3" name="long_description" > {{ $about->long_description }}"</textarea>



                <img width="100" class="d-block mt-3" src="{{ asset('uploads/about_image') }}/{{ $about->about_image }}" alt="">

                <a href="{{ route('back_about_edit', $about->id) }}" class="btn btn-sm btn-info mt-2">Edit About Page</a>


            </div>
        </div>
    </div>



</div>











@endsection

@section('footer_script')

<script>

    @if(Session::has('a_wo_img'))
        toastr.success("{{ Session::get('a_wo_img') }}");
    @endif

    @if(Session::has('a_img'))
    toastr.success("{{ Session::get('a_img') }}");
@endif

        ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );


        ClassicEditor
        .create( document.querySelector( '#second' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );

</script>


@endsection

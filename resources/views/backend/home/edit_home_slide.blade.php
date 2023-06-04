@extends('backend.dashboard_master')


@section('page_header')
    Dashboard - Homeslide
@endsection


@section('content')
    <div class="row pt-5">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <p>Home Slide</p>
                </div>
                <div class="card-body">

            <form action="{{ route('update_home_slide') }}" method="POST"  enctype="multipart/form-data">
                @csrf

                    <input type="hidden" class="form-control mt-3" name="home_slide_id" value="{{ $home_slide->id }}">
                    <input type="text" class="form-control mt-3" name="title" value="{{ $home_slide->title }}">
                    <input type="text" class="form-control mt-1" name="short_title"
                        value="{{ $home_slide->short_title }}">
                    <input type="text" class="form-control mt-1" name="video_url" value="{{ $home_slide->video_url }}">
                    <input type="file" class="form-control mt-1" name="home_slide" value=""
                        onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                    <img width="100" class="d-block mt-2" src="" id="blah" alt="">

                    <button href="{{ route('update_home_slide') }}" class="btn btn-sm btn-info mt-2">Update Home Slide</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer_script')
    <script>
        @if (Session::has('up_pwop'))
            toastr.success("{{ Session::get('up_pwop') }}");
        @endif
    </script>
@endsection

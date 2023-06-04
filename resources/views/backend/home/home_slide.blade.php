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

                    <input type="text" class="form-control mt-3" name="title" value="{{ $home_slide->title }}">
                    <input type="text" class="form-control mt-1" name="short_title" value="{{ $home_slide->short_title }}">
                    <input type="text" class="form-control mt-1" name="video_url" value="{{ $home_slide->video_url }}">

                    <img src="{{ asset('uploads/homeslide') }}/{{ $home_slide->home_slide }}" alt="">

                    <a href="{{ route('edit_home_slide', $home_slide->id) }}" class="btn btn-sm btn-info mt-2">Edit Home Slide</a>


                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p>Home Slide View</p>
                </div>
                <div class="card-body">



                 <div class="table-responsive">
                        <table id="example" class="table table-bordered" >

                            <thead>
                                <tr>

                                    <th>Title</th>
                                    <th>Short title</th>
                                    <th>video url</th>
                                    <th>Img</th>

                                </tr>
                            </thead>
                                <tr>
                                    <td>{{ $home_slide->title }}</td>
                                    <td>{{ $home_slide->short_title }}</td>
                                    <td>{{ $home_slide->video_url }}</td>
                                    <td>
                                        <img width="50" src="{{ asset('uploads/home_slide') }}/{{ $home_slide->home_slide }}" alt="">
                                    </td>
                                </tr>
                            <tbody>
                                <tr></tr>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>


   </div>





@endsection


@section('footer_script')

<script>

    @if(Session::has('hs_wo_img'))
        toastr.success("{{ Session::get('hs_wo_img') }}");
    @endif

    @if(Session::has('hs_img'))
        toastr.info("{{ Session::get('hs_img') }}");
    @endif


    $(document).ready(function(){
        $('#example').DataTable();
        });


</script>


@endsection

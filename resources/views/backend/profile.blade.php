@extends('backend.dashboard_master')


@section('page_header')

  Dashboard - profile

@endsection


@section('content')


   <div class="row pt-5">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <p>Admin Profile</p>
                </div>
                <div class="card-body">


                    @if(Auth::user()->profile_image == '')
                    <img src="{{ asset('backend_asset') }}/dist/img/user2-160x160.jpg"
                    class="img-circle elevation-2" alt="User Image">
                    @else
                        <img width="100" src="{{ asset('uploads/profile_image') }}/{{ Auth::user()->profile_image }}" alt="">
                    @endif


                    <input type="text" class="form-control mt-3" name="name" value="{{ Auth::user()->name }}">
                    <input type="text" class="form-control mt-1" name="name" value="{{ Auth::user()->email }}">
                    <a href="{{ route('profile_edit', $user_info) }}" class="btn btn-sm btn-info mt-2">Edit Profile</a>




                </div>
            </div>
        </div>
   </div>





@endsection


@section('footer_script')

<script>

    @if(Session::has('up_pwop'))
        toastr.success("{{ Session::get('up_pwop') }}");
    @endif

    @if(Session::has('up_pwp'))
        toastr.info("{{ Session::get('up_pwp') }}");
    @endif

    @if(Session::has('dmatch'))
        toastr.success("{{ Session::get('dmatch') }}");
    @endif

    @if(Session::has('up_profile'))
        toastr.success("{{ Session::get('up_profile') }}");
    @endif

    @if(Session::has('image_up'))
        toastr.success("{{ Session::get('image_up') }}");
    @endif

</script>


@endsection

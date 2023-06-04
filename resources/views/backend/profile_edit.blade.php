@extends('backend.dashboard_master')


@section('page_header')
    profile
@endsection


@section('content')
    <div class="row pt-5">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <p>Edit Admin Profile</p>
                </div>
                <div class="card-body">

                    <form action="{{ route('update_profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                            <input type="hidden" name="user_id"  value="{{ $user_info->id }}" >
                        <input type="text" class="form-control mt-3" name="name" value="{{ Auth::user()->name }}">
                        <input type="text" class="form-control mt-2" name="email" value="{{ Auth::user()->email }}">

                        <input type="password" class="form-control mt-2" placeholder="old_password"  name="old_password" >
                        <input type="password" class="form-control mt-2" placeholder="new_password" name="new_password" >

                        <input type="file" name="profile_image" class="form-control mt-2" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >

                        <img width="100" src="" id="blah" class="my-2 d-block" alt="">

                        <button class="btn btn-sm btn-info mt-2">update Profile</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

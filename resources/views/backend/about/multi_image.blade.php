@extends('backend.dashboard_master')


@section('page_header')
    Multiimage
@endsection



@section('content')
    <div class="row pt-5">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <p>Multiple Image Upload</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('multi_image_store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <label class="my-1">Multi Image</label>
                        <input type="file" name="multi_image[]" multiple="" class="form-control my-1" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                        <img  width="50px"  class=" mx-1 d-block" src=""  id="blah" alt="">

                        <button type="submit" class="btn btn-info mt-2 " >Insert Multiple Image</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection




@section('footer_script')

<script>

    @if(Session::has('mi'))
        toastr.success("{{ Session::get('mi') }}");
    @endif



</script>



@endsection

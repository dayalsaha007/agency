@extends('backend.dashboard_master')



@section('page_header')

    Footer | Dayal Saha

@endsection



@section('content')


<div class="row pt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <p>Update Footer </p>
            </div>
            <div class="card-body">

                <form action="{{ route('update_footer') }}" method="POST" enctype="multipart/form-data" >
                    @csrf


                    <input type="hidden" name="footer_id" value="{{ $footer->id }}" class="form-control value="" ">

                    <label class="my-1">Mobile Number</label>
                    <input type="text" name="mobile_number" value="{{ $footer->mobile_number }}" class="form-control my-1">

                    <label class="my-1">Footer Description</label>
                    <textarea name="footer_description" id="editor" class="form-control" rows="2">{{ $footer->footer_description }}</textarea>

                    <label class="my-1">Country</label>
                    <input type="text" name="country"  value="{{ $footer->country }}" class="form-control my-1">

                    <label class="my-1">Address</label>
                    <input type="text" name="address" value="{{ $footer->address }}" class="form-control my-1">

                    <label class="my-1">Email</label>
                    <input type="email" name="email" value="{{ $footer->email }}" class="form-control my-1">

                    <label class="my-1">Social</label>
                    <input type="text" name="social" value="{{ $footer->social }}" class="form-control my-1">

                    <label class="my-1">Social Description</label>
                    <textarea name="social_description" id="social" class="form-control" rows="2">{{ $footer->social_description}}</textarea>


                    <label class="my-1">facebook</label>
                    <input type="text" name="facebook" value="{{ $footer->facebook }}" class="form-control my-1">

                    <label class="my-1">Instagram</label>
                    <input type="text" name="instagram" value="{{ $footer->instagram }}" class="form-control my-1">

                    <label class="my-1">linkdind</label>
                    <input type="text" name="linkdin" value="{{ $footer->linkdin }}" class="form-control my-1">

                    <label class="my-1">Behence</label>
                    <input type="text" name="behence" value="{{ $footer->behence }}" class="form-control my-1">


                    <button type="submit" class="btn btn-info mt-2" >Update Footer</button>

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

    ClassicEditor
    .create( document.querySelector( '#social' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );


    @if(Session::has('Up_f'))
        toastr.success("{{ Session::get('Up_f') }}");
    @endif




</script>



@endsection

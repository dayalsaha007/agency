@extends('backend.dashboard_master')





@section('content')



@endsection



@section('footer_script')

<script>

    @if(Session::has('ad_login'))
        toastr.success("{{ Session::get('ad_login') }}");
    @endif

</script>

@endsection

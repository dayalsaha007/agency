


@section('footer_script')

<script>

    @if(Session::has('ad_logout'))
    toastr.danger("{{ Session::get('ad_logout') }}");
    @endif

</script>

@endsection

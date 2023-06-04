@extends('backend.dashboard_master')


@section('page_header')
    Multiimage
@endsection



@section('content')



        <div class="row pt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <p>Multiple Image Show</p>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="example" class="table table-bordered" >

                               <thead>
                                    <tr>
                                        <td>Sr.no</td>
                                        <td>Img</td>
                                        <td>Action</td>
                                    </tr>
                               </thead>

                                @php($i = 1)
                              @foreach ($multi_image as $multi_images)
                                  <tbody>
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                         <img width="50px" height="40px" src="{{ asset('uploads/multi_image') }}/{{ $multi_images->multi_image }}" alt="">
                                        </td>
                                        <td>
                                        <a href="{{ route('edit_multi_image', $multi_images->id) }}" class="btn-sm btn-info"><i class="far fa-edit"></i></a>
                                            <a href="" class="btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                 </tbody>
                             @endforeach

                            </table>
                        </div>

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

    @if(Session::has('mi_one'))
        toastr.success("{{ Session::get('mi_one') }}");
    @endif

    $(document).ready(function () {
        $('#example').DataTable();
    });



</script>


@endsection

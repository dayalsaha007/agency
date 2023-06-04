@extends('backend.dashboard_master')

@section('page_header')
    Portfolio
@endsection


@section('content')
    <div class="row pt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p>All Portfolio</p>
                </div>
                <div class="card-body">

                    <table id="example" class="table table-bordered" >

                        <thead>
                            <tr>
                                <th>Sr.no</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @php($i = 1)
                           @foreach ($portfolio as $portfol)
                             <tr>
                                 <td>{{ $i++ }}</td>
                                 <td>{{ $portfol->portfolio_name }}</td>
                                 <td>{{ $portfol->portfolio_title }}</td>
                                 <td>
                                    <img width="70px" src="{{ asset('uploads/portfolio') }}/{{ $portfol->portfolio_image }}" alt="">
                                 </td>
                                 <td>

                        <a href="{{ route('edit_portfolio', $portfol->id) }}" class="btn-sm btn-info"><i class="far fa-edit"></i></a>

                        <a href="{{ route('del_portfolio', $portfol->id) }}" class="btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>

                                 </td>
                             </tr>
                           @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer_script')

    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });


        @if(Session::has ('portfolio'))
            toastr.success("{{ Session::get('portfolio') }}");
        @endif

        @if(Session::has ('p_wo_i'))
                    toastr.success("{{ Session::get('p_wo_i') }}");
                @endif

        @if(Session::has ('p_w_i'))
                    toastr.success("{{ Session::get('p_w_i') }}");
                @endif

                @if(Session::has ('p_del'))
                    toastr.success("{{ Session::get('p_del') }}");
                @endif


    </script>

@endsection

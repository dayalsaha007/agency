@extends('backend.dashboard_master')


@section('page_header')
    All Blog Category
@endsection



@section('content')
    <div class="row pt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p>All Blog Category Name</p>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered">

                        <thead>
                            <tr>
                                <th>sr.no</th>
                                <th>Blog category name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        @php
                            $i = 1;
                        @endphp

                        <tbody>
                               @foreach ($blog_category as $b_c)
                                 <tr>
                                     <td>{{ $i++ }}</td>
                                     <td>{{ $b_c->blog_category_name }}</td>
                                      <td>
                                         <a href="{{ route('edit_blog_category', $b_c->id) }}" class="btn btn-sm btn-info" ><i class="fas fa-edit"></i></a>

                                         <a href="{{ route('del_blog_category', $b_c->id) }}" class="btn btn-sm btn-danger" ><i class="fas fa-trash-alt"></i></a>
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

    @if(Session::has('store_bc'))
        toastr.success("{{ Session::get('store_bc') }}");
    @endif

    @if(Session::has('up_bc'))
        toastr.success("{{ Session::get('up_bc') }}");
    @endif

    @if(Session::has('del_bc'))
        toastr.success("{{ Session::get('del_bc') }}");
    @endif



</script>


<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

</script>


@endsection

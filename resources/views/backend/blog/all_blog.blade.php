@extends('backend.dashboard_master')


@section('page_header')
    All Blog
@endsection



@section('content')
    <div class="row pt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p>All Blog</p>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered">

                        <thead>
                            <tr>
                                <th>sr.no</th>
                                <th>Blog Category</th>
                                <th>Blog Title</th>

                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        @php
                            $i = 1;
                        @endphp

                        <tbody>

                           @foreach ($blog as $blo)
                             <tr>
                                 <td>{{ $i++ }}</td>
                                 <td>{{ $blo['rel_to_blog_cat']['blog_category_name'] }}</td>
                                 <td>{{ $blo->blog_title }}</td>

                                 <td>
                                    <img width="100" src="{{ asset('uploads/blog') }}/{{ $blo->blog_image }}" alt="">
                                 </td>
                                 <td>
                                     <a href="{{ route('edit_blog',$blo->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>

                                     <a href="{{ route('del_blog',$blo->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>


    <script>

        @if(Session::has('bs_wi'))
            toastr.success("{{ Session::get('bs_wi') }}");
        @endif

        @if(Session::has('bs_woi'))
        toastr.success("{{ Session::get('bs_woi') }}");
        @endif

        @if(Session::has('bs_up_woi'))
        toastr.success("{{ Session::get('bs_up_woi') }}");
        @endif

        @if(Session::has('bs_up_wi'))
        toastr.success("{{ Session::get('bs_up_wi') }}");
        @endif

        @if(Session::has('b_del'))
        toastr.success("{{ Session::get('b_del') }}");
        @endif

    </script>


@endsection

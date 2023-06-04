@extends('backend.dashboard_master')

@section('page_header')
    Contact | Dayal Saha
@endsection


@section('content')


    <div class="row pt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p>All Contacts</p>
                </div>
                <div class="card-body">

                    <table class="table table-bordered" id="contact" >
                            <thead>
                                    <tr>
                                        <th>sr.no</th>
                                        <th>Name</th>
                                        <th>mail</th>
                                        <th>subject</th>
                                        <th>budget</th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                            </thead>

                            <tbody>
                                    @foreach ($contacts as $dall=>$contact)
                                        <tr>
                                            <td>{{ $dall+1 }}</td>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->mail }}</td>
                                            <td>{{ $contact->subject }}</td>
                                            <td>{{ $contact->budget }}</td>
                                            <td>

                                                <a href="{{ route('del_contact', $contact->id ) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>

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
        $('#contact').DataTable();
    });

    @if(Session::has('del_con'))
        toastr.success("{{ Session::get('del_con') }}");
    @endif

</script>


@endsection


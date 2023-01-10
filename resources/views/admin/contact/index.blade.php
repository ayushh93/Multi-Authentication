@extends('admin.layout.admin')
@section('title')
    Contact Messages - {{ $site->title }}
@endsection
@section('main-content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Contact Messages</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Contact Messages</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <!-- HTML (DOM) sourced data  Starts-->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3>Contact Messages</h3>
                        </div>
                        @include('admin.layout.includes.message')
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="data-source-1" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>email</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->phone_number }}</td>
                                                <td>{{$contact->email}}</td>
                                                <td>
                                                    <input data-id="{{ $contact->id }}" class="toggle-class"
                                                        type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                        data-toggle="toggle" data-on="Read" data-off="Unread"
                                                        {{ $contact->status ? 'checked' : '' }}>
                                                </td>
                                                <td>{{ Carbon\Carbon::parse($contact->created_at)->format('Y-m-d') }}</td>
                                                <td class="d-flex">
                                                    {{-- view data --}}
                                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#view_content{{ $contact->id }}"
                                                        style="margin-right: 2px">
                                                        <i class="fa fa-eye"></i>
                                                    </button>

                                                    {{-- delete data --}}
                                                    <form action="{{ route('admin.contact.destroy', $contact->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" id="confirm_delete"
                                                            class="btn btn-danger confirm_delete"
                                                            data-name="{{ $contact->name }}">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <!-- Add Department Modal -->
                                            <div id="view_content{{ $contact->id }}" class="modal fade" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Contact Details</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>Name:</strong>{{ $contact->name }}
                                                            </p>
                                                            <p><strong>Phone Number:</strong>{{ $contact->phone_number }}
                                                            </p>
                                                            <p><strong>Email:</strong>
                                                                {{ $contact->email }}
                                                            </p>
                                
                                                            <p><strong>Date:</strong>{{ Carbon\Carbon::parse($contact->created_at)->format('Y-m-d') }}
                                                            </p>
                                                            <p><strong>Message: </strong>
                                                            </p>
                                                            <p style="border: 1px solid grey;">
                                                                {{ $contact->message }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Company</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.confirm_delete').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete ${name}?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var contact_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/admin/contact-status/update',
                    data: {
                        'status': status,
                        'contact_id': contact_id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        });
    </script>
@endsection

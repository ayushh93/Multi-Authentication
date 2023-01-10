@extends('admin.layout.admin')
@section('title')
    Category - {{ $site->title }}
@endsection
@section('main-content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Categories</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Categories</li>
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
                            <h3>Categories</h3>
                            <a class="btn btn-primary cart-btn-transform pull-right"
                                href="{{ route('admin.package.categories.create') }}">Add Category</a>
                        </div>
                        @include('admin.layout.includes.message')
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="data-source-1" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Title</th>
                                            <th>Featured on menu?</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($categories)
                                            @foreach ($categories as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $item->title }}</td>
                                                    <td> {{ $item->featured == 1 ? 'Featured' : 'Not featured' }}</td>
                                                    <td class="d-flex">
                                                        {{-- edit data --}}
                                                        <a href="{{ route('admin.package.categories.edit', $item->id) }}">
                                                            <button class="btn btn-success btn-sm" style="margin-left: 2px">
                                                                <i class="fa fa-pencil"></i>
                                                            </button>
                                                        </a>
                                                        @if ($item->id != 1 && $item->id != 2)
                                                            {{-- delete data --}}
                                                            <form
                                                                action="{{ route('admin.package.categories.destroy', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" id="confirm_delete"
                                                                    class="btn btn-danger confirm_delete"
                                                                    style="margin-left: 2px" data-name="{{ $item->title }}">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Title</th>
                                            <th>Featured on menu?</th>
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
@endsection

@extends('admin.layout.admin')
@section('title')
    Privacy Policy - {{ $site->title }}
@endsection
@section('main-content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Privacy Policy</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Privacy Policy</li>
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
                            <h3>Privacy Policy</h3>
                            <a class="btn btn-primary cart-btn-transform pull-right"
                                href="{{ route('admin.privacypolicy.create') }}">Add Privacy Policy</a>
                        </div>
                        @include('admin.layout.includes.message')
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="data-source-1" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Title</th>
                                            <th>Excerpt</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($data)
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $item->title }}</td>
                                               <td> {!!$item->excerpt!!}</td>
                                                <td class="d-flex">
                                                     {{-- edit data --}}
                                                    <a href="{{ route('admin.privacypolicy.edit', $item->id) }}">
                                                        <button class="btn btn-success btn-sm" style="margin-left: 2px">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                    </a>
                                                    {{-- delete data --}}
                                                    <form action="{{ route('admin.privacypolicy.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" id="confirm_delete"
                                                            class="btn btn-danger confirm_delete" style="margin-left: 2px" data-name="{{ $item->title }}">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endisset
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Title</th>
                                            <th>Excerpt</th>
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
    var form =  $(this).closest("form");
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
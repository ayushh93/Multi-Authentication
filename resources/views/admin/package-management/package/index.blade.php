@extends('admin.layout.admin')
@section('title')
    Packages - {{ $site->title }}
@endsection
@section('main-content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Packages</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Packages</li>
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
                            <h3>Packages</h3>
                            <a class="btn btn-primary cart-btn-transform pull-right"
                                href="{{ route('admin.package.packages.create') }}">Add Package</a>
                        </div>
                        @include('admin.layout.includes.message')
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="data-source-1" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Package</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($packages as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->subcategory->category->title }}</td>
                                                <td>{{ $item->subcategory->title }}</td>
                                                <td class="d-flex">
                                                    <a href="{{route('admin.package.packages.edit', $item->id)}}" style="margin-right: 3px">
                                                        <button class="btn btn-success btn-sm">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                        </a>
                                                        <form action="{{ route('admin.package.packages.destroy', $item->id) }}"
                                                            method="POST" style="margin-right: 2px">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" id="confirm_delete"
                                                                class="btn btn-danger confirm_delete" 
                                                                data-name="{{ $item->title }}">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 0.3rem">
                                                          More
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                          
                                                          <a class="dropdown-item" href="{{route('admin.package.itinerary',$item->id)}}">Itinerary</a>
                                                          <a class="dropdown-item" href="{{route('admin.package.recommendedgears',$item->id)}}">Recommended Gears</a>
                                                          <a class="dropdown-item" href="{{route('admin.package.costdetail',$item->id)}}">Cost Details</a>
                                                          <a class="dropdown-item" href="{{route('admin.package.costdescription',$item->id)}}">Cost Description</a>
                                                          <a class="dropdown-item" href="{{route('admin.package.addgallery',$item->id)}}">Gallery</a>
                                                        </div>
                                                      </div>
                                                     
                                                    {{-- <a href="javascript:"class="dropdrop">Dropdown</a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Package</th>
                                            <th> Category</th>
                                            <th>Sub Category</th>
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

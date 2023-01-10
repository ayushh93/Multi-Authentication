@extends('admin.layout.admin')
@section('title')
    Package Gallery
@endsection
@section('main-content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Package Gallery</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        data-feather="home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('admin.package.packages.index') }}">Packages</a></li>

                            <li class="breadcrumb-item active">Package Gallery</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Add Package Images</h5>
                            <div class="row pt-4">
                                <div class="col-md-7">
                                    <ul class="package-details-list">
                                        <li>Package: <span class="package-name">{{ $package->title }}</span></li>
                                        <li>Category: <span class="category-name">
                                                @if (!empty($package->subcategory->category))
                                                    {{ $package->subcategory->category->title }}
                                                @else
                                                    Uncategorised
                                                @endif
                                            </span>
                                        </li>
                                        <li>Category: <span class="category-name">
                                                @if (!empty($package->subcategory))
                                                    {{ $package->subcategory->title }}
                                                @else
                                                    Uncategorised
                                                @endif
                                            </span></li>
                                    </ul>
                                </div>
                                <div class="col-md-5">
                                    @if (!empty($package->image))
                                        <img src="{{ asset('uploads/package/images/' . $package->image) }}"
                                            alt="Package Image" class="img-fluid">
                                    @else
                                        <img src="{{ asset('uploads/default/noimg.png') }}" alt="Package Image"
                                            class="img-fluid">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <form class="form theme-form" method="post" action="{{ route('admin.package.storegallery') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="image">Image</label>
                                            <div class="inner-form">
                                                <input class="form-control w-50" id="image-input" name="image[]"
                                                    type="file" accept="image/*" multiple="multiple">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="{{$package->id}}" name="package_id">
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <input class="btn btn-light" type="reset" value="Cancel">
                                </div>
                        </form>
                        <hr>
                        @include('admin.layout.includes.message')
                        <div class="card-body">
                            <div class="card-header">
                                <h3>Gallery</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="display" id="data-source-1" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($images as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td><img src="{{ asset('uploads/package/gallery/' . $item->image) }}"
                                                        width="70px" height="80px" alt=""></td>
                                                <td> {{-- delete data --}}
                                                    <form action="{{ route('admin.package.deletegallery', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" id="confirm_delete"
                                                            class="btn btn-danger confirm_delete" style="margin-left: 2px"
                                                            data-name="this image">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
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

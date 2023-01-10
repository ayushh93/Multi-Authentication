@extends('admin.layout.admin')
@section('title')
    Recommended Gears - {{ $site->title }}
@endsection
@section('main-content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3> Recommended Gears</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        data-feather="home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('admin.package.packages.index') }}">Packages</a></li>
                            <li class="breadcrumb-item active"> Recommended Gears</li>
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
                            <h5>Add  Recommended Gears</h5>
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
                        <form class="form theme-form" method="post" action="{{ route('admin.package.updaterecommendedgears',$gear->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @include('admin.layout.includes.message')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="gearlist">Recommended Gears<span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" name="gearlist" id="gearlist" cols="30" rows="10" placeholder="List the recommended gears here">{!! old('gearlist',$gear->gearlist) !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="{{$package->id}}" name="package_id">
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                    <input class="btn btn-light" type="reset" value="Cancel">
                                </div>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    </div>
@endsection
@section('js')

<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#gearlist'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection

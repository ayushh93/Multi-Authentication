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
                            <li class="breadcrumb-item"><a href="{{ route('admin.package.packages.index') }}">Packages</a>
                            </li>
                            <li class="breadcrumb-item">Add</li>
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
                            <h5>Add Package</h5>
                        </div>
                        @include('admin.layout.includes.message')
                        <form class="form theme-form" method="post" action="{{ route('admin.package.packages.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label>Select category</label>
                                            <select type="text" name="subcategory_id" class="form-control" required>
                                                <option value="" selected disabled>Select Category</option>
                                                @if ($categories)
                                                    @foreach ($categories as $category)
                                                        <?php $dash = ''; ?>
                                                        <option value="" disabled>
                                                            <span class="font-weight-bold">{{ $category->title }}</span>
                                                        </option>
                                                        @if (count($category->subcategory))
                                                            <?php
                                                            $subcategories = $category->subcategory;
                                                            $dash .= '-- ';
                                                            ?>
                                                            @foreach ($subcategories as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('subcategory_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $dash }}{{ $item->title }}</option>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Title <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="title" type="text" placeholder="Title"
                                                id="title" value="{{ old('title') }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="duration">Duration <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="duration" type="text"
                                                placeholder="Duration (Eg:5night/6days)" id="duration"
                                                value="{{ old('duration') }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="season">Season <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="season" type="text"
                                                placeholder="Preferred Season" id="season"
                                                value="{{ old('season') }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="accomodation">Accomodation <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="accomodation" type="text"
                                                placeholder="Accomodation (Eg:Hotel/Homestay/Tent)" id="accomodation"
                                                value="{{ old('accomodation') }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="elevation">Max Elevation <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="elevation" type="text"
                                                placeholder="Elevation (Eg:8848m/29030ft)" id="elevation"
                                                value="{{ old('elevation') }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Select Difficulty level</label>
                                            <select type="text" name="difficulty" class="form-control" required>
                                                <option value="" selected disabled>Select Difficulty level</option>
                                                <option value="Easy" {{ old('difficulty') == "Easy" ? "selected" : "" }}>Easy</option>
                                                <option value="Moderate" {{ old('difficulty') == "Moderate" ? "selected" : "" }}>Moderate</option>
                                                <option value="Challenging" {{ old('difficulty') == "Challenging" ? "selected" : "" }}>Challenging</option>
                                               
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="group_size">Group Size <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="group_size" type="text" id="group_size"
                                                placeholder="Group size (Eg:5-15 people)" value="{{ old('group_size') }}"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="description">Description <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" name="description" id="description" cols="30" rows="10"
                                                placeholder="Write description about the package">{!! old('description') !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="image1">Image<span
                                                    class="text-danger">*</span></label>
                                            <div class="inner-form">
                                                <input class="form-control w-80" id="image-input" name="image1"
                                                    type="file" accept="image/*" onchange="readURL1(this);" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {{-- display image1 on upload --}}
                                        <img src="" class="display-img" alt="" srcset=""
                                            id="img-change1" width="100%">
                                        <div class="col-md-4">

                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="map">Map Image</label><span
                                                class="text-danger">*</span>
                                            <div class="inner-form">
                                                <input class="form-control w-80" id="image-input" name="map"
                                                    type="file" accept="image/*" onchange="readURL2(this);" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {{-- display map on upload --}}
                                        <img src="" class="display-img" alt="" srcset=""
                                            id="img-change2" width="100%">
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <input class="btn btn-light" type="reset" value="Cancel">
                                </div>
                        </form>
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
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img-change1')
                        .attr('src', e.target.result)
                        .width(200)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img-change2')
                        .attr('src', e.target.result)
                        .width(200)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

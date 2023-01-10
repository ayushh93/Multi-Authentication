@extends('admin.layout.admin')
@section('title')
    Reviews
@endsection
@section('main-content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Reviews</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.about.reviews.index') }}">Reviews</a></li>
                            <li class="breadcrumb-item">Edit</li>
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
                            <h5>Edit Review</h5>
                        </div>
                        @include('admin.layout.includes.message')
                        <form class="form theme-form" method="post" action="{{ route('admin.about.reviews.update',$review->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="name">Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="name" type="text" placeholder="Enter full name"
                                                id="name" value="{{ old('name',$review->name) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="excerpt">Excerpt<span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" name="excerpt" id="excerpt" cols="30" rows="10"
                                                placeholder="Write your excerpt here">{!! old('excerpt',$review->excerpt) !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="image">Image<span
                                                    class="text-danger">*</span></label>
                                            <div class="inner-form">
                                                <input class="form-control w-80" id="image-input" name="image"
                                                    type="file" accept="image/*" onchange="readURL1(this);">
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-md-6">
                                        {{-- display image1 on upload --}}
                                <img src="{{ asset('uploads/about/reviews/'.$review->image) }}" class="display-img" alt="" srcset="" id="img-change1" width="50%">
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
            .create(document.querySelector('#excerpt'))
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

@endsection

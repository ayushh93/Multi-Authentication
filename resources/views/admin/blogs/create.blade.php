@extends('admin.layout.admin')
@section('title')
    Blogs - {{ $site->title }}
@endsection
@section('main-content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Blogs</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}">Blogs</a></li>
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
                        <form class="form theme-form" method="post" action="{{ route('admin.blogs.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Title <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="title" type="text" placeholder="Title"
                                                id="title" value="{{ old('title') }}">
                                        </div> 
                                        <div class="mb-3">
                                            <label class="form-label" for="author">Author <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="author" type="text" placeholder="Author"
                                                id="author" value="{{ old('author') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="date">Date <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="date" type="date"
                                                id="date" max="{{date("Y-m-d")}}" value="{{ old('date') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="blog">Blog <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" name="blog" id="blog" cols="30" rows="10"
                                                placeholder="Write your blog here">{!! old('blog') !!}</textarea>
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
                                                    type="file" accept="image/*" onchange="readURL1(this);">
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
                                            <label class="form-label" for="image2">2nd Image</label>
                                            <div class="inner-form">
                                                <input class="form-control w-80" id="image-input" name="image2"
                                                    type="file" accept="image/*" onchange="readURL2(this);">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                         {{-- display image2 on upload --}}
                                         <img src="" class="display-img" alt="" srcset=""
                                         id="img-change2" width="100%">
                                    </div>
                                </div>
                                {{-- section 1 --}}
                                <div class="row mb-5">
                                    <h4>Section 1</h4>
                                    <hr>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta_keyword">Meta Keyword<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="meta_keyword" type="text"
                                                placeholder="Meta-Keyword" value="{{ old('meta_keyword') }}" >
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="meta_description">Meta Description <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" name="meta_description" id="meta_description" cols="30" rows="10"
                                                placeholder="Enter Meta Description" >{!! old('meta_description') !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                {{-- section 2 --}}
                                <div class="row mb-5">
                                    <h4>Section 2</h4>
                                    <hr>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="blog_url">Blog Url</label>
                                            <input class="form-control" name="blog_url" type="url"
                                                placeholder="Blog URL" value="{{ old('blog_url') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="meta_description">Blog Description </label>
                                            <textarea class="form-control" name="blog_description" id="blog_description" cols="30" rows="10"
                                                placeholder="Enter Blog Description">{!! old('blog_description') !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                {{-- section 3 --}}
                                <div class="row mb-5">
                                    <h4>Section 3</h4>
                                    <hr>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="twitter_url">Twitter Url</label>
                                            <input class="form-control" name="twitter_url" type="url"
                                                placeholder="Twitter URL" value="{{ old('twitter_url') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="meta_description">Twitter Description </label>
                                            <textarea class="form-control" name="twitter_description" id="twitter_description" cols="30" rows="10"
                                                placeholder="Enter Twitter Description">{!! old('twitter_description') !!}</textarea>
                                        </div>
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
            .create(document.querySelector('#blog'))
            .catch(error => {
                console.error(error);
            });
    </script>
    {{-- <script>
        ClassicEditor
            .create(document.querySelector('#meta_description'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#blog_description'))
            .catch(error => {
                console.error(error);
            });
    </script>
     <script>
        ClassicEditor
            .create(document.querySelector('#twitter_description'))
            .catch(error => {
                console.error(error);
            });
    </script> --}}

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

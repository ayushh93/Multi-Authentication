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
                        <li class="breadcrumb-item active">Add</li>
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
                        <h5>Add Privacy Policy</h5>
                    </div>
                    @include('admin.layout.includes.message')
                    <form class="form theme-form" method="post"
                        action="{{ route('admin.privacypolicy.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="title">Title</label>
                                        <input class="form-control" name="title" type="text" placeholder="Title"
                                            value="{{ old('title') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="excerpt">Description <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" name="excerpt" id="excerpt" cols="30" rows="10" placeholder="Write your description here" required>{!! old('excerpt') !!}</textarea>
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
        .create(document.querySelector('#excerpt'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
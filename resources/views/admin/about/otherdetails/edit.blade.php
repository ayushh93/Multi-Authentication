@extends('admin.layout.admin')
@section('title')
    Other Details - {{ $site->title }}
@endsection
@section('main-content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Other Details</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.about.otherdetails.index') }}">Other
                                    Details</a></li>
                            <li class="breadcrumb-item active">Edit</li>
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
                            <h5>Edit Other Details</h5>
                        </div>
                        @include('admin.layout.includes.message')
                        <form class="form theme-form" method="post"
                            action="{{ route('admin.about.otherdetails.update', $other->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mb-3">
                                            <div class="col-md-6 col-sm-6">
                                                <label class="form-label" for="title1">Title</label><span
                                                    class="text-danger">*</span>
                                                <input class="form-control" name="title1" type="text"
                                                    placeholder="Title" value="{{ $other->title1 }}" required>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label class="form-label" for="value1">Value</label><span
                                                    class="text-danger">*</span>
                                                <input class="form-control" name="value1" type="text"
                                                    placeholder="Value" value="{{ $other->value1 }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6 col-sm-6">
                                                <label class="form-label" for="title2">Title</label><span
                                                    class="text-danger">*</span>
                                                <input class="form-control" name="title2" type="text"
                                                    placeholder="Title" value="{{ $other->title2 }}" required>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label class="form-label" for="value2">Value</label><span
                                                    class="text-danger">*</span>
                                                <input class="form-control" name="value2" type="text"
                                                    placeholder="Value" value="{{ $other->value2 }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6 col-sm-6">
                                                <label class="form-label" for="title3">Title</label><span
                                                    class="text-danger">*</span>
                                                <input class="form-control" name="title3" type="text"
                                                    placeholder="Title" value="{{ $other->title3 }}" required>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label class="form-label" for="value3">Value</label><span
                                                    class="text-danger">*</span>
                                                <input class="form-control" name="value3" type="text"
                                                    placeholder="Value" value="{{ $other->value3 }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">Update</button>
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
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

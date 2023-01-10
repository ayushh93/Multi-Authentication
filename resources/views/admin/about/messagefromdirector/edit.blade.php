@extends('admin.layout.admin')
@section('title')
    Message from director - {{ $site->title }}
@endsection
@section('main-content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Message from director</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.about.messagefromdirector.index') }}">Message from director</a></li>
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
                            <h5>Edit Message from director</h5>
                        </div>
                        @include('admin.layout.includes.message')
                        <form class="form theme-form" method="post" action="{{ route('admin.about.messagefromdirector.update', $message->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Title</label><span class="text-danger">*</span>
                                            <input class="form-control" name="title" type="text" placeholder="Title"
                                                value="{{ $message->title }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="description">Description</label><span class="text-danger">*</span>
                                            <textarea class="form-control" name="description" id="description" cols="30" rows="10" required>{!! $message->description !!}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="image1">Image</label>
                                            <div class="inner-form">
                                                <input class="form-control w-50" id="image-input" name="image1"
                                                    type="file" accept="image/*" onchange="readURL1(this);" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        {{-- display image on upload --}}
                                        @if (!empty($message->image))
                                            <img src="{{ asset('uploads/about/messagefromdirector/'.$message->image) }}" class="display-img"
                                                alt="" srcset="" width="100%" id="img-change1">
                                        @else
                                            <img src="{{ asset('uploads/default/noimg.png') }}" class="display-img"
                                                alt="" srcset="" width="100%" id="img-change1">
                                        @endif
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
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
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

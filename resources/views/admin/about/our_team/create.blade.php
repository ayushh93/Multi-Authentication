@extends('admin.layout.admin')
@section('title')
Our Team - {{ $site->title }}
@endsection
@section('main-content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Our Team</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.about.ourteam.index') }}"> Our Team </a></li>
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
                            <h5>Add Team Member</h5>
                        </div>
                        @include('admin.layout.includes.message')
                        <form class="form theme-form" method="post" action="{{ route('admin.about.ourteam.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="name">Name</label>
                                            <input class="form-control" name="name" type="text" placeholder="Name"
                                                value="{{ old('name') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="designation">Designation</label>
                                            <input class="form-control" name="designation" type="text" placeholder="Designation"
                                                value="{{ old('designation') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="facebook_link">Facebook link</label>
                                            <input class="form-control" name="facebook_link" type="url"
                                                placeholder="https://www.facebook.com/link"
                                                value="{{ old('facebook_link')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="instagram_link">Instagram link</label>
                                            <input class="form-control" name="instagram_link" type="url"
                                                placeholder="https://www.instagram.com/link"
                                                value="{{ old('instagram_link')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="twitter_link">Twitter link</label>
                                            <input class="form-control" name="twitter_link" type="url"
                                                placeholder="https://www.twitter.com/link"
                                                value="{{ old('twitter_link')}}">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="image">Image</label>
                                            <div class="inner-form">
                                                <input class="form-control w-25" id="image-input" name="image"
                                                    type="file" accept="image/*" onchange="readURL(this);" required>
                                                {{-- display image on upload --}}
                                                <img src="" class="display-img" 
                                                    id="img-change">
                                            </div>

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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img-change')
                        .attr('src', e.target.result)
                        .width(100)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

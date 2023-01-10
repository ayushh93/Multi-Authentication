@extends('admin.layout.admin')
@section('title')
    Categories - {{ $site->title }}
@endsection
@section('main-content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Categories</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.package.categories.index') }}"> Categories </a></li>
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
                            <h5>Edit Category</h5>
                        </div>
                        @include('admin.layout.includes.message')
                        <form class="form theme-form" method="post"
                            action="{{ route('admin.package.categories.update', $category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Title</label>
                                            <input class="form-control" name="title" type="text" placeholder="Title"
                                                value="{{ old('title', $category->title) }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <div class="form-check checkbox checkbox-primary mb-0">
                                                <input class="form-check-input" id="checkbox-primary-1" name="featured" type="checkbox"
                                                    {{($category->featured == 1) ? "checked" : null}}>
                                                <label class="form-check-label" for="checkbox-primary-1">Display on
                                                    menu</label>
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

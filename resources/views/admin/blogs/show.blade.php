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
                            <li class="breadcrumb-item">{{$blog->title}}</li>
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
                        <div class="card-header d-flex justify-content-between">
                            <h3>Blog</h3>
                            <div>
                            <a class="btn btn-primary cart-btn-transform mr-3"
                    href="{{ route('admin.blogs.edit',$blog->id)}}" style="margin-right: 2px">Edit</a>
                </div>
                        </div>
                        @include('admin.layout.includes.message')
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <ul class="list-group">
                                        <li class="list-group-item">Title:&nbsp {{$blog->title}}</li>
                                        <li class="list-group-item">Author:&nbsp {{$blog->author}}</li>
                                        <li class="list-group-item">Published Date:&nbsp {{$blog->date}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <img src="{{ asset('uploads/blogs/'.$blog->image1) }}" alt="" width="100%"
                                        srcset="">
                                </div>
                                <div class="col-md-6">
                                    @isset($blog->image2)
                                    <img src="{{ asset('uploads/blogs/'.$blog->image2) }}" alt="" width="100%"
                                        srcset="">
                                    @endisset
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <h3>Blog</h3>
                                    <div class="border p-2">
                                    <p>{!!$blog->blog!!}</p>
                                </div>
                                </div>
                            </div>
                            {{-- section 1 --}}
                            <div class="row mb-5">
                                <h4>Meta content</h4>\
                                <hr>
                                <div class="col-md-12">
                                    <ul class="list-group">
                                        <li class="list-group-item">Meta Keyword:&nbsp {{$blog->meta_keyword}}</li>
                                        <li class="list-group-item">Meta Description:&nbsp<p>{!!$blog->meta_description!!}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @isset($blog)
                            {{-- section 2 --}}
                            <div class="row mb-3">
                                <h4>OG Content</h4>
                                <hr>
                                <div class="col-md-12">
                                    <ul class="list-group">
                                        <li class="list-group-item">Blog URL:&nbsp {{$blog->blog_url}}</li>
                                        <li class="list-group-item">Blog Description:&nbsp<p>{!!$blog->blog_description!!}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            {{-- section 2 --}}
                            <div class="row">
                                <h4>Twitter Content</h4>
                                <hr>
                                <div class="col-md-12">
                                    <ul class="list-group">
                                        <li class="list-group-item">Twitter URL:&nbsp {{$blog->twitter_url}}</li>
                                        <li class="list-group-item">Twitter Description:&nbsp<p>{!!$blog->twitter_description!!}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection

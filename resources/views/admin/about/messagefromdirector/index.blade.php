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
                            <li class="breadcrumb-item">Message from director</li>
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
                            <h3>Message from director</h3>
                            <a class="btn btn-primary cart-btn-transform pull-right"
                    href="{{ route('admin.about.messagefromdirector.edit',$message->id)}}">Edit</a>
                        </div>
                        @include('admin.layout.includes.message')
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <ul class="list-group">
                                        <li class="list-group-item">Title:&nbsp {{$message->title}}</li>
                                        <li class="list-group-item">Description:&nbsp<p>{!!$message->description!!}</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('uploads/about/messagefromdirector/'.$message->image) }}" alt="" width="100%"
                                        srcset="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection

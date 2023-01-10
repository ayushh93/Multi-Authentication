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
                            <li class="breadcrumb-item">Other Details</li>
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
                            <h3>Other Details</h3>
                            <a class="btn btn-primary cart-btn-transform pull-right"
                                href="{{ route('admin.about.otherdetails.edit', $other->id) }}">Edit</a>
                        </div>
                        @include('admin.layout.includes.message')
                        <div class="card-body">
                            <div class="card-block row">
                                <div class="col-sm-12 col-lg-12 col-xl-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $other->title1 }}</td>
                                                    <td>{{ $other->value1 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $other->title2 }}</td>
                                                    <td>{{ $other->value2 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $other->title3 }}</td>
                                                    <td>{{ $other->value3 }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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

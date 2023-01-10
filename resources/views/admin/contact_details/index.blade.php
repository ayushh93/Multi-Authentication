@extends('admin.layout.admin')
@section('title')
    Contact Detail
@endsection
@section('main-content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3> Contact Detail </h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"> Contact Detail </li>
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
                            <h3>Contact Detail </h3>
                            <a class="btn btn-primary cart-btn-transform pull-right"
                                href="{{ route('admin.contactdetail.edit', $contact->id) }}">Edit</a>
                        </div>
                        @include('admin.layout.includes.message')
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">Email:&nbsp{{ $contact->email }}</li>
                                <li class="list-group-item">Address:&nbsp{{ $contact->address }}</li>
                                <li class="list-group-item">Contact number:&nbsp{{ $contact->contact_number }}</li>
                                <li class="list-group-item">Facebook Link:&nbsp{{ $contact->facebook_link }}</li>
                                <li class="list-group-item">Instagram Link:&nbsp{{ $contact->instagram_link }}</li>
                                <li class="list-group-item">Twitter Link:&nbsp{{ $contact->twitter_link }}</li>
                                <li class="list-group-item">Youtube Link:&nbsp{{ $contact->youtube_link }}</li>
                                <li class="list-group-item">Map link:&nbsp{{ $contact->map }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection

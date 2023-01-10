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
                            <li class="breadcrumb-item"> <a href="{{ route('admin.contactdetail.index') }}">Contact
                                    Detail</a> </li>
                            <li class="breadcrumb-item active"> Edit </li>
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
                            <h5>Edit Site Setting</h5>
                        </div>
                        @include('admin.layout.includes.message')
                        <form class="form theme-form" method="post"
                            action="{{ route('admin.contactdetail.update', $contact->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <input class="form-control" name="email" type="email"
                                                placeholder="email@email.com" value="{{ old('email', $contact->email) }}"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="address">Address</label>
                                            <input class="form-control" name="address" type="text" placeholder="Address"
                                                value="{{ old('address', $contact->address) }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="contact_number">Contact number</label>
                                            <input class="form-control" name="contact_number" type="tel"
                                                placeholder="contact number"
                                                value="{{ old('contact_number', $contact->contact_number) }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="facebook_link">Facebook link</label>
                                            <input class="form-control" name="facebook_link" type="url"
                                                placeholder="https://www.facebook.com/link"
                                                value="{{ old('facebook_link', $contact->facebook_link) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="instagram_link">Instagram link</label>
                                            <input class="form-control" name="instagram_link" type="url"
                                                placeholder="https://www.instagram.com/link"
                                                value="{{ old('instagram_link', $contact->instagram_link) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="twitter_link">Twitter link</label>
                                            <input class="form-control" name="twitter_link" type="url"
                                                placeholder="https://www.twitter.com/link"
                                                value="{{ old('twitter_link', $contact->twitter_link) }}">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="youtube_link">Youtube link</label>
                                            <input class="form-control" name="youtube_link" type="url"
                                                placeholder="https://www.youtube.com/link"
                                                value="{{ old('youtube_link', $contact->youtube_link) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="map">Map link</label>
                                            <input class="form-control" name="map" type="url"
                                                placeholder="https://www.instagram.com/link"
                                                value="{{ old('map', $contact->map) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                    <input class="btn btn-light" type="reset" value="Cancel">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection

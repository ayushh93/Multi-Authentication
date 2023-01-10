@extends('frontend.layouts.frontend2')
@section('title')
Who are we
@endsection

@section('main-content')
<div class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="about-us-image">
                    <img src="{{asset('uploads/about/whoarewe/'.$whoarewe->image)}}" alt="About Us" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="about-us-text">
                    <h5>{{$whoarewe->title}}</h5>
                    <p>{!!$whoarewe->description!!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
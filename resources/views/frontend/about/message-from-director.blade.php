@extends('frontend.layouts.frontend2')
@section('title')
Message from director
@endsection

@section('main-content')
<!--ABOUT US-->
<div class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="about-us-image">
                    <img src="{{asset('uploads/about/messagefromdirector/'.$message->image)}}" alt="About Us" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="about-us-text">
                    <h5>{{$message->title}}</h5>
                    <p>{!!$message->description!!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
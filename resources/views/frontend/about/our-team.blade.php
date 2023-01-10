@extends('frontend.layouts.frontend2')
@section('title')
Our Team
@endsection

@section('main-content')
<section class="section-padding">
    <div class="container">
        <div class="main-title text-center">
            <h2>OUR TEAMS</h2>
        </div>
        <div class="row">
            @foreach ($ourteam as $item)
            <div class="col-lg-4 col-md-4">
                <div class="team-member">
                    <div class="member-image">
                        <img src="{{asset('uploads/about/our_team/'.$item->image)}}" alt="Member Image" class="img-fluid">
                    </div>
                    <h5 class="member-name text-center mt-3">{{$item->name}}</h5>
                    <h6 class="member-position text-center mt-3">{{$item->designation}}</h6>
                    <ul class="member-social d-flex justify-content-around mt-3">
                        <li><a href="{{$item->facebook_link}}" target="__blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{$item->instagram_link}}" target="__blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="{{$item->twitter_link}}" target="__blank"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
</section>
@endsection
@extends('frontend.layouts.frontend2')
@section('title')
{{$package->title}}
@endsection
@section('main-content')
<section class="section-padding">
    <div class="container">
        <div class="travel-detail">
            <div class="main-title">
                <h2>{{$package->title}}</h2>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="package-img">
                        <div class="owl-carousel owl-theme">
                            @foreach ($package->gallery as $item)
                            <div class="item">
                                <img src="{{asset('uploads/package/gallery/'.$item->image)}}" alt="Itineary Image" class="img-fluid">
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">OVERVIEW</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">ITINERARY</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="cost-tab" data-toggle="tab" href="#cost" role="tab"
                                aria-controls="cost" aria-selected="false">COST DESCRIPTION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="map-tab" data-toggle="tab" href="#map" role="tab"
                                aria-controls="map" aria-selected="false">MAP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="photos-tab" data-toggle="tab" href="#photos" role="tab"
                                aria-controls="photos" aria-selected="false">COST DETAILS</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="place-detail">
                                <p>{!!$package->description!!}</p>
                            </div>
                           
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="outline">
                                <h4 class="mb-3">Detail Itinerary</h4>
                                <ul>
                                    @foreach ($itinerary as $data)
                                    <li class="li-none">
                                        <div class="row">
                                            <div class="col-lg-2 ">
                                                <div class="day-number">
                                                    <span class="day mr-3">Day: {{$data->day}}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-10">
                                                <div class="day-details">
                                                    <p>{{$data->excerpt}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade cost-amount" id="cost" role="tabpanel" aria-labelledby="cost-tab">
                            <div class="row">
                                <div class="col-lg-6  cost-include-heading">
                                    <h4>Cost Includes</h4>
                                    <p>{!!$costdescription->includes!!}</p>
                                </div>
                                <div class="col-lg-6  cost-exclude-heading">
                                    <h4>Cost Excludes</h4>
                                    <p>{!!$costdescription->excludes!!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">
                            <div class="outline">
                                <h4 class="mb-3">Map</h4>
                                <div class="map-image">
                                    <a data-fancybox="gallery" href="{{asset('uploads/package/maps/'.$package->map)}}">
                                    <div class="map-image">
                                        <img class="img-fluid"
                                            src="{{asset('uploads/package/maps/'.$package->map)}}" alt="Map Image">
                                    </div>
                                </a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="photos-tab">
                            <div class="gallery-title mt-4">
                                <h4>COST DETAILS</h4>
                            </div>
                            <div class="cost-list mt-5">
                                <ul>
                                    @foreach ($costdetails as $cost)
                                    @php
                                    $allcost[] = $cost->cost ;
                                    @endphp
                                    <li>{{$cost->from}} person to {{$cost->to}} person: USD {{$cost->cost}}</li>
                                    @endforeach
                                </ul>
                                @php
                                if(isset($allcost))
                                {
                                    $maxcost = max($allcost);
                                    $mincost = min($allcost);
                                }
                                else {
                                    $maxcost = "";
                                    $mincost = "";
                                }
                                @endphp
                            </div>
                        </div>
                    </div>
                    <div class="trip-booking d-flex align-items-center">
                        <div class="book-button mr-4 mt-5 mb-5">
                            <a href="book-a-trip.php" class="btn-1">Book This Trip</a>
                        </div>
                        <div class="book-button mt-5 mb-5">
                            <button class="btn-1 inquiry-button" data-toggle="modal" data-target="#exampleModal">Inquiry</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tour-information">
                        <p class="days-nights">{{$package->duration}}</p>
                        <h3><b>{{$package->elevation}}</b> </h3>
                        <div class="d-flex">
                            <div class="tour-operator mt-3  mr-3">
                                <p class="title  mb-0">Group size:</p>
                                <p>{{$package->group_size}}</p>
                            </div>
                            <div class="age mt-3 ">
                                <p class="title mb-0">Accomodation :</p>
                                <p>{{$package->accomodation}}</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="tour mr-3">
                                <p class="title mb-0">Difficulty :</p>
                                <p>{{$package->difficulty}}</p>

                            </div>
                            <div class="group-size">
                                <p class="title mb-0">Season:</p>
                                <p>{{$package->season}}</p>
                            </div>
                        </div>
                        <br>
                        <div class="tour-price">
                            <p class="mb-2">Starting From <s>USD {{$maxcost}}</s> </p>
                            <span class="Money"> USD {{$mincost}}/PER PERSON</span>
                        </div>
                    </div>
                    <div class="card recommended-gears">
                        <h4 class="mb-3">Recommended Gears:</h4>
                        {!!$package->recommendedgears->gearlist!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@extends('frontend.layouts.frontend')

@section('title')
    {{ $site->title }}
@endsection
@section('main-content')
    <!--DESTINATIONS-->
    <div class="section-padding">
        <div class="container">
            <div class="main-title text-center destination">
                <h2 class="mb-0">OUR POULAR TREKKING DESTINATIONS</h2>
            </div>
            <div class="row">
                @php
                    foreach ($trekking->subcategory as $subcategory1) {
                        foreach ($subcategory1->package as $trekpackage) {
                            $package1[] = $trekpackage;
                        }
                    }
                @endphp
                @foreach ($package1 as $item1)
                    <div class="col-lg-3 col-md-4">
                        <div class="destination-box" data-aos="fade-up">
                            <div class="destination-image">
                                <img src="{{ asset('uploads/package/images/' . $item1->image) }}" alt="Destination Image"
                                    class="img-fluid">
                                <div class="destination-overlay"></div>
                                <div class="destination-info">
                                    <h2><a href="{{ route('packagesingle', $item1->id) }}">{{ $item1->title }}</a></h2>
                                    <h5>{{ $item1->subcategory->title }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <!--
                        <div class="text-center">
                            <a href="#" class="hvr-icon-forward about-us-more">
                                Know More
                                <i class="fa fa-chevron-circle-right hvr-icon"></i>
                            </a>
                        </div> -->
        </div>
    </div>
    <!--COUNTERS-->
    <section class="counter">
        <div class="counter-overlay"></div>
        <div class="container">
            <div id="projectFacts" class="sectionClass">
                <div class="fullWidth eight columns">
                    <div class="projectFactsWrap ">
                        <div class="item-count" data-number="12" style="visibility: visible;">
                            <p id="number1" class="number">{{ $otherdetails->value1 }}</p>
                            <p>{{ $otherdetails->title1 }}</p>
                        </div>
                        <div class="item-count" data-number="55" style="visibility: visible;">
                            <p id="number2" class="number">{{ $otherdetails->value1 }}</p>
                            <p>{{ $otherdetails->title2 }}</p>
                        </div>
                        <div class="item-count" data-number="359" style="visibility: visible;">
                            <p id="number3" class="number">{{ $otherdetails->value1 }}</p>
                            <p>{{ $otherdetails->title3 }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--MORE ADVENTURE-->
    <div class="section-padding">
        <div class="container">
            <div class="main-title text-center adventure">
                <h2>SOME OF OUR BEST SELLING EXPEDITIONS</h2>
            </div>
            @php
                foreach ($expeditions->subcategory as $subcategory2) {
                    foreach ($subcategory2->package as $expepackage) {
                        $package2[] = $expepackage;
                    }
                }
            @endphp
            <div class="row">
                @foreach ($package2 as $item2)
                    @if (isset($item2->costdetail))
                        @foreach ($item2->costdetail as $cost)
                            @php
                                $allcost[] = $cost->cost;
                            @endphp
                        @endforeach
                    @endif
                    @php
                        if (isset($allcost)) {
                            $maxcost = max($allcost);
                            $mincost = min($allcost);
                        } else {
                            $maxcost = '';
                            $mincost = '';
                        }
                    @endphp

                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('packagesingle', $item2->id) }}">
                            <div class="adventure-box" data-aos="fade-up">
                                <div class="adventure-image">
                                    <img src="{{ asset('uploads/package/images/' . $item2->image) }}" alt="Adventure Image"
                                        class="img-fluid">
                                </div>
                                <h6 class="adventure-name"><a href="{{ route('packagesingle', $item2->id) }}">{{ $item2->title }} -
                                        {{ $item2->elevation }}</a>
                                </h6>
                                <div class="d-flex justify-content-between trek-info">
                                    <p><i class="fa-solid fa-location-dot"></i>{{ $item2->difficulty }}</p>
                                    <p><i class="fa-solid fa-user"></i>{{ $item2->group_size }}</p>
                                </div>
                                <div class="d-flex justify-content-between trek-cost align-items-center">
                                    <p>Starting At <br>USD {{ $mincost }}</p>
                                    <a href="{{ route('packagesingle', $item2->id) }}"
                                        class="hvr-icon-forward explore-adventure">
                                        Explore More
                                        <i class="fa fa-chevron-circle-right hvr-icon"></i>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--ABOUT US-->
    <div class="section-padding alternate-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-us-image">
                        <img src="{{ asset('uploads/about/whoarewe/' . $whoarewe->image) }}" alt="About Us"
                            class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-us-text">
                        <h5>{{ $whoarewe->title }}</h5>
                        <p>{!! $whoarewe->description !!}
                        </p>
                        <a href="{{ route('about.whoarewe') }}" class="hvr-icon-forward about-us-more">
                            Know More
                            <i class="fa fa-chevron-circle-right hvr-icon"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--TRUSTED BY-->
    <section class="trusted-by-section">
        <div class="container">
            <div class="main-title text-center">
                <h2>OUR VALUABLE CLIENTS</h2>
            </div>
            <div class="owl-carousel owl-theme trusted-by">
                @foreach ($clients as $item)
                    <div class="item">
                        <div class="partners-wrapper">
                            <img src="{{ asset('uploads/clients/' . $item->image) }}" alt="Trusted by" class="img-fluid">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="section-padding newsletter alternate-bg">
        <div class="container">
            <div class="main-title text-center newsletter-heading">
                <h2>SUBSCRIBE TO OUR NEWSLETTER</h2>
            </div>
            <div class="text-center newsletter-form">
                <form action="">
                    <input type="email" placeholder="Enter Your Email" name="email">
                    <a href="javascript:">SUBSCRIBE</a>
                </form>
            </div>
        </div>
    </div>
@endsection

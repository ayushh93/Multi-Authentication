@extends('frontend.layouts.frontend2')
@section('title')
Reviews
@endsection

@section('main-content')
<section class="review">
    <div class="container">
    <div class="main-title text-center">
            <h2>REVIEWS</h2>
        </div>
    </div>
    <div class="testimonials-carousel-wrap"><!-- 
        <div class="listing-carousel-button listing-carousel-button-next"><i class="fa fa-caret-right"></i></div>
        <div class="listing-carousel-button listing-carousel-button-prev"><i class="fa fa-caret-left"></i></div> -->
        <div class="testimonials-carousel">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($reviews as $item)
                    <div class="swiper-slide">
                        <div class="testi-item">
                            <div class="testi-avatar"><img src="{{asset('uploads/about/reviews/'.$item->image)}}" alt=""></div>
                            <div class="testimonials-text-before"><i class="fa fa-quote-right"></i></div>
                            <div class="testimonials-text">
                                <div class="listing-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>{!!$item->excerpt!!}
                                </p>
                                <a href="#" class="text-link"></a>
                                <div class="testimonials-avatar">
                                    <h3>{{$item->name}}</h3>
                                </div>
                            </div>
                            <div class="testimonials-text-after"><i class="fa fa-quote-left"></i></div>
                        </div>
                    </div>
                    @endforeach
                    

                </div>
            </div>
        </div>

        <div class="tc-pagination"></div>
    </div>
</section>
@endsection
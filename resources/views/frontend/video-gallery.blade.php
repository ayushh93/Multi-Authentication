@extends('frontend.layouts.frontend2')
@section('title')
Video Gallery
@endsection

@section('main-content')
<section class="section-padding">
    <div class="container">
        <div class="main-title">
            <h2>VIDEO GALLERY</h2>
        </div>
        <div class="card-columns mt-5">
            @foreach ($videogallery as $item)
            <a data-fancybox="gallery" href="{{asset('uploads/gallery/video/'.$item->video)}}">
                <div class="card-main mb-4">
                    <video width="320" height="240" controls>
                        <source src="{{asset('uploads/gallery/video/'.$item->video)}}" type="video/mp4">
                      Your browser does not support the video tag.
                      </video>
                </div>
            </a>
            @endforeach
            
        </div>
    </div>
</section>
@endsection
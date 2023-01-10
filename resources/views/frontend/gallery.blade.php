@extends('frontend.layouts.frontend2')
@section('title')
Gallery
@endsection

@section('main-content')
<section class="section-padding">
    <div class="container">
        <div class="main-title">
            <h2>PHOTO GALLERY</h2>
        </div>
        <div class="card-columns mt-5">
            @foreach ($gallery as $item)
            <a data-fancybox="gallery" href="{{asset('uploads/gallery/'.$item->image)}}">
                <div class="card-main mb-4">
                    <img class="card-img lazy-image" src="{{asset('uploads/gallery/'.$item->image)}}" alt="Card image cap">
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
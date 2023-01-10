@extends('frontend.layouts.frontend2')
@section('title')
Company Documents
@endsection

@section('main-content')
<section class="section-padding product-gallery" id="homeGallery">
    <div class="container">
        <div class="main-title text-center">
            <h2>COMPANY DOCUMENTS</h2>
        </div>
        <div class="row">
            @foreach ($documents as $item)
            <div class="col-lg-4 col-md-4">
                <a href="{{asset('uploads/about/documents/'.$item->image)}}" data-fancybox="gallery">
                    <div class="document-image">
                        <img src="{{asset('uploads/about/documents/'.$item->image)}}" alt="Image">
                        <div class="document-overlay"></div>
                        <div class="document-name">
                            <h5>{{$item->title}}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            
        </div>
    </div>
</section>
@endsection
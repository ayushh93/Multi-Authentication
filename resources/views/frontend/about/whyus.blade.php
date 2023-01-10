@extends('frontend.layouts.frontend2')
@section('title')
Why us
@endsection

@section('main-content')
<div class="section-padding">
    <div class="container">
    <div class="main-title text-center">
            <h2>WHY US?</h2>
        </div>
      <div class="row">
        @foreach ($whyus as $item)
        <div class="col-lg-4 col-sm-6">
          <div class="item-box"> <span class="icon feature_box_col_one icon-image"> <img src="{{asset('uploads/about/whyus/'.$item->image)}}" alt="Image"></span>
            <h6>{{$item->title}}</h6>
            <p>{{$item->excerpt}}</p>
          </div>
        </div>
        @endforeach
        
      </div>
    </div>
  </div>
@endsection
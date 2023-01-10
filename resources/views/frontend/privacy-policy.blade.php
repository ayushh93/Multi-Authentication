@extends('frontend.layouts.frontend2')
@section('title')
Privacy Policy
@endsection

@section('main-content')
<section class="section-padding">
    <div class="container">
        <div class="main-title text-center">
            <h2>PRIVACY POLICY</h2>
        </div>
        <div class="privacy-policy-terms-conditions">
            @foreach ($data as $item)
            <h6>{{$item->title}}</h6>
            <p>{!!$item->excerpt!!}</p>
            @endforeach
        </div>
    </div>
</section>
@endsection
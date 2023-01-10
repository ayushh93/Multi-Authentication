@extends('frontend.layouts.frontend2')
@section('title')
Blogs
@endsection

@section('main-content')
<!--BLOGS-->
<section class="blogs-section">
    <div class="container">
        <div class="main-title text-center">
            <h2>BLOGS</h2>
        </div>
        <div class="blog-post">
            <div class="row">
                @foreach ($blogs as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-post-area">
                        <div class="blog-image">
                            <img src="{{asset('uploads/blogs/'.$item->image1)}}" alt="Blog Image">
                        </div>
                        <h6 class="blog-title"><a href="{{route('blogsingle',$item->slug)}}">{{$item->title}}</a></h6>
                        <div class="info-blog d-flex align-items-center">
                            <div class="blog-writer">
                                <i class="fa-solid fa-user"></i>
                                <span>{{$item->author}}</span>
                            </div>
                            <div class="blog-date">
                                <span><i class="fa-solid fa-calendar-days"></i>{{ Carbon\Carbon::parse($item->date)->format('d M Y') }}</span>
                            </div>
                        </div>
                        <p>{!! Str::limit($item->blog, 200) !!}</p>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</section>
@endsection
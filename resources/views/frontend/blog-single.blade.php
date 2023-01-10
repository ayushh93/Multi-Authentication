@extends('frontend.layouts.frontend2')
@section('title')
Blogs
@endsection
@section('meta')
<meta name="{{$blog->meta_keyword}}" content="{!!$blog->meta_description!!}">
<meta property="og:title" content="{{$blog->title}}" />
<meta property="og:url" content="{{$blog->blog_url}}">
<meta property="og:description" content="{!!$blog->blog_description!!}">
<meta name="twitter:site" content="{{$blog->twitter_url}}" />
<meta name="twitter:card" content="{!!$blog->twitter_description!!}" />
@endsection
@section('main-content')
    
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0"
    nonce="BEq9WYgd"></script>
<section class="blog-post section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-text-area border">
                    <h1 class="h3 blog-header">{{$blog->title}}</h1>
                    <div class="blog-main-image">
                        <img src="{{asset('uploads/blogs/'.$blog->image1)}}" alt="Blog Main Image" class="img-fluid">
                    </div>
                    <p> {!!$blog->blog!!} </p>
                        <div class="sub-image-blog">
                            <img src="{{asset('uploads/blogs/'.$blog->image2)}}" alt="Sub Image Blog" class="img-fluid">
                        </div>
                        <div class="addthis_inline_share_toolbox_vnvs"></div>
                        <div class="facebook-comments">
                            <div class="fb-comments"
                                data-href="https://developers.facebook.com/docs/plugins/comments#configurator"
                                data-width="" data-numposts="5"></div>
                        </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-sidebar border">
                    <div class="sidebar-heading latest-blogs-sidebar heading-40 mt-3">
                        <h5>LATEST BLOGS</h5>
                        <ul>
                            @foreach ($blogs as $item)
                            <li class="list-group-item"><a href="{{route('blogsingle',$item->slug)}}">{{$item->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
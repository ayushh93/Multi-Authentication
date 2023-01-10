@php
    $categories = DB::table('categories')
        ->where('featured', 1)
        ->orderBy('title', 'ASC')
        ->get();
@endphp

<nav class="main-navbar">
    <div class="wrapper">
        <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('uploads/logo/' . $site->logo) }}" alt="Logo"
                    class="img-fluid"></a>
        </div>
        <input type="radio" name="slider" id="menu-btn">
        <input type="radio" name="slider" id="close-btn">
        <ul class="nav-links">
            <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
            <li><a href="{{ route('home') }}" class="hvr-underline-from-center">Home</a></li>
            <li>
                <a href="#" class="desktop-item hvr-underline-from-center">About Us<i
                        class="fas fa-chevron-down navbardrop-icon"></i></a>
                <input type="checkbox" id="showDrop">
                <label for="showDrop" class="mobile-item">About Us<i
                        class="fas fa-chevron-down navbardrop-icon"></i></label>
                <ul class="drop-menu">
                    <li><a href="{{ route('about.whyus') }}">Why Us?</a></li>
                    <li><a href="{{ route('about.message') }}">Message from the Director</a></li>
                    <li><a href="{{ route('about.whoarewe') }}">Who are we?</a></li>
                    <li><a href="{{ route('about.ourteam') }}">Our Team</a></li>
                    <li><a href="{{ route('about.reviews') }}">Reviews</a></li>
                    <li><a href="{{ route('about.documents') }}">Documents</a></li>
                </ul>
            </li>
            @foreach ($categories as $category)
            <li>
                <!--DESKTOP-->
                <a href="#" class="desktop-item hvr-underline-from-center">{{$category->title}}<i
                        class="fas fa-chevron-down navbardrop-icon"></i></a>
                <input type="checkbox" id="showMega">
                <!--MOBILE MENU-->
                <label for="showMega" class="mobile-item">{{$category->title}}<i
                        class="fas fa-chevron-down navbardrop-icon"></i></label>
                <div class="mega-box">
                    <div class="content">
                        <div class="row-25">
                            <h4 class="no-mobile">{{$category->title}}</h4>
                              @php
                              $subcategories = DB::table('subcategories')->where('category_id',$category->id)->orderBy('title', 'ASC')->get();
                              @endphp
                            <!--SIDE LIST STARTS-->
                            <ul class="nav nav-pills flex-column mega-links">
                                @php
                                 $count = 0 ;
                                 @endphp
                                @foreach ($subcategories as $subcategory)
                                @php
                                 $count++ ;
                                 @endphp
                                <li class="nav-item">
                                    <a class="nav-link port-inner-link {{ ($count == 1) ? 'active' : null }}" data-toggle="pill" href="#{{$subcategory->title}}"
                                        role="tab" aria-controls="pills-all" aria-selected="true">{{$subcategory->title}} </a>
                                </li>
                                @endforeach
                                
                            </ul>
                            {{-- SIDE LIST STARTS --}}
                        </div>
                        <!--SIDE KO CLICK GARDA KHULNE MENU WHICH HAS PHOTO-->
                        <div class="row-full no-mobile">
                            <div class="tab-content mt-3">
                                @php
                                 $count = 0 ;
                                 @endphp
                                @foreach ($subcategories as $subcategory)
                                 @php
                                 $count++;
                                 @endphp
                                <div class="tab-pane fade show {{ $count == 1 ? 'active' : null}}" id="{{$subcategory->title}}" role="tabpanel"
                                    aria-labelledby="all-tab">
                                    @php
                                    $packages = DB::table('packages')->where('subcategory_id',$subcategory->id)->orderBy('title', 'ASC')->get();
                                    @endphp
                                    <div class="row">
                                        @foreach ($packages as $item)
                                        <div class="col-lg-4 col-md-4">
                                            <div class="navbar-image">
                                                <a href="{{route('packagesingle',$item->id)}}">
                                                    <img src="{{asset('uploads/package/images/'.$item->image)}}" alt="Navbar Image"
                                                        class="img-fluid">
                                                </a>
                                                <h6 class="destination-name-navbar">{{$item->title}}</h6>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <!--SIDE KO CLICK GARDA KHULNE MENU WHICH HAS PHOTO-->
                    </div>
                </div>
            </li>

            @endforeach
            
                
            <li><a href="{{ route('blogs') }}" class="hvr-underline-from-center">Blogs</a></li>
            <li>
                <a href="#" class="desktop-item hvr-underline-from-center">Gallery<i
                        class="fas fa-chevron-down navbardrop-icon"></i></a>
                <input type="checkbox" id="showDrop1">
                <label for="showDrop1" class="mobile-item">Gallery<i
                        class="fas fa-chevron-down navbardrop-icon"></i></label>
                <ul class="drop-menu">
                    <li><a href="{{ route('gallery') }}">Photo Gallery</a></li>
                    <li><a href="{{ route('videogallery') }}">Video Gallery</a></li>
                </ul>
            </li>
            <li><a href="{{route('contact')}}" class="hvr-underline-from-center">Contact</a></li>
            <li class="search-icon">
                <a class="nav-link" href="javascript:">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    @include('frontend.layouts.includes.search')

                </a>
            </li>
        </ul>
        <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div>
</nav>

 <!-- Page Body Start-->
 <div class="page-body-wrapper">
     <!-- Page Sidebar Start-->
     <div class="sidebar-wrapper">
         <div>
             <div class="logo-wrapper">
                 <a href="{{ url('/admin/dashboard') }}">
                     <img class="img-fluid for-dark" src="{{ asset('uploads/logo/' . $site->logo) }}" alt="">
                     <img class="img-fluid for-light" src="{{ asset('uploads/logo/' . $site->logo) }}" alt="">
                 </a>
                 <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                 <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i>
                 </div>
             </div>
             <div class="logo-icon-wrapper"><a href="{{ url('/admin/dashboard') }}"><img
                         class="img-fluid toggle-sidebar-image" src="{{ asset('uploads/logo/' . $site->favicon) }}"
                         alt=""></a></div>
             <nav class="sidebar-main">
                 <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                 <div id="sidebar-menu">
                     <ul class="sidebar-links" id="simple-bar">
                         <li class="back-btn"><a href="{{ url('/admin/dashboard') }}"><img class="img-fluid"
                                     src="{{ asset('uploads/logo/' . $site->sitelogo) }}" alt=""></a>
                             <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                     aria-hidden="true"></i></div>
                         </li>
                         <li class="sidebar-list">
                             <a class="sidebar-link sidebar-title {{ Route::is('admin.dashboard') ? 'side-active' : null }}"
                                 href="{{ route('admin.dashboard') }}"><i
                                     data-feather="home"></i><span>Dashboard</span></a>
                         </li>
                         <li class="sidebar-list">
                             <a class="sidebar-link sidebar-title {{ Route::is('admin.site.*') ? 'side-active' : null }}"
                                 href="{{ route('admin.site.index') }}"><i data-feather="settings"></i><span>Site
                                     Settings</span></a>
                         </li>
                         <li class="sidebar-list">
                             <a class="sidebar-link sidebar-title {{ Route::is('admin.contactdetail.*') ? 'side-active' : null }}"
                                 href="{{ route('admin.contactdetail.index') }}"><i
                                     data-feather="phone"></i><span>Contact Details</span></a>
                         </li>
                         <li class="sidebar-list">
                             <a class="sidebar-link sidebar-title {{ Route::is('admin.sliders.*') ? 'side-active' : null }}"
                                 href="{{ route('admin.sliders.index') }}"><i
                                     data-feather="sliders"></i><span>Sliders</span></a>
                         </li>
                         <li class="sidebar-list">
                             <a class="sidebar-link sidebar-title {{ Route::is('admin.about.*') ? 'side-active' : null }}" href="#"><i
                                     data-feather="layout"></i><span>About us Pages</span></a>
                             <ul class="sidebar-submenu">
                                 <li><a href="{{route('admin.about.whyus.index')}}">Why us</a></li>
                                 <li><a href="{{route('admin.about.whoarewe.index')}}">Who are we</a></li>
                                 <li><a href="{{route('admin.about.messagefromdirector.index')}}">Message from director</a></li>
                                 <li><a href="{{route('admin.about.ourteam.index')}}">Our team</a></li>
                                 <li><a href="{{route('admin.about.reviews.index')}}">Review</a></li>
                                 <li><a href="{{route('admin.about.documents.index')}}">Documents</a></li>
                                 <li><a href="{{route('admin.about.otherdetails.index')}}">Other details</a></li>
                             </ul>
                         </li>
                         <li class="sidebar-list">
                             <a class="sidebar-link sidebar-title {{ Route::is('admin.blogs.*') ? 'side-active' : null }}"
                                 href="{{ route('admin.blogs.index') }}"><i
                                     data-feather="edit"></i><span>Blogs</span></a>
                         </li>
                         <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title {{ Route::is('admin.gallery.*') ? 'side-active' : null }}" href="#"><i
                                    data-feather="package"></i><span>Gallery</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{route('admin.gallery.index')}}">Photo Gallery</a></li>
                                <li><a href="{{route('admin.gallery.video.index')}}">Video Gallery</a></li>
                            </ul>
                        </li>
                         <li class="sidebar-list">
                             <a class="sidebar-link sidebar-title {{ Route::is('admin.clients.*') ? 'side-active' : null }}"
                                 href="{{ route('admin.clients.index') }}"><i
                                     data-feather="users"></i><span>Partners</span></a>
                         </li>
                         <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title {{ Route::is('admin.package.*') ? 'side-active' : null }}" href="#"><i
                                    data-feather="package"></i><span>Package management</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{route('admin.package.categories.index')}}">Category</a></li>
                                <li><a href="{{route('admin.package.subcategories.index')}}">Subcategory</a></li>
                                <li><a href="{{route('admin.package.packages.index')}}">Package</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title {{ Route::is('admin.contact.*') ? 'side-active' : null }}"" href="{{route('admin.contact.index')}}"><i
                                    data-feather="message-square"></i><span>Contact messages</span></a>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title {{(Route::is('admin.termsandcondition.*')) ? "side-active" : null }}"
                                href="{{ route('admin.termsandcondition.index') }}"><i data-feather="info"></i><span>Terms and condition</span></a>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title {{(Route::is('admin.privacypolicy.*')) ? "side-active" : null }}"
                                href="{{ route('admin.privacypolicy.index') }}"><i data-feather="info"></i><span>Privacy Policy</span></a>
                        </li>
                     </ul>
                 </div>
                 <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
             </nav>
         </div>
     </div>
     <!-- Page Sidebar Ends-->

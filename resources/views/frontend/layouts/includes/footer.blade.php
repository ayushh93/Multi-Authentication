@php
foreach ($footerexpeditions->subcategory as $subcategory) {
    foreach ($subcategory->package as $expepackage) {
        $packagefooter[] = $expepackage;
    }
}
@endphp

@include('frontend.layouts.includes.modal')
<!--FOOTER-->
<footer>
    <div class="footer-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <ul class="info-footer info-location">
                        <li class="li-none"><i class="fa-solid fa-location-dot"></i>{{ $contactdetail->address }}</li>
                        <li class="li-none"><i class="fa-solid fa-phone"></i> <a href="tel:{{ $contactdetail->contact_number }}">{{ $contactdetail->contact_number }}</a></li>
                        <li class="li-none"><i class="fa-solid fa-envelope"></i> <a href="mailto:{{ $contactdetail->email }}">{{ $contactdetail->email }}</a></li>
                    </ul>
                    <ul class="info-footer social-footer">
                        <li class="li-none"><a href="{{$contactdetail->facebook_link}}"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li class="li-none"><a href="{{$contactdetail->twitter_link}}"><i class="fa-brands fa-twitter"></i></a></li>
                        <li class="li-none"><a href="{{$contactdetail->youtube_link}}"><i class="fa-brands fa-youtube"></i></a></li>
                        <li class="li-none"><a href="{{$contactdetail->instagram_link}}"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <h5 class="footer-section-head">About Us</h5>
                    <ul class="info-footer">
                        <li class="li-none"><a href="{{ route('about.whyus') }}">Why Us?</a></li>
                        <li class="li-none"><a href="{{ route('about.whoarewe') }}">Who Are We?</a></li>
                        <li class="li-none"><a href="{{ route('about.message') }}">Message from the Director</a></li>
                        <li class="li-none"><a href="{{ route('about.ourteam') }}">Our Teams</a></li>
                        <li class="li-none"><a href="{{ route('about.reviews') }}">Reviews</a></li>
                        <li class="li-none"><a href="{{ route('about.documents') }}">Documents</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <h5 class="footer-section-head">Quick Links</h5>
                    <ul class="info-footer">
                        <li class="li-none"><a href="{{route('privacypolicy')}}">Privacy Policy</a></li>
                        <li class="li-none"><a href="{{route('termsandcondition')}}">Terms & Conditions</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <h5 class="footer-section-head">Expeditions</h5>
                    <ul class="info-footer">
                        @foreach ($packagefooter as $item)
                            <li class="li-none"><a href="{{route('packagesingle',$item->id)}}">{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
        <div class="copyright">
            <div class="row copy-row">
                <div class="col-lg-6 col-md-6">
                    <div class="copy-text">
                        <p>Copyright © {{ now()->year }}, <a href="index.php">Sherpa Leaders Treks & Expedition Pvt.
                                Ltd.</a> | All Rights
                            Reserved</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="copy-text">
                        <p class="text-right">Design & Developed By <a href="index.php">IT Arrow Pvt. Ltd.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="scrollTop float-right">
    <i class="fas fa-angle-up" onclick="topFunction()" id="myBtn"></i>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<!--OWL CAROUSEL-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--PARTICLES JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tsparticles/2.0.6/tsparticles.min.js"
    integrity="sha512-ETA9L0ivUzCoCQXZtOk2SAW/YSs1SEMrU4DMVVDndqaEQNF82xR2vpjsb5gtjLns7d60rYS5lmEPeZteGwiNOw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--MATCH HEIGHT JS-->
<script type='text/javascript'
    src='https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js'
    crossorigin="anonymous"></script>
<!--FANCY BOX-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
    integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--MATCH HEIGHT JS-->
<script type='text/javascript'
    src='https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js'
    crossorigin="anonymous"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-605c36c47c83d17d"></script>
<!--AOS ANIMATION-->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<!--CUSTOM JS-->
<script src="{{ asset('assets/frontend/js/custom.js') }}"></script>
<script>
    AOS.init();
</script>
</body>

</html>

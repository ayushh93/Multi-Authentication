@extends('frontend.layouts.frontend2')
@section('title')
Contact Messages
@endsection

@section('main-content')
<section class="contact-form">
    <div class="container">
        <div class="form-container">
            <div class="left-container">
                <div class="left-inner-container">
                    <h2>Visit Us</h2>
                    <ul class="info-footer">
                        <li class="li-none"><i class="fa-solid fa-location-dot"></i> {{$contactdetail->address}}</li>
                        <li class="li-none"><i class="fa-solid fa-phone"></i> <a href="tel:{{$contactdetail->contact_number}}">{{$contactdetail->contact_number}}</a></li>
                        <li class="li-none"><i class="fa-solid fa-envelope"></i> <a href="mailto:{{$contactdetail->email}}">{{$contactdetail->email}}</a></li>
                    </ul>

                    <div class="social-container">
                        <a href="{{$contactdetail->facebook_link}}" class="social"><i class="fa-brands fa-facebook"></i></a>
                        <a href="{{$contactdetail->twitter_link}}" class="social"><i class="fa-brands fa-twitter"></i></a>
                        <a href="{{$contactdetail->instagram_link}}" class="social"><i class="fa-brands fa-instagram"></i></a>
                        <a href="{{$contactdetail->youtube_link}}" class="social"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="right-container">
                <div class="right-inner-container">
                    <form method="POST" action="{{route('contact.submit')}}">
                        @csrf
                        @include('admin.layout.includes.message')
                        <h2 class="lg-view">CONTACT</h2>
                        <br>
                        <div class="form-group">
                            <label for="name">Tell us your name*</label>
                            <input id="name-input" type="text" placeholder="Full name" name="name" required="required" value="{{old('name')}}" />
                        </div>
                        <div class="form-group">
                            <label for="email-input">Enter your email*</label>
                            <input id="email-input" type="email" placeholder="Eg. example@email.com" name="email" required="required" value="{{old('email')}}" />
                        </div>
                        <div class="form-group">
                            <label for="phone-input">Enter phone number*</label>
                            <input id="phone-input" type="text" placeholder="Eg. 9800 000000" name="phone_number" required="required" value="{{old('phone_number')}}"/>
                        </div>
                        <div class="form-group">
                            <label for="message-textarea">Message</label>
                            <textarea id="message-textarea" placeholder="Write us a message" name="message" required>{{old('message')}}</textarea>
                        </div>
                        <button class="submit-contact" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="google-map">
<iframe src="{{$contactdetail->map}}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
@endsection
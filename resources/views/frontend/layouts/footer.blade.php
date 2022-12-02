<footer class="main">
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widget-about font-md mb-md-5 mb-lg-0">
                        <div class="logo logo-width-1 wow fadeIn animated">
                            @if ($setting_website)
                            <a href="{{ route('home') }}"><img src="{{ asset('storage/' . $setting_website->image ) }}" alt="logo" loading="lazy"></a>
                            @else
                            
                            @endif
                        </div>
                        <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                        @if ($setting_website)
                        <p class="wow fadeIn animated">
                            <strong>Address: </strong>{{ $setting_website->address }}
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>Phone: </strong>{{ $setting_website->phone }}
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>Email: </strong>{{ $setting_website->email }}
                        </p>
                        @else
                                
                        @endif
                        <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                        <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                            @if ($setting_website)
                            <a href="{{ $setting_website->facebook }}" target="_blank"><img src="{{ asset('frontend') }}/imgs/theme/icons/icon-facebook.svg" alt="{{ $setting_website->facebook }}" loading="lazy"></a>
                            <a href="{{ $setting_website->instagram }}" target="_blank"><img src="{{ asset('frontend') }}/imgs/theme/icons/icon-instagram.svg" alt="{{ $setting_website->instagram }}" loading="lazy"></a>
                            <a href="{{ $setting_website->youtube }}" target="_blank"><img src="{{ asset('frontend') }}/imgs/theme/icons/icon-youtube.svg" alt="{{ $setting_website->youtube }}" loading="lazy"></a>
                            @else
                                
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <h5 class="widget-title wow fadeIn animated">About</h5>
                    <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms-condition') }}">Terms &amp; Conditions</a></li>
                        <li><a href="{{ route('about') }}">Contact Us</a></li>                            
                    </ul>
                </div>
                <div class="col-lg-2  col-md-3">
                    <h5 class="widget-title wow fadeIn animated">My Account</h5>
                    <ul class="footer-list wow fadeIn animated">
                        <li><a href="{{ route('setting') }}">My Account</a></li>
                        <li><a href="{{ route('cart') }}">View Cart</a></li>
                        <li><a href="{{ route('favorit.view') }}">My Wishlist</a></li>
                        <li><a href="{{ route('orderHistory') }}">Track My Order</a></li>                            
                        <li><a href="{{ route('shop') }}">Order</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mob-center">
                    <h5 class="widget-title wow fadeIn animated">Install App</h5>
                    <div class="row">
                        <div class="col-md-8 col-lg-12">
                            <p class="wow fadeIn animated">From App Store or Google Play</p>
                            <div class="download-app wow fadeIn animated mob-app">
                                <a href="{{ route('home') }}" class="hover-up mb-sm-4 mb-lg-0"><img class="active" src="{{ asset('frontend') }}/imgs/theme/app-store.jpg" alt="" loading='lazy'></a>
                                <a href="{{ route('home') }}" class="hover-up"><img src="{{ asset('frontend') }}/imgs/theme/google-play.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                            <p class="mb-20 wow fadeIn animated">Secured Payment Gateways</p>
                            <img class="wow fadeIn animated" src="{{ asset('frontend') }}/imgs/theme/payment-method.png" alt="" loading='lazy'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container pb-20 wow fadeIn animated mob-center">
        <div class="row">
            <div class="col-12 mb-20">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-lg-6">
                <p class="float-md-left font-sm text-muted mb-0">
                    <a href="{{ route('privacy-policy') }}">Privacy Policy</a> | <a href="{{ route('terms-condition') }}">Terms & Conditions</a>
                </p>
            </div>
            <div class="col-lg-6">
                <p class="text-lg-end text-start font-sm text-muted mb-0">
                    &copy; <strong class="text-brand">PutraTeguh</strong> All rights reserved
                </p>
            </div>
        </div>
    </div>
</footer> 
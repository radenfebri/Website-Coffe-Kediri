<header class="header-area header-style-1 header-height-2">
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>Get great devices up to 50% off <a href="{{ route('shop') }}">View details</a></li>
                                <li>Supper Value Deals - Save more with coupons</li>
                                <li>Trendy 25silver jewelry, save up 35% off today <a href="{{ route('shop') }}">Shop now</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>                                
                            <li>
                                @guest
                                <i class="fi-rs-key"></i>
                                @if (Route::has('login'))
                                <a href="{{ route('login') }}">Log In </a>  
                                @endif
                                / 
                                @if (Route::has('register'))
                                <a href="{{ route('register') }}">Sign Up</a>
                                @endif
                                @else
                                {{ Auth::user()->name }}
                                @endguest
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ route('home') }}"><img src="{{ asset("frontend")}}/imgs/logo/logo.png" alt="logo"></a>
                </div>
                <div class="header-right">
                    <div class="search-style-1">
                        <form action="#">                                
                            <input type="text" placeholder="Search for items...">
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="{{ route('favorit.view') }}">
                                    <img class="svgInject" alt="Surfside Media" src="{{ asset("frontend")}}/imgs/theme/icons/icon-heart.svg">
                                    @guest
                                    
                                    @else
                                        <span class="pro-count blue wish-count">0</span>
                                    @endguest
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{ route('cart') }}">
                                    <img alt="Surfside Media" src="{{ asset("frontend")}}/imgs/theme/icons/icon-cart.svg">
                                    @guest
                                    
                                    @else
                                    <span class="pro-count blue cart-count">0</span>
                                    @endguest
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{ route('home') }}"><img src="{{ asset("frontend")}}/imgs/logo/logo.png" alt="logo"></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categori-button-active" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-large">
                            <ul>
                                <li><a href="{{ route('shop') }}"><i class="surfsidemedia-font-home"></i>Home & Garden</a></li>
                                <li><a href="{{ route('shop') }}"><i class="surfsidemedia-font-high-heels"></i>Shoes</a></li>
                                <li><a href="{{ route('shop') }}"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a></li>
                                <li><a href="{{ route('shop') }}"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a></li>
                                <li>
                                    <ul class="more_slie_open" style="display: none;">
                                        <li><a href="{{route('shop') }}"><i class="surfsidemedia-font-desktop"></i>Beauty, Health</a></li>
                                        <li><a href="{{ route('shop') }}"><i class="surfsidemedia-font-cpu"></i>Bags and Shoes</a></li>
                                        <li><a href="{{ route('shop') }}"><i class="surfsidemedia-font-diamond"></i>Consumer Electronics</a></li>
                                        <li><a href="{{ route('shop') }}"><i class="surfsidemedia-font-home"></i>Automobiles & Motorcycles</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @guest                    
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li><a class="{{ request()->is('/', 'home') ? 'active' : ''}}" href="{{ route('home') }}">Home </a></li>
                                <li><a class="{{ request()->is('about', 'about/*') ? 'active' : ''}}" href="{{ route('about') }}">About</a></li>
                                <li><a class="{{ request()->is('shop', 'shop/*', 'cart', 'favorit', 'detail-produk/*') ? 'active' : ''}}" href="{{ route('shop') }}">Shop</a></li>
                                <li><a class="{{ request()->is('contact', 'contact/*') ? 'active' : ''}}" href="contact.html">Contact</a></li>
                                @guest
                                
                                @else
                                <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        @guest
                                        
                                        @else
                                        @if (Auth::user()->hasRole(['Super Admin', 'Admin']))
                                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                        @else
                                        
                                        @endif
                                        @endguest
                                        <li><a href="{{ route('orderHistory') }}">Order History</a></li>
                                        <li><a href="{{ route('setting') }}">Setting</a></li>
                                        <li><a href="{{ route('changePassword') }}">Change Password</a> </li>   
                                        <li><a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>      
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>    
                                    </ul>
                                </li>
                                @endguest
                            </ul>
                        </nav>
                    </div>
                    
                @else
                    <div class="main-menu navbar-login main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li><a class="{{ request()->is('/', '') ? 'active' : ''}}" href="{{ route('home') }}">Home </a></li>
                                <li><a class="{{ request()->is('about', 'about/*') ? 'active' : ''}}" href="{{ route('about') }}">About</a></li>
                                <li><a class="{{ request()->is('shop', 'shop/*') ? 'active' : ''}}" href="{{ route('shop') }}">Shop</a></li>
                                <li><a class="{{ request()->is('contact', 'contact/*') ? 'active' : ''}}" href="{{ route('contact') }}">Contact</a></li>
                                <li><a class="{{ request()->is('order-history', 'setting', 'change-password') ? 'active' : ''}}" href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        @guest
        
                                        @else
                                            @if (Auth::user()->hasRole(['Super Admin', 'Admin']))
                                                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                            @else
                                                
                                            @endif
                                        @endguest
                                        <li><a href="{{ route('orderHistory') }}">Order History</a></li>
                                        <li><a href="{{ route('setting') }}">Setting</a></li>
                                        <li><a href="{{ route('changePassword') }}">Change Password</a> </li>   
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>      
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>    
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    @endguest
                </div>
                <div class="hotline d-none d-lg-block">
                    <p><i class="fi-rs-smartphone"></i><span>Toll Free</span> (+1) 0000-000-000 </p>
                </div>
                <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="{{ route('favorit.view') }}">
                                <img alt="Surfside Media" src="{{ asset("frontend")}}/imgs/theme/icons/icon-heart.svg">
                                @guest
                                
                                @else
                                    <span class="pro-count white wish-count">0</span>
                                @endguest
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="{{ route('cart') }}">
                                <img alt="Surfside Media" src="{{ asset("frontend")}}/imgs/theme/icons/icon-cart.svg">
                                @guest

                                @else
                                    <span class="pro-count white cart-count">0</span>
                                @endguest
                            </a>
                        </div>
                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="/"><img src="{{ asset("frontend")}}/imgs/logo/logo.png" alt="logo"></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <div class="main-categori-wrap mobile-header-border">
                    <a class="categori-button-active-2" href="#">
                        <span class="fi-rs-apps"></span> Browse Categories
                    </a>
                    <div class="categori-dropdown-wrap categori-dropdown-active-small">
                        <ul>
                            <li><a href="{{ route('shop') }}"><i class="surfsidemedia-font-home"></i>Home & Garden</a></li>
                            <li><a href="{{ route('shop') }}"><i class="surfsidemedia-font-high-heels"></i>Shoes</a></li>
                            <li><a href="{{ route('shop') }}"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a></li>
                            <li><a href="{{ route('shop') }}"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a></li>
                        </ul>
                    </div>
                </div>
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ route('home') }}">Home</a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ route('shop') }}">shop</a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ route('contact') }}">Contact</a></li>
                        @guest
                        @else
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">My Account</a>
                            <ul class="dropdown">
                                @guest
                                @if (Auth::user()->hasRole(['Super Admin', 'Admin']))
                                <li><a href="#">Dashboard</a></li>
                                @else
                                @endif
                                @endguest
                                <li><a href="{{ route('orderHistory') }}">History Order</a></li>
                                <li><a href="{{ route('setting') }}">Setting</a></li>
                                <li><a href="{{ route('changePassword') }}">Change Password</a></li>
                                <li><a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>      
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>   
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap mobile-header-border">
                <div class="single-mobile-header-info mt-30">
                    <a href="#"> Our location </a>
                </div>
                @guest
                <div class="single-mobile-header-info">
                    @if (Route::has('login'))
                    <a href="{{ route('login') }}">Log In </a>    
                    @endif                    
                </div>
                <div class="single-mobile-header-info">
                    @if (Route::has('register'))                        
                    <a href="{{ route('register') }}">Sign Up</a>
                    @endif
                </div>
                @endguest
                <div class="single-mobile-header-info">
                    <a href="#">(+1) 0000-000-000 </a>
                </div>
            </div>
            <div class="mobile-social-icon">
                <h5 class="mb-15 text-grey-4">Follow Us</h5>
                <a href="#"><img src="{{ asset("frontend")}}/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                <a href="#"><img src="{{ asset("frontend")}}/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                <a href="#"><img src="{{ asset("frontend")}}/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                <a href="#"><img src="{{ asset("frontend")}}/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                <a href="#"><img src="{{ asset("frontend")}}/imgs/theme/icons/icon-youtube.svg" alt=""></a>
            </div>
        </div>
    </div>
</div>
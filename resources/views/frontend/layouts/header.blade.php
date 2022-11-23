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
                                <li class="has-children">
                                    <a href="{{ route('shop') }}"><i class="surfsidemedia-font-dress"></i>Women's Clothing</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Hot & Trending</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Dresses</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Blouses & Shirts</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Hoodies & Sweatshirts</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Women's Sets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Suits & Blazers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Bodysuits</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Tanks & Camis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Coats & Jackets</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Bottoms</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Leggings</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Skirts</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Shorts</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Jeans</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Pants & Capris</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Bikini Sets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Cover-Ups</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Swimwear</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <img src="{{ asset("frontend")}}/imgs/banner/menu-banner-2.jpg" alt="menu_banner1">
                                                    <div class="banne_info">
                                                        <h6>10% Off</h6>
                                                        <h4>New Arrival</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="header-banner2">
                                                    <img src="{{ asset("frontend")}}/imgs/banner/menu-banner-3.jpg" alt="menu_banner2">
                                                    <div class="banne_info">
                                                        <h6>15% Off</h6>
                                                        <h4>Hot Deals</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has-children">
                                    <a href="{{ route('shop') }}"><i class="surfsidemedia-font-tshirt"></i>Men's Clothing</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Jackets & Coats</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Down Jackets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Jackets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Parkas</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Faux Leather Coats</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Trench</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Wool & Blends</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vests & Waistcoats</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Leather Coats</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Suits & Blazers</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Blazers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Suit Jackets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Suit Pants</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Suits</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vests</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Tailor-made Suits</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Cover-Ups</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <img src="{{ asset("frontend")}}/imgs/banner/menu-banner-4.jpg" alt="menu_banner1">
                                                    <div class="banne_info">
                                                        <h6>10% Off</h6>
                                                        <h4>New Arrival</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has-children">
                                    <a href="{{ route('shop') }}"><i class="surfsidemedia-font-smartphone"></i> Cellphones</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Hot & Trending</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Cellphones</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">iPhones</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Refurbished Phones</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Mobile Phone</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Mobile Phone Parts</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Phone Bags & Cases</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Communication Equipments</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Walkie Talkie</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Accessories</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Screen Protectors</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Wire Chargers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Wireless Chargers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Car Chargers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Power Bank</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Armbands</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Dust Plug</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Signal Boosters</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <img src="{{ asset("frontend")}}/imgs/banner/menu-banner-5.jpg" alt="menu_banner1">
                                                    <div class="banne_info">
                                                        <h6>10% Off</h6>
                                                        <h4>New Arrival</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="header-banner2">
                                                    <img src="{{ asset("frontend")}}/imgs/banner/menu-banner-6.jpg" alt="menu_banner2">
                                                    <div class="banne_info">
                                                        <h6>15% Off</h6>
                                                        <h4>Hot Deals</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="{{ route('shop') }}"><i class="surfsidemedia-font-desktop"></i>Computer & Office</a></li>
                                <li><a href="{{ route('shop') }}"><i class="surfsidemedia-font-cpu"></i>Consumer Electronics</a></li>
                                <li><a href="{{ route('shop') }}"><i class="surfsidemedia-font-diamond"></i>Jewelry & Accessories</a></li>
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
                            <div class="more_categories">Show more...</div>
                        </div>
                    </div>
                    @guest
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li><a class="{{ request()->is('/', '/*') ? 'active' : ''}}" href="{{ route('home') }}">Home </a></li>
                                <li><a class="{{ request()->is('about', 'about/*') ? 'active' : ''}}" href="about.html">About</a></li>
                                <li><a class="{{ request()->is('shop', 'shop/*', 'cart', 'favorit', 'detail-produk/*') ? 'active' : ''}}" href="{{ route('shop') }}">Shop</a></li>
                                <li><a class="{{ request()->is('blog', 'blog/*') ? 'active' : ''}}" href="blog.html">Blog </a></li>                                    
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
                                        <li><a class="" href="#">Order History</a></li>
                                        <li><a class="" href="#">Setting</a></li>
                                        <li><a class="" href="#">Change Password</a> </li>   
                                        <li><a class="" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>      
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
                                <li><a class="{{ request()->is('/', '/*') ? 'active' : ''}}" href="{{ route('home') }}">Home </a></li>
                                <li><a class="{{ request()->is('about', 'about/*') ? 'active' : ''}}" href="about.html">About</a></li>
                                <li><a class="{{ request()->is('shop', 'shop/*') ? 'active' : ''}}" href="{{ route('shop') }}">Shop</a></li>
                                <li><a class="{{ request()->is('blog', 'blog/*') ? 'active' : ''}}" href="blog.html">Blog </a></li>                                    
                                <li><a class="{{ request()->is('contact', 'contact/*') ? 'active' : ''}}" href="contact.html">Contact</a></li>
                                <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        @guest
        
                                        @else
                                            @if (Auth::user()->hasRole(['Super Admin', 'Admin']))
                                                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                            @else
                                                
                                            @endif
                                        @endguest
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="#">Setting</a></li>
                                        <li><a href="#">Change Password</a> </li>   
                                        <li><a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>      
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
                            <a href="shop-wishlist.php">
                                <img alt="Surfside Media" src="{{ asset("frontend")}}/imgs/theme/icons/icon-heart.svg">
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="cart.html">
                                <img alt="Surfside Media" src="{{ asset("frontend")}}/imgs/theme/icons/icon-cart.svg">
                                <span class="pro-count white">0</span>
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
                <a href="index.html"><img src="{{ asset("frontend")}}/imgs/logo/logo.png" alt="logo"></a>
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
                            <li><a href="{{ route('shop') }}l"><i class="surfsidemedia-font-tshirt"></i>Men's Clothing</a></li>
                            <li><a href="{{ route('shop') }}l"><i class="surfsidemedia-font-dress"></i>Women's Clothing</a></li>
                            <li> <a href="{{ route('shop') }}"><i class="surfsidemedia-font-smartphone"></i> Cellphones</a></li>
                            <li><a href="{{ route('shop') }}"><i class="surfsidemedia-font-desktop"></i>Computer & Office</a></li>
                            <li><a href="{{ route('shop') }}"><i class="surfsidemedia-font-cpu"></i>Consumer Electronics</a></li>
                            <li><a href="{{ route('shop') }}"><i class="surfsidemedia-font-home"></i>Home & Garden</a></li>
                            <li><a href="{{ route('shop') }}l"><i class="surfsidemedia-font-high-heels"></i>Shoes</a></li>
                            <li><a href="{{ route('shop') }}l"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a></li>
                            <li><a href="{{ route('shop') }}l"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a></li>
                        </ul>
                    </div>
                </div>
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="index.html">Home</a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ route('shop') }}">shop</a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="blog.html">Blog</a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">My Account</a>
                            <ul class="dropdown">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">History Order</a></li>
                                <li><a href="#">Setting</a></li>
                                <li><a href="#">Change Password</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap mobile-header-border">
                <div class="single-mobile-header-info mt-30">
                    <a href="contact.html"> Our location </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="login.html">Log In </a>                        
                </div>
                <div class="single-mobile-header-info">                        
                    <a href="register.html">Sign Up</a>
                </div>
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
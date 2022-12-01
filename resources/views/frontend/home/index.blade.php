@extends('frontend.layouts.default')

@section('title', 'Home')

@section('content')
<main class="main">
    {{-- BANNER 1 --}}
    <section class="home-slider position-relative pt-50">
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">Trade-in offer</h4>
                                <h2 class="animated fw-900">Supper value deals</h2>
                                <h1 class="animated fw-900 text-brand">On all products</h1>
                                <p class="animated">Save more with coupons & up to 70% off</p>
                                <a class="animated btn btn-brush btn-brush-3" href="product-details.html"> Shop Now </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-1" src="{{ '/frontend/imgs/slider/slider-1.png' }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">Hot promotions</h4>
                                <h2 class="animated fw-900">Fashion Trending</h2>
                                <h1 class="animated fw-900 text-7">Great Collection</h1>
                                <p class="animated">Save more with coupons & up to 20% off</p>
                                <a class="animated btn btn-brush btn-brush-2" href="product-details.html"> Discover Now </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-2" src="{{ '/frontend/imgs/slider/slider-2.png' }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>
    
    {{-- FEATURE --}}
    <section class="featured section-padding position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ '/frontend/imgs/theme/icons/feature-1.png' }}" alt="">
                        <h4 class="bg-1">Free Shipping</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ '/frontend/imgs/theme/icons/feature-2.png' }}" alt="">
                        <h4 class="bg-3">Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ '/frontend/imgs/theme/icons/feature-3.png' }}" alt="">
                        <h4 class="bg-2">Save Money</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ '/frontend/imgs/theme/icons/feature-4.png' }}" alt="">
                        <h4 class="bg-4">Promotions</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ '/frontend/imgs/theme/icons/feature-5.png' }}" alt="">
                        <h4 class="bg-5">Happy Sell</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ '/frontend/imgs/theme/icons/feature-6.png' }}" alt="">
                        <h4 class="bg-6">24/7 Support</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- FILTER PRODUK --}}
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Produk Terbaru</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Produk Popular</button>
                    </li>
                </ul>
                <a href="{{ route('shop') }}" class="view-more d-none d-md-flex">Lihat Semua<i class="fi-rs-angle-double-small-right"></i></a>
            </div>
            
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        
                        @if ($produks->count() > 0)
                        @foreach ($produks as $item)                            
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6 produk_data">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('detail.produk', $item->slug ) }}">
                                            @if ($item->cover == null)
                                            <img class="default-img produk-img" src="{{ '/frontend/imgs/shop/product-1-1.jpg' }}" loading="lazy" alt="{{ $item->name }}">                                                
                                            @else
                                            <img class="default-img produk-img" src="{{ asset('storage/'. $item->cover ) }}" loading="lazy" alt="{{ $item->name }}">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a href="{{ route('detail.produk', $item->slug ) }}" aria-label="Lihat Detail" class="action-btn hover-up" ><i class="fi-rs-eye"></i></a>
                                        <a href="{{ route('addfavorit') }}" aria-label="Tambah ke Favorit" class="action-btn hover-up addToWishlist"><i class="fi-rs-heart"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        @if ($item->popular == null)
                                        
                                        @else
                                        <span class="hot">Populer</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <input type="hidden" value="{{ $item->id }}" class="prod_id">
                                    <input type="hidden" class="form-control qty-input" value="1">
                                    <div class="product-category">
                                        @if ($item->kategoriproduk == null)
                                        
                                        @else
                                        <a href="{{ route('kategori', $item->kategoriproduk->slug) }}">{{ $item->kategoriproduk->name }}</a>
                                        @endif
                                    </div>
                                    <h2><a href="{{ route('detail.produk', $item->slug ) }}">{{ $item->name }}</a></h2>
                                    
                                    @if($item->ratings->count() > 0)
                                    @php $item->ratings->count() @endphp
                                    @php $bintang = $item->ratings->sum('stars_rated') / $item->ratings->count() @endphp
                                    @else   
                                    @php $bintang = 0 @endphp
                                    @endif
                                    
                                    @php $rate_num = number_format($bintang) @endphp
                                    <div class="rating">
                                        @for($i = 1; $i <= $rate_num; $i++)
                                        <i class="fas fa-star" style="color: #ffb300"></i>
                                        @endfor
                                        @for($j = $rate_num+1; $j <= 5; $j++)
                                        <i class="fas fa-star" style="color: #b4afaf"></i>
                                        @endfor
                                    </div>
                                    
                                    <div class="product-price">
                                        @if ($item->selling_price == null)
                                        <span>Rp.{{ number_format($item->original_price) }}</span>
                                        @elseif($item->selling_price != null)
                                        <span>Rp.{{ number_format($item->selling_price) }}</span>
                                        <span class="old-price">Rp.{{ number_format($item->original_price) }}</span>
                                        @endif
                                    </div>
                                    <div class="product-action-1 show">
                                        <a href="{{ route('addcart') }}" aria-label="Add to Cart" class="action-btn hover-up addToCartBtn"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div>Data Produk Kosong</div>
                        @endif
                        
                        
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab one (Featured)-->
                <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                    <div class="row product-grid-4">
                        
                        @if ($produk_populer->count() > 0)
                        @foreach ($produk_populer as $item)                            
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6 produk_data">
                            <input type="hidden" value="{{ $item->id }}" class="prod_id" id="">
                            <input type="hidden" class="form-control qty-input" value="1">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('detail.produk', $item->slug ) }}">
                                            @if ($item->cover == null)
                                            <img class="default-img" src="{{ '/frontend/imgs/shop/product-1-1.jpg' }}" loading="lazy" alt="{{ $item->name }}">                                                
                                            @else
                                            <img class="default-img" src="{{ asset('storage/'. $item->cover ) }}" loading="lazy" alt="{{ $item->name }}">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a href="{{ route('detail.produk', $item->slug ) }}" aria-label="Lihat Detail" class="action-btn hover-up" ><i class="fi-rs-eye"></i></a>
                                        <a href="{{ route('addfavorit') }}" aria-label="Tambah ke Favorit" class="action-btn hover-up addToWishlist"><i class="fi-rs-heart"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        @if ($item->popular == null)
                                        
                                        @else
                                        <span class="hot">Populer</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        @if ($item->kategoriproduk == null)
                                        
                                        @else
                                        <a href="{{ route('kategori', $item->kategoriproduk->slug) }}">{{ $item->kategoriproduk->name }}</a>
                                        @endif
                                    </div>
                                    <h2><a href="{{ route('detail.produk', $item->slug ) }}">{{ $item->name }}</a></h2>
                                    @if($item->ratings->count() > 0)
                                    @php $item->ratings->count() @endphp
                                    @php $bintang = $item->ratings->sum('stars_rated') / $item->ratings->count() @endphp
                                    @else   
                                    @php $bintang = 0 @endphp
                                    @endif
                                    
                                    @php $rate_num = number_format($bintang) @endphp
                                    <div class="rating">
                                        @for($i = 1; $i <= $rate_num; $i++)
                                        <i class="fas fa-star" style="color: #ffb300"></i>
                                        @endfor
                                        @for($j = $rate_num+1; $j <= 5; $j++)
                                        <i class="fas fa-star" style="color: #b4afaf"></i>
                                        @endfor
                                    </div>
                                    <div class="product-price">
                                        @if ($item->selling_price == null)
                                        <span>Rp.{{ number_format($item->original_price) }}</span>
                                        @elseif($item->selling_price != null)
                                        <span>Rp.{{ number_format($item->selling_price) }}</span>
                                        <span class="old-price">Rp.{{ number_format($item->original_price) }}</span>
                                        @endif
                                    </div>
                                    <div class="product-action-1 show">
                                        <a href="{{ route('addcart') }}" aria-label="Add To Cart" class="action-btn hover-up addToCartBtn"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div>Data Produk Kosong</div>
                        @endif
                        
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab two (Popular)-->
                <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                    <div class="row product-grid-4">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="default-img" src="{{ '/frontend/imgs/shop/product-2-1.jpg' }}" alt="">
                                            <img class="hover-img" src="{{ '/frontend/imgs/shop/product-2-2.jpg' }}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop.html">Music</a>
                                    </div>
                                    <h2><a href="product-details.html">Donec ut nisl rutrum</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>90%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$238.85 </span>
                                        <span class="old-price">$245.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="hover-img" src="{{ '/frontend/imgs/shop/product-3-1.jpg' }}" alt="">
                                            <img class="default-img" src="{{ '/frontend/imgs/shop/product-3-2.jpg' }}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="new">New</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop.html">Music</a>
                                    </div>
                                    <h2><a href="product-details.html">Nullam dapibus pharetra</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>50%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$138.85 </span>
                                        <span class="old-price">$255.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="hover-img" src="{{ '/frontend/imgs/shop/product-4-1.jpg' }}" alt="">
                                            <img class="default-img" src="{{ '/frontend/imgs/shop/product-4-2.jpg' }}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="best">Best Sell</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop.html">Watch</a>
                                    </div>
                                    <h2><a href="product-details.html">Morbi dictum finibus</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>95%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$338.85 </span>
                                        <span class="old-price">$445.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="hover-img" src="{{ '/frontend/imgs/shop/product-5-1.jpg' }}" alt="">
                                            <img class="default-img" src="{{ '/frontend/imgs/shop/product-5-2.jpg' }}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="sale">Sale</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop.html">Music</a>
                                    </div>
                                    <h2><a href="product-details.html">Nunc volutpat massa</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>70%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$123.85 </span>
                                        <span class="old-price">$235.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="hover-img" src="{{ '/frontend/imgs/shop/product-6-1.jpg' }}" alt="">
                                            <img class="default-img" src="{{ '/frontend/imgs/shop/product-6-2.jpg' }}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">-30%</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop.html">Speaker</a>
                                    </div>
                                    <h2><a href="product-details.html">Nullam ultricies luctus</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>70%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$28.85 </span>
                                        <span class="old-price">$45.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="hover-img" src="{{ '/frontend/imgs/shop/product-7-1.jpg' }}" alt="">
                                            <img class="default-img" src="{{ '/frontend/imgs/shop/product-7-2.jpg' }}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">-22%</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop.html">Camera</a>
                                    </div>
                                    <h2><a href="product-details.html">Nullam mattis enim</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>70%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$238.85 </span>
                                        <span class="old-price">$245.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="hover-img" src="{{ '/frontend/imgs/shop/product-8-1.jpg' }}" alt="">
                                            <img class="default-img" src="{{ '/frontend/imgs/shop/product-8-2.jpg' }}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="new">New</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop.html">Phone</a>
                                    </div>
                                    <h2><a href="product-details.html">Vivamus sollicitudin</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>98%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$1275.85 </span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="hover-img" src="{{ '/frontend/imgs/shop/product-9-1.jpg' }}" alt="">
                                            <img class="default-img" src="{{ '/frontend/imgs/shop/product-9-2.jpg' }}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop.html">Accessories </a>
                                    </div>
                                    <h2><a href="product-details.html"> Donec ut nisl rutrum</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>70%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$238.85 </span>
                                        <span class="old-price">$245.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab three (New added)-->
            </div>
            <!--End tab-content-->
            
        </div>
    </section>
    
    {{-- BANNER 2 --}}
    <section class="banner-2 section-padding pb-0">
        <div class="container">
            <div class="banner-img banner-big wow fadeIn animated f-none">
                <img src="{{ '/frontend/imgs/banner/banner-4.png' }}" alt="">
                <div class="banner-text d-md-block d-none">
                    <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                    <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
                    <a href="shop.html" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    
    {{-- KATEGORI POPULER --}}
    <section class="popular-categories section-padding mt-15 mb-25">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Kategori</span> Populer</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                <div class="carausel-6-columns" id="carausel-6-columns">
                    
                    @foreach ($kategoriproduk as $item)
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <div class="kategori-gambar">
                                <a href="{{ route('kategori', $item->slug) }}"> <img class="kategori-img" src="{{ asset('storage/' . $item->image )}}" alt="{{ $item->name }}"></a>
                            </div>
                        </figure>
                        <h5><a href="{{ route('kategori', $item->slug) }}">{{ $item->name }}</a></h5>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    
    {{-- BANNER 3 --}}
    <section class="banners mb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="{{ '/frontend/imgs/banner/banner-1.png' }}" alt="">
                        <div class="banner-text">
                            <span>Smart Offer</span>
                            <h4>Save 20% on <br>Woman Bag</h4>
                            <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="{{ '/frontend/imgs/banner/banner-2.png' }}" alt="">
                        <div class="banner-text">
                            <span>Sale off</span>
                            <h4>Great Summer <br>Collection</h4>
                            <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                    <div class="banner-img wow fadeIn animated  mb-sm-0">
                        <img src="{{ '/frontend/imgs/banner/banner-3.png' }}" alt="">
                        <div class="banner-text">
                            <span>New Arrivals</span>
                            <h4>Shop Today’s <br>Deals & Offers</h4>
                            <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- PRODUK TERBARU --}}
    <section class="section-padding">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Produk</span> Terbaru</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                    
                    @if ($produks == null)
                    Data Produk Masih Kosong
                    @else
                    @foreach ($produks as $item)
                    <div class="product-cart-wrap small hover-up produk_data">
                        <input type="hidden" value="{{ $item->id }}" class="prod_id">
                        <div class="product-img-action-wrap produk-terbaru-full">
                                <div class="product-img product-img-zoom produk-terbaru">
                                    <a href="{{ route('detail.produk', $item->slug) }}">
                                        @if ($item->cover == null)
                                        <img class="default-img produk-img-terbaru" src="{{ asset('frontend') }}/imgs/shop/product-2-1.jpg" alt="{{ $item->name }}">
                                        @else
                                        <img class="default-img produk-img-terbaru" src="{{ asset('storage/'. $item->cover ) }}" alt="{{ $item->name }}">
                                        @endif
                                    </a>
                            </div>
                            <div class="product-action-1">
                                <a href="{{ route('detail.produk', $item->slug ) }}" aria-label="Lihat Detail" class="action-btn hover-up" ><i class="fi-rs-eye"></i></a>
                                <a href="{{ route('addfavorit') }}" aria-label="Tambah ke Favorit" class="action-btn hover-up addToWishlist"><i class="fi-rs-heart"></i></a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                @if ($item->popular == null)
                                
                                @else
                                <span class="hot">Populer</span>
                                @endif
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="{{ route('detail.produk', $item->slug) }}">{{ $item->name }}</a></h2>
                            @if($item->ratings->count() > 0)
                            @php $item->ratings->count() @endphp
                            @php $bintang = $item->ratings->sum('stars_rated') / $item->ratings->count() @endphp
                            @else   
                            @php $bintang = 0 @endphp
                            @endif
                            
                            @php $rate_num = number_format($bintang) @endphp
                            <div class="rating">
                                @for($i = 1; $i <= $rate_num; $i++)
                                <i class="fas fa-star" style="color: #ffb300"></i>
                                @endfor
                                @for($j = $rate_num+1; $j <= 5; $j++)
                                <i class="fas fa-star" style="color: #b4afaf"></i>
                                @endfor
                            </div>
                            
                            <div class="product-price">
                                @if ($item->selling_price == null)
                                <span>Rp.{{ number_format($item->original_price) }}</span>
                                @elseif($item->selling_price != null)
                                <span>Rp.{{ number_format($item->selling_price) }}</span>
                                <span class="old-price">Rp.{{ number_format($item->original_price) }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    
                </div>
            </div>
        </div>
    </section>
    
</main>
@endsection
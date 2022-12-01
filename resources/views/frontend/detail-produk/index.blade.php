@extends('frontend.layouts.default')

@section('title', 'Detail Produk')

@section('content')

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>
                <span></span>
                <a href="#" rel="nofollow">{{ $produk->kategoriproduk->name }}</a>
                <span></span> {{ $produk->name }}
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="product-detail accordion-detail">
                        {{-- BAGIAN PRODUK --}}
                        <div class="row mb-50">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    
                                    <!-- MAIN SLIDES -->
                                    @if ($images->count() > 0)
                                    <div class="product-image-slider">
                                        @foreach ($images as $key => $item)
                                        <figure class="border-radius-10">
                                            <img src="{{ asset('storage/images-produk/'. $item->image) }}" loading="lazy" alt="{{ $produk->name }}">
                                        </figure>
                                        @endforeach                                  
                                        
                                    </div>
                                    @else
                                    <div class="product-image-slider">
                                        <figure class="border-radius-10">
                                            <img src="{{ asset('frontend') }}/imgs/shop/product-16-2.jpg " loading="lazy" alt="{{ $produk->name }}">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{ asset('frontend') }}/imgs/shop/product-16-1.jpg" loading="lazy" alt="{{ $produk->name }}">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{ asset('frontend') }}/imgs/shop/product-16-3.jpg" loading="lazy" alt="{{ $produk->name }}">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{ asset('frontend') }}/imgs/shop/product-16-4.jpg" loading="lazy" alt="{{ $produk->name }}">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{ asset('frontend') }}/imgs/shop/product-16-5.jpg" loading="lazy" alt="{{ $produk->name }}">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{ asset('frontend') }}/imgs/shop/product-16-6.jpg" loading="lazy" alt="{{ $produk->name }}">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{ asset('frontend') }}/imgs/shop/product-16-7.jpg" loading="lazy" alt="{{ $produk->name }}">
                                        </figure>
                                    </div>
                                    @endif
                                    
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails pl-15 pr-15">
                                        @if ($images->count() > 0)
                                        @foreach ($images as $item)
                                        <div><img src="{{ asset('storage/images-produk/'. $item->image) }}" loading="lazy" alt="{{ $produk->name }}"></div>
                                        @endforeach
                                        @else
                                        <div><img src="{{ asset('frontend') }}/imgs/shop/thumbnail-4.jpg" loading="lazy" alt="{{ $produk->name }}"></div>
                                        <div><img src="{{ asset('frontend') }}/imgs/shop/thumbnail-5.jpg" loading="lazy" alt="{{ $produk->name }}"></div>
                                        <div><img src="{{ asset('frontend') }}/imgs/shop/thumbnail-6.jpg" loading="lazy" alt="{{ $produk->name }}"></div>
                                        <div><img src="{{ asset('frontend') }}/imgs/shop/thumbnail-3.jpg" loading="lazy" alt="{{ $produk->name }}"></div>
                                        <div><img src="{{ asset('frontend') }}/imgs/shop/thumbnail-7.jpg" loading="lazy" alt="{{ $produk->name }}"></div>
                                        <div><img src="{{ asset('frontend') }}/imgs/shop/thumbnail-8.jpg" loading="lazy" alt="{{ $produk->name }}"></div>
                                        <div><img src="{{ asset('frontend') }}/imgs/shop/thumbnail-9.jpg" loading="lazy" alt="{{ $produk->name }}"></div>
                                        @endif
                                    </div>
                                    
                                </div>
                                <!-- End Gallery -->
                                <div class="social-icons single-share">
                                    <ul class="text-grey-5 d-inline-block">
                                        <li><strong class="mr-10">Share this:</strong></li>
                                        <li class="social-facebook"><a href="#"><img src="{{ asset('frontend') }}/imgs/theme/icons/icon-facebook.svg" loading="lazy" alt="{{ $produk->name }}"></a></li>
                                        <li class="social-twitter"> <a href="#"><img src="{{ asset('frontend') }}/imgs/theme/icons/icon-twitter.svg" loading="lazy" alt="{{ $produk->name }}"></a></li>
                                        <li class="social-instagram"><a href="#"><img src="{{ asset('frontend') }}/imgs/theme/icons/icon-instagram.svg" loading="lazy" alt="{{ $produk->name }}"></a></li>
                                        <li class="social-linkedin"><a href="#"><img src="{{ asset('frontend') }}/imgs/theme/icons/icon-pinterest.svg" loading="lazy" alt="{{ $produk->name }}"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 produk_data">
                                <div class="detail-info">
                                    <h2 class="title-detail">{{ $produk->name }}</h2>
                                    <div class="product-detail-rating">
                                        <div class="pro-details-brand">
                                            <span> Kategroi: 
                                                @if ($produk->kategoriproduk->name == null)
                                                Tidak ada Kategori
                                                @else
                                                <a href="{{ route('kategori', $produk->kategoriproduk->slug ) }}">{{ $produk->kategoriproduk->name }}</a>
                                                @endif
                                                
                                            </span>
                                        </div>
                                        <div class="product-rate-cover text-end">
                                            @php $rate_num = number_format($rating_avg) @endphp
                                            <span class="rating">
                                                @for($i = 1; $i <= $rate_num; $i++)
                                                <i class="fas fa-star" style="color: #ffb300"></i>
                                                @endfor
                                                @for($j = $rate_num+1; $j <= 5; $j++)
                                                <i class="fas fa-star" style="color: #b4afaf"></i>
                                                @endfor
                                            </span>
                                            <span class="font-small ml-5 text-muted">
                                                @if($ratings->count() > 0)
                                                ({{ $ratings->count() }} Rating)
                                                @else
                                                No Rating
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            @if ($produk->selling_price == null)
                                            <ins><span class="text-brand">Rp.{{ number_format($produk->original_price) }}</span></ins>
                                            @elseif($produk->selling_price != null)
                                            <ins><span class="text-brand">Rp.{{ number_format($produk->selling_price) }}</span></ins>
                                            <ins><span class="old-price font-md ml-15">Rp.{{ number_format($produk->original_price) }}</span></ins>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        <p>{{ $produk->small_description }}</p>
                                    </div>
                                    <div class="product_sort_info font-xs mb-30">
                                        <ul>
                                            <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera Brand Warranty</li>
                                            <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy</li>
                                            <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                        </ul>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    <input type="hidden" value="{{ $produk->id }}" class="prod_id">
                                    <div class="detail-extralink">
                                        @if ($produk->qty == 0)
                                        
                                        @else
                                        <div class="product-extra-link2">
                                            <input type="number" name="quantity" class="qty-input text-center input-number" min="1" max="100" value="1">
                                        </div>
                                        <div class="product-extra-link2">
                                            <a href="{{ route('addcart') }}" aria-label="Add to Cart" class="action-btn hover-up addToCartBtn"><i class="fi-rs-shopping-bag-add"></i></a>
                                            <a  href="{{ route('addfavorit') }}" aria-label="Add To Wishlist" class="action-btn hover-up addToWishlist"><i class="fi-rs-heart"></i></a>
                                        </div>
                                        @endif
                                    </div>
                                    <ul class="product-meta font-xs color-grey mt-50">
                                        @if ($produk->qty == 0)
                                        <li>Produk:<span class="in-stock text-danger ml-5">{{ $produk->qty }} Item Stok</span></li>
                                        @else
                                        <li>Produk:<span class="in-stock text-success ml-5">{{ $produk->qty }} Item Stok</span></li>
                                        @endif
                                    </ul>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        
                        {{-- BAGIAN RATING DAN DESKRIPSI --}}
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Deskripsi</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Rating ({{ $ratings->count() }})</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        <p>{!! $produk->description !!}</p>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="Reviews">
                                    <!--Comments-->
                                    <div class="comments-area">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h4 class="mb-30">Customer Ratings Produk</h4>
                                                
                                                <div class="comment-list">
                                                    @forelse ($ratings as $item) 
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb text-center">
                                                                <img src="{{ asset('frontend') }}/imgs/page/avatar-6.jpg" loading="lazy" alt="{{ $produk->name }}">
                                                                <h6><a href="#">{{ $item->user->name }}</a></h6>
                                                            </div>
                                                            <div class="desc">
                                                                @php
                                                                $rating = App\Models\Rating::where('prod_id', $produk->id)->where('user_id', $item->user->id)->first();
                                                                
                                                                @endphp
                                                                @if ($rating)
                                                                @php $user_rated = $rating->stars_rated @endphp
                                                                @for($i = 1; $i <= $user_rated; $i++)
                                                                <i class="fas fa-star" style="color: #ffb300"></i>
                                                                @endfor
                                                                @for($j = $user_rated+1; $j <= 5; $j++)
                                                                <i class="fas fa-star" style="color: #b4afaf"></i>
                                                                @endfor
                                                                @endif
                                                                
                                                                <p>{{ $item->user_review }}.</p>
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="font-xs mr-30">{{ date('d F Y H:i:s', strtotime($item->created_at)) }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @empty
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                            <p>Rating masih Kosong</p>
                                                        </div>
                                                    </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!--comment form-->
                                    @guest
                                    
                                    @else
                                    
                                    @if ($cek_user->count() > 0)
                                    <div class="comment-form">
                                        <h4 class="mb-15">Berikan penilaian anda</h4>
                                        <form action="{{ route('rating') }}" method="POST">
                                            @csrf 
                                            <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                            <div class="rating-css">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-8 offset-lg-2">
                                                            <div class="star-icon">
                                                                @if($user_rating)
                                                                
                                                                @for($i = 1; $i <= $user_rating->stars_rated; $i++)
                                                                <input type="radio" value="{{ $i }}" name="produk_rating" checked id="rating{{ $i }}">
                                                                <label for="rating{{ $i }}" class="fa fa-star"></label>
                                                                @endfor
                                                                
                                                                @for($j = $user_rating->stars_rated+1; $j <= 5; $j++)
                                                                <input type="radio" value="{{ $j }}" name="produk_rating" id="rating{{ $j }}">
                                                                <label for="rating{{ $j }}" class="fa fa-star"></label>
                                                                @endfor
                                                                
                                                                @else
                                                                
                                                                <input type="radio" value="1" name="produk_rating" checked id="rating1">
                                                                <label for="rating1" class="fa fa-star"></label>
                                                                <input type="radio" value="2" name="produk_rating" id="rating2">
                                                                <label for="rating2" class="fa fa-star"></label>
                                                                <input type="radio" value="3" name="produk_rating" id="rating3">
                                                                <label for="rating3" class="fa fa-star"></label>
                                                                <input type="radio" value="4" name="produk_rating" id="rating4">
                                                                <label for="rating4" class="fa fa-star"></label>
                                                                <input type="radio" value="5" name="produk_rating" id="rating5">
                                                                <label for="rating5" class="fa fa-star"></label>
                                                                
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @if ($user_rating == null)
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
                                                    <form class="form-contact comment_form" action="#" id="commentForm">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control w-100" name="user_review" cols="30" rows="9" placeholder="Berikan Penilaian anda mengenai produk ini"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="button button-contactForm">Submit Review</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            @else
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
                                                    <form class="form-contact comment_form" action="#" id="commentForm">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control w-100" name="user_review" cols="30" rows="9" placeholder="Berikan Penilaian anda mengenai produk ini">{{ $user_rating->user_review }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="button button-contactForm">Update Review</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            @endif
                                        </form>
                                        
                                        
                                    </div>
                                    @else
                                    
                                    @endif
                                    
                                    @endguest
                                </div>
                                
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h3 class="section-title style-1 mb-30">Produk terkait</h3>
                            </div>
                            <div class="col-12 produk_data">
                                <div class="row related-products">
                                    @foreach ($kategoriproduk as $item)
                                    <input type="hidden" value="{{ $produk->id }}" class="prod_id">
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap small hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{ route('detail.produk', $item->slug ) }}" tabindex="0">
                                                        @if ($item->cover == null)
                                                        <img class="default-img" src="{{ asset('frontend') }}/imgs/shop/product-2-1.jpg" loading="lazy" alt="{{ $produk->name }}">
                                                        <img class="hover-img" src="{{ asset('frontend') }}/imgs/shop/product-2-2.jpg" loading="lazy" alt="{{ $produk->name }}">
                                                        @else
                                                        <img class="default-img" src="{{ asset('storage/'. $item->cover ) }}" loading="lazy" alt="{{ $item->name }}">
                                                        @endif
                                                        
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a href="{{ route('detail.produk', $item->slug ) }}" aria-label="Lihat Detail" class="action-btn small hover-up"><i class="fi-rs-eye"></i></a>
                                                    <a href="{{ route('addfavorit') }}" aria-label="Tambah ke Favorit" class="action-btn small hover-up addToWishlist" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    @if ($item->popular == 1)
                                                    <span class="hot">Popular</span>
                                                    @else
                                                    
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="{{ route('detail.produk', $item->slug ) }}" tabindex="0">{{ $item->name }}</a></h2>
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
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>                            
                    </div>
                </div>
                
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="widget-category mb-30">
                        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Kategori</h5>
                        <ul class="categories">
                            @if ($kategori == null)
                            
                            @else
                            @foreach ($kategori as $item)
                            <li><a href="{{ route('kategori', $item->slug) }}">{{ $item->name }}</a></li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">Produk Baru</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        @foreach ($newproduk as $item)
                        <div class="single-post clearfix">
                            <div class="image">
                                @if ($item->cover == null)
                                <img src="{{ asset('frontend') }}/imgs/shop/thumbnail-3.jpg" loading="lazy" alt="{{ $item->name }}">
                                @else
                                <img src="{{ asset('storage/'. $item->cover ) }}" loading="lazy" alt="{{ $item->name }}">
                                @endif
                            </div>
                            <div class="content pt-10">
                                <h5><a href="{{ route('detail.produk', $item->slug ) }}">{{ $item->name }}</a></h5>
                                @if ($item->selling_price == null)
                                <p class="price mb-0 mt-5">Rp. {{ number_format($item->original_price) }}</p>
                                @else
                                <p class="price mb-0 mt-5">Rp. {{ number_format($item->selling_price) }}</p>
                                @endif
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
                            </div>
                        </div>
                        @endforeach
                    </div>                        
                </div>
            </div>
        </div>
    </div>
</section>
</main>

@endsection


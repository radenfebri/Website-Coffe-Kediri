@extends('frontend.layouts.default')

@section('title', 'Shop')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Beranda</a>
                <span></span> Produk
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p> Kami menemukan <strong class="text-brand">{{ $produks->count() }}</strong> item untuk Anda!</p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort dengan:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> Kategori <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        @foreach ($kategoriproduk_nav as $item)
                                        <li><a href="{{ route('kategori', $item->slug) }}">{{ $item->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid-4">
                        
                        @if ($produks->count() > 0 )
                        @foreach ($produks as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6 produk_data">
                            <input type="hidden" value="{{ $item->id }}" class="prod_id">
                            <input type="hidden" class="form-control qty-input" value="1">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('detail.produk', $item->slug ) }}">
                                            @if ($item->cover == null)
                                            <img class="default-img produk-img" src="{{ '/frontend/imgs/shop/product-2-1.jpg' }}" alt="{{ $item->name }}">
                                            @else
                                            <img class="default-img produk-img" src="{{ asset('storage/'. $item->cover ) }}" alt="{{ $item->name }}">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a href="{{ route('detail.produk', $item->slug ) }}" aria-label="Lihat Detail" class="action-btn hover-up"><i class="fi-rs-eye"></i></a>
                                        <a href="{{ route('addfavorit') }}" aria-label="Tambah ke Favorit" class="action-btn hover-up addToWishlist"><i class="fi-rs-heart"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            @if ($item->popular == 1)   
                                                <span class="hot">Popular</span>
                                            @else
                                            
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{ route('kategori', $item->kategoriproduk->slug) }}">{{ $item->kategoriproduk->name }}</a>
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
                                            <a href="{{ route('addcart') }}" aria-label="Tambah" class="action-btn hover-up addToCartBtn"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            
                            @endif
                            
                        </div>
                            <!--pagination-->
                        {{ $produks->links('frontend.layouts.includes.pagination') }}
                    </div>
                </div>
            </div>
        </section>
</main>
@endsection
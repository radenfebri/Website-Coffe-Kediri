@extends('frontend.layouts.default')

@section('title', 'Favorit')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>
                <span></span> 
                <a href="{{ route('shop') }}" rel="nofollow">Shop</a>
                <span></span> Favorit
            </div>
        </div>
    </div>
    {{-- TAMPILAN DESKTOP --}}
    <section class="mt-50 mb-50 produk favorit favorit-desktop">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            @if ($favorit->count() > 0)
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Keranjang</th>
                                    <th scope="col">Hapus</th>
                                </tr>
                            </thead>
                            @else
                            
                            @endif
                            
                            @if ($favorit->count() > 0)
                            
                            <tbody>
                                @foreach ($favorit as $item)
                                <tr class="produk_data">
                                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                    <input type="hidden" class="form-control qty-input" value="1">
                                    <td class="image product-thumbnail">
                                        @if ($item->produks->cover == null)
                                        <img src="{{ '/frontend/imgs/shop/product-1-2.jpg' }}" alt="{{ $item->produks->name }}">
                                        @else
                                        <img src="{{ asset('storage/'. $item->produks->cover ) }}" alt="{{ $item->produks->name }}">
                                        @endif
                                    </td>
                                    
                                    <td class="product-des product-name">
                                        <h5 class="product-name"><a href="{{ route('detail.produk', $item->produks->slug ) }}">{{ \Illuminate\Support\Str::words($item->produks->name, 5, '...') }}</a></h5>
                                        <p class="font-xs">{{ \Illuminate\Support\Str::words($item->produks->small_description, 5, '...') }}</p>
                                    </td>
                                    
                                    @if ($item->produks->selling_price == null)
                                    <td class="price" data-title="Price"><span>Rp. {{ number_format($item->produks->original_price) }}</span></td>
                                    @else
                                    <td class="price" data-title="Price"><span>Rp. {{ number_format($item->produks->selling_price) }}</span></td>
                                    @endif
                                    
                                    @if ($item->produks->qty == 0)
                                    <td>
                                        Produk Habis
                                    </td>
                                    @else
                                    <td>
                                        <a href="{{ route('addcart') }}" class="addToCartBtn"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </td>
                                    @endif
                                    
                                    <td>
                                        <a href="{{ route('deletefavorit') }}" class="delete-favorit-item"><i class="fi-rs-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                
                                @else
                                <h3 class="text-center mb-50">
                                    Favorit anda masih Kosong
                                </h3>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="divider center_icon mb-50"><i class="fi-rs-fingerprint"></i></div>
            </div>                
        </div>
    </div>
</div>
</section>

{{-- TAMPILAN MOBILE --}}
<span class="produk favorit_mobile">
    <section class="favorit-mobile">
        <div class="container">
            @if ($favorit->count() > 0)
            @foreach ($favorit as $item)
            <div class="layer-favorit produk_data">
                <div class="favorit-fill">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    <input type="hidden" class="form-control qty-input" value="1">
                    <div class="favorit-img"> 
                        @if ($item->produks->cover == null)
                        <img src="{{ asset('frontend') }}/imgs/shop/product-1-2.jpg" alt="{{ $item->produks->name }}">
                        @else
                        <img src="{{ asset('storage/'. $item->produks->cover ) }}" alt="{{ $item->produks->name }}">
                        @endif
                    </div>
                    <div class="text-favorit">
                        <a class="judul-favorit" href="{{ route('detail.produk', $item->produks->slug ) }}">{{ \Illuminate\Support\Str::words($item->produks->name, 1, '...') }}</a>
                        <p class="font-xs">{{ \Illuminate\Support\Str::words($item->produks->small_description, 1, '...') }}</p>
                        @if ($item->produks->selling_price == null)
                        <p>Rp. {{ number_format($item->produks->original_price) }}</p>
                        @else
                        <p>Rp. {{ number_format($item->produks->selling_price) }}</p>
                        @endif
                        
                    </div>
                    <div class="icon-favorit-cart">
                        @if ($item->produks->qty == 0)
                        <p>
                            Stok 0
                        </p>
                        @else
                        <div class="cart-favorit">
                            <a href="{{ route('addcart') }}" class="addToCartBtn"><i class="fi-rs-shopping-bag-add"></i></a>
                        </div>
                        @endif
                        
                        <div>
                            <a href="{{ route('deletefavorit') }}" class="delete-favorit-item-mobile"><i class="fi-rs-trash"></i></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            
            <h3 class="text-center mt-50 mb-50">
                Favorit anda masih Kosong
            </h3>
            @endif
        </div>
    </section>
</span>
</main>
@endsection

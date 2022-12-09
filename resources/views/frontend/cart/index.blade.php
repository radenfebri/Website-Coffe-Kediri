@extends('frontend.layouts.default')

@section('title', 'Keranjang')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>
                <span></span> 
                <a href="{{ route('shop') }}" rel="nofollow">Shop</a>
                <span></span> Your Cart
            </div>
        </div>
    </div>
    {{-- SECTION TAMPILAN DESKTOP --}}
    <section class="mt-50 mb-50 produk cartItem cart-desktop">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive  cart-table">
                        <table class="table shopping-summery text-center clean">
                            @if ($produk->count() > 0)
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Hapus</th>
                                </tr>
                            </thead>
                            @else
                            
                            @endif
                            @php $total = 0; @endphp
                                
                            {{-- @foreach ($user as $data)
                                @php $kirim = $data->ongkir->harga @endphp
                            @endforeach --}}
                            
                            @if ($produk->count() > 0)
                            
                            @foreach ($produk as $item)
                                @if ($item->produks->qty == 0)
                                    <center>
                                        <div class="alert alert-success" role="alert">
                                            <p style="color: red">Ada produk yang kosong, dimohon sebelum melakukan checkout, hapus terlebih dahulu!</p>
                                        </div>
                                    </center>
                                @else
                                
                                @endif
                            @endforeach
                            
                            <tbody class="">
                                @foreach ($produk as $item)
                                <tr class="produk_data">
                                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
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
                                    
                                    <td class="text-center" data-title="Stock">
                                        @if ($item->produks->qty == 0)
                                        <span class="product-name">Produk Habis</span>
                                        @else                                        
                                        <div class="input-group input-number-group">
                                            <input type="number" class="input-number text-center qty-input" name="quantity" value="{{ $item->prod_qty }}" min="1" max="10000">
                                        </div>
                                        <div class="input-group-button">
                                            <a href="" class="btn-sm changeQuantity">Simpan</a>
                                        </div>
                                        @endif
                                    </td>
                                    
                                    <td class="text-right" data-title="Cart">
                                        @if ($item->produks->qty == 0)
                                        @if ($item->produks->selling_price == null)
                                        <span>Rp. {{ number_format($item->produks->original_price) }}</span>
                                        @else
                                        <span>Rp. {{ number_format($item->produks->selling_price) }}</span>
                                        @endif
                                        @else
                                        @if ($item->produks->selling_price == null)
                                        <span>Rp. {{ number_format($item->produks->original_price * $item->prod_qty) }}</span>
                                        @else
                                        <span>Rp. {{ number_format($item->produks->selling_price * $item->prod_qty) }}</span>
                                        @endif
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('deletecart') }}" class="delete-cart-item"><i class="fi-rs-trash"></i></a>
                                    </td>
                                </tr>
                        
                                
                                @if ($item->produks->selling_price == null)
                                    @php $total += $item->produks->original_price * $item->prod_qty; @endphp
                                @else
                                    @php $total += $item->produks->selling_price * $item->prod_qty; @endphp
                                @endif
                                @endforeach
                                
                                @else
                                <h3 class="text-center">
                                    Keranjang anda masih Kosong
                                </h3>  
                                @endif
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                @foreach ($produk as $item)
                    @php $cek = $item->produks->qty @endphp
                @endforeach
                
                {{-- {{ $cek }} --}}
                
                <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                <div class="row mb-50">
                    @if ($produk->count() > 0)
                        @if ($cek)
                            <div class="col-lg-6 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>Keranjang Total</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="cart_total_label">Sub Subtotal</td>
                                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">Rp. {{ number_format($total) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Ongkos Kirim</td>
                                                    <td class="cart_total_amount"> <span class="font-lg fw-900 text-brand">Rp. {{ number_format($kirim) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Total Keseluruahan</td>
                                                    <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">Rp. {{ number_format($total + $kirim) }}</span></strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="{{ route('checkout') }}" class="btn btn-cart"> <i class="fi-rs-box-alt mr-10"></i> Proses Order Sekarang</a>       
                                </div>
                            </div>
                        @else

                        @endif
                    @else
                    
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</section>


{{-- SECTION TAMPILAN MOBILE --}}
<span class="cartItem_mobile produk_mobile">
    <section class="favorit-mobile">
        <div class="container">   
            @foreach ($produk as $item)
            @if ($item->produks->qty == 0)
            <center>
                <div class="alert alert-success" role="alert">
                    <p style="color: red">Ada produk yang kosong, dimohon sebelum melakukan checkout, hapus terlebih dahulu!</p>
                </div>
            </center>
            @else
            
            @endif
            @endforeach         
            @if ($produk->count() > 0)
            @foreach ($produk as $item)
            <div class="layer-cart produk_data">
                <div class="favorit-fill">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    <div class="favorit-img"> 
                        @if ($item->produks->cover == null)
                        <img src="{{ '/frontend/imgs/shop/product-1-2.jpg' }}" alt="{{ $item->produks->name }}">
                        @else
                        <img src="{{ asset('storage/'. $item->produks->cover ) }}" alt="{{ $item->produks->name }}">
                        @endif
                    </div>
                    <div class="text-favorit">
                        <a class="judul-favorit" href="{{ route('detail.produk', $item->produks->slug ) }}">{{ \Illuminate\Support\Str::words($item->produks->name, 1, '...') }}</a>
                        <p class="font-xs">{{ \Illuminate\Support\Str::words($item->produks->small_description, 3, '...') }}</p>
                        @if ($item->produks->qty == 0)
                        Stok 0
                        @else
                        <input type="number" class="input-number text-center qty-input" name="quantity" value="{{ $item->prod_qty }}" min="1" max="10000">
                        @endif
                        <p class="text-harga">
                            @if ($item->produks->selling_price == null)
                            <span>Rp. {{ number_format($item->produks->original_price * $item->prod_qty) }}</span>
                            @else
                            <span>Rp. {{ number_format($item->produks->selling_price * $item->prod_qty) }}</span>
                            @endif
                        </p>
                    </div>
                    <div class="cart-icon-gabung">
                        <div class="icon-cart-delete mb-4">
                            <a href="" class="changeQuantity-mobile"><i class="fi-rs-disk"></i></a> 
                        </div>
                        <div class="icon-cart-delete">
                            <a href="{{ route('deletecart') }}" class="delete-cart-item-mobile"><i class="fi-rs-trash"></i></a> 
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            @endif
            {{-- <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div> --}}
            
            @if ($produk->count() > 0)
                @if ($cek > 0)
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="border p-md-4 p-30 border-radius cart-totals">
                                <div class="heading_s1 mb-3">
                                    <h4>Keranjang Total</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="cart_total_label">Sub Subtotal</td>
                                                <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">Rp. {{ number_format($total) }}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Ongkos Kirim</td>
                                                <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">Rp. {{ number_format($kirim) }}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Total Keseluruhan</td>
                                                <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">Rp. {{ number_format($total + $kirim) }}</span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <a href="{{ route('checkout') }}" class="btn btn-cart"> <i class="fi-rs-box-alt mr-10"></i> Proses Order Sekarang</a>       
                            </div>       
                        </div>
                    </div>
                @else 
            @endif

            @else
                <h3 class="text-center page-kosong">
                    Keranjang anda masih Kosong
                </h3>  
            @endif
        </div>
        
    </div>
</section>
</span>

</main>

@endsection

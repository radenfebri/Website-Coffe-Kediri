@extends('frontend.layouts.default')

@section('title', 'Detail Pembayaran')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>
                <span></span> Pembayaran
            </div>
        </div>
    </div>
    <section class="pembayaran">
        <div class="container">
            <div class="layer1">
                <h3 class="title">Pembayaran</h3>
                <div class="layer2">
                    <div class="text-pembayaran">
                        <div class="pembayaran-text">
                            <p>Kode Order</p>
                            <p>#{{ $orders->tracking_no }}</p>
                        </div>
                        <div class="pembayaran-text">
                            <p>Metode Bayar</p>
                            <p>{{ $orders->metode }}</p>
                        </div>
                        <div class="pembayaran-text">
                            <p>Status</p>
                            @if ($orders->status == 0)
                            <p style="color: rgb(255, 0, 0)">Belum Bayar</p>
                            @elseif($orders->status == 1)
                            <p style="color: rgb(8, 3, 249)">Proses Packing</p>
                            @elseif($orders->status == 2)
                            <p style="color: rgb(8, 3, 249)">Proses Kirim</p>
                            @elseif($orders->status == 3)
                            <p style="color: green">Selesai</p>
                            @endif
                            
                        </div>
                    </div>
                    <div class="detail-produk-pembayaran">
                        <div class="judul-produk-pembayaran-selesai">
                            <div class="produk-pembayaran-selesai">
                                <h4>Produk</h4>
                            </div>
                            <div class="total-produk-pembayaran-selesai">
                                <h4>Total</h4>
                            </div>
                            <div class="nilai-produk-pembayaran">
                                <h4>Rating</h4>
                            </div>
                        </div>

                        @php $total = 0; @endphp
                        
                        @foreach ($orders->orderitem as $item)
                        <div class="isi-produk-pembayaran">     
                            <div class="img-produk-pembayaran">
                                @if ($item->produks->cover == null)
                                <img src="{{ asset('frontend') }}/imgs/shop/product-3-1.jpg" alt="">
                                @else
                                <img src="{{ asset('storage/'. $item->produks->cover) }}" alt="">
                                @endif
                            </div>
                            <div class="desc-produk-pembayaran">
                                <a href="{{ route('detail.produk', $item->produks->slug ) }}" class="judul">{{ $item->produks->name }}</a>
                                <p>{{ \Illuminate\Support\Str::words($item->produks->small_description, 2, '...') }}</p>
                                <p>x {{ $item->qty }}</p>
                            </div>
                            <div class="total-produk-pembayaran-selesai">
                                @if ($item->produks->selling_price == null)
                                <p>Rp. {{ number_format($item->produks->original_price * $item->qty) }}</p>
                                @else
                                <p>Rp. {{ number_format($item->produks->selling_price * $item->qty) }}</p>
                                @endif
                            </div>
                            <div class="nilai-produk-pembayaran">
                                <a href="{{ route('detail.produk', $item->produks->slug ) }}">Rating</a>
                            </div>
                        </div>
                        @if ($item->produks->selling_price == null)
                        @php $total += $item->produks->original_price * $item->qty; @endphp
                        @else
                        @php $total += $item->produks->selling_price * $item->qty; @endphp
                        @endif
                        @endforeach

                        <div class="judul-produk-pembayaran-total">
                            <div class="produk-pembayaran-total">
                                <h5>Total Order</h4>
                            </div>
                            <div class="total-produk-pembayaran-total">
                                <h5>Rp. {{ number_format($orders->total_price) }}</h4>
                            </div>
                            <div class="nilai-produk-pembayaran">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layer2">
                    <div class="detail-pembayaran">
                        <h3>Detail Pembayaran</h3>
                        <div class="pembayaran-text">
                            <p>Total Pembayaran</p>
                            <p>Rp. {{ number_format($orders->total_price) }}</p>
                        </div>
                        <div class="pembayaran-text">
                            <p>{{ date('d F Y',strtotime($orders->created_at)) }}</p>
                        </div>
                    </div>
                    <a class="btn btn-pembayaran">Bukti Pembayaran</a>
                </div>
            </div>
           </div>
        </div>
    </section>
   
</main>

@include('frontend.layouts.includes.copy')
@endsection

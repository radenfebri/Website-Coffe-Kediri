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
                        <div class="judul-produk-pembayaran">
                            <div class="produk-pembayaran">
                                <h4>Produk</h4>
                            </div>
                            <div class="total-produk-pembayaran">
                                <h4>Total</h4>
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
                            <div class="total-produk-pembayaran">
                                @if ($item->produks->selling_price == null)
                                <p>Rp. {{ number_format($item->produks->original_price * $item->qty) }}</p>
                                @else
                                <p>Rp. {{ number_format($item->produks->selling_price * $item->qty) }}</p>
                                @endif
                            </div>
                        </div>
                        @if ($item->produks->selling_price == null)
                        @php $total += $item->produks->original_price * $item->qty; @endphp
                        @else
                        @php $total += $item->produks->selling_price * $item->qty; @endphp
                        @endif
                        @endforeach
                        
                        <div class="judul-produk-pembayaran">
                            <div class="produk-pembayaran">
                                <h5>Total Order</h5>
                            </div>
                            <div class="total-produk-pembayaran">
                                <h5>Rp. {{ number_format($total) }}</h5>
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
                        {{-- <p><h5>Total yang dibayarkan harus sesuai dengan kode unik, 3 digit angka di belakang koma adalah kode unik transaksi anda.</h5></p> --}}
                    </div>
                    {{-- <a href="https://api.whatsapp.com/send?phone={{ $setting_website->phone }}&text=Hallo%20kak%20%2APutra%20Teguh%2A%2C%20saya%20mau%20Konfirmasi%20sudah%20melakukan%20pembayaran%20dengan%20data%20berikut%3A%0D%0A%0D%0ANama%20%3A%20%2A{{ $orders->name }}%2A%0D%0AEmail%20%3A%20%2A{{ $orders->email }}%2A%0D%0ANo%20Pesanan%20%3A%20%2A%23{{ $orders->tracking_no }}%2A%0D%0ASudah%20Membayar%20%3A%20%2ARp.%20{{ number_format($orders->total_price) }}%2A%0D%0ATanggal%20Pesanan%20dibuat%20%3A%20%2A{{ date('d F Y h:i:s',strtotime($orders->created_at)) }}%2A%0D%0ACatatan%20%3A%20%2A{{ $orders->message }}%2A%0D%0A%0D%0ATolong%20Segera%20di%20Proses%20ya%20kak%21%21%21%0D%0ASaya%20Ucapkan%20%2ATerima%20kasih%2A" class="btn btn-pembayaran" target="_blank">Konfirmasi Pembayaran</a> --}}
                </div>
            </div>

            @if ($orders->message_admin == null)
                                
            @else
                <div class="metode-pembayaran">
                    {{-- metode pembayaran rekening --}}
                    <div class="kirim-pembayaran">
                        <div class="informasi-produk">
                            <h4>Catatan dari Admin</h4>
                            <div class="pesan-produk">
                                <p>{{ $orders->message_admin }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


        </div>
    </div>
</section>

</main>

@include('frontend.layouts.includes.copy')
@endsection

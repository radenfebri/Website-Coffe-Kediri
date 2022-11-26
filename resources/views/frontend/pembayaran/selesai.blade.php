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
                            <p>Nama Produk</p>
                            <p>Coffe</p>
                        </div>
                        <div class="pembayaran-text">
                            <p>Jumlah Produk</p>
                            <p>10</p>
                        </div>
                        <div class="pembayaran-text">
                            <p>Metode Bayar</p>
                            <p>{{ $orders->metode }}</p>
                        </div>
                        <div class="pembayaran-text">
                            <p>Total Order</p>
                            <p>Rp. {{ number_format($orders->total_price) }}</p>
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
                    <span></span>
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
                    <div class="detail-pembayaran-tombol">
                        <a class="btn btn-pembayaran-selesai">Konfirmasi Pembayaran</a>
                        <a class="btn btn-pembayaran-selesai">Penilaian Produk<a>
                    </div>    
                </div>
            </div>

            {{-- metode pembayaran --}}
            <div class="metode-pembayaran">
                <div class="pilihan-pembayaran">
                    <h4>Metode Pembayaran : <span>BRI</span></h4>
                </div>
                {{-- metode pembayaran rekening --}}
                <div class="kirim-pembayaran">
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label">Atas Nama</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">No Rekening</label>
                            <div class="copy-text">
                                <input type="text" class="form-control">
                                <button class="btn"><i class="fa fa-clone"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- metode pembayaran qris --}}
                {{-- <div class="kirim-pembayaran-qris">
                    <h3>Kalian bisa scan barcode di bawah ini</h3>
                    <img src="{{ asset('frontend')}}/imgs/shop/product-1-1.jpg" alt="" loading="lazy">
                    <a href="#" class="btn">Download</a>
                </div> --}}
            </div>
        </div>
    </section>
   
</main>

@include('frontend.layouts.includes.copy')
@endsection
